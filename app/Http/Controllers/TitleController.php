<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Services\Seo\StructuredDataService;
use App\Support\SeoHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TitleController extends Controller
{
    /**
     * Display the specified entertainment title details page.
     * Eager loads all necessary relations with 24-hour caching for high performance.
     */
    public function show(string $slug, StructuredDataService $structuredDataService)
    {
        $cacheKey = "title_profile_v4_{$slug}";

        $cachedData = Cache::remember($cacheKey, now()->addHours(24), function () use ($slug, $structuredDataService) {
            $title = Title::query()
                ->where('slug', $slug)
                ->with([
                    'genres:id,name,slug',
                    'streamingPlatforms',
                    'productionCompanies',
                    'seasons' => fn($q) => $q->orderBy('season_number'),
                    'seasons.episodes' => fn($q) => $q->orderBy('episode_number'),
                    'credits' => fn($q) => $q->orderBy('billing_order'),
                    'credits.person',
                ])
                ->firstOrFail();

            // Extract Cast and Crew
            $credits = $title->credits;
            $cast = $credits->where('department', 'Acting')->values();
            $directors = $credits->filter(fn($c) => 
                $c->department === 'Directing' || 
                ($c->department instanceof \App\Enums\Department && $c->department === \App\Enums\Department::DIRECTING) ||
                (is_string($c->job) && Str::contains(strtolower($c->job), 'director'))
            )->values();

            $writers = $credits->filter(fn($c) => 
                $c->department === 'Writing' || 
                ($c->department instanceof \App\Enums\Department && $c->department === \App\Enums\Department::WRITING) ||
                (is_string($c->job) && Str::contains(strtolower($c->job), ['writer', 'screenplay', 'creator']))
            )->values();

            $producers = $credits->filter(fn($c) => 
                $c->department === 'Production' || 
                ($c->department instanceof \App\Enums\Department && $c->department === \App\Enums\Department::PRODUCTION) ||
                (is_string($c->job) && Str::contains(strtolower($c->job), 'producer'))
            )->values();

            // Parse YouTube Trailer ID
            $youtubeId = null;
            if ($title->trailer_url) {
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $title->trailer_url, $matches)) {
                    $youtubeId = $matches[1];
                }
            }

            // Similar / Recommended Titles
            $genreIds = $title->genres->pluck('id');
            $similarTitles = Title::query()
                ->where('id', '!=', $title->id)
                ->where(function ($query) use ($genreIds, $title) {
                    if ($genreIds->isNotEmpty()) {
                        $query->whereHas('genres', fn($q) => $q->whereIn('genres.id', $genreIds))
                              ->orWhere('type', $title->type);
                    } else {
                        $query->where('type', $title->type);
                    }
                })
                ->select(['id', 'title', 'slug', 'type', 'poster_path', 'rating', 'release_date', 'origin_country', 'budget', 'box_office'])
                ->latest('rating')
                ->take(4)
                ->get();

            // Generate Programmatic FAQs
            $faqs = $this->generateTitleFaqs($title, $directors, $cast);

            // Schema.org structured data
            $structuredData = $structuredDataService->forTitle($title);
            $faqSchema = !empty($faqs) ? $structuredDataService->forFaqs($faqs) : null;

            // All genres for contextual internal interlinking (Rule 9)
            $allGenres = Cache::remember('all_genres_nav_v3', 86400, fn() => \App\Models\Genre::withCount('titles')->orderBy('name')->get());

            // Search-intent dynamic SEO title and description
            $seoTitle = SeoHelper::generateTitleSeoTitle($title);
            $seoDescription = SeoHelper::generateTitleMetaDescription($title, $cast, $directors);

            return [
                'title' => $title,
                'cast' => $cast,
                'directors' => $directors,
                'writers' => $writers,
                'producers' => $producers,
                'youtubeId' => $youtubeId,
                'similarTitles' => $similarTitles,
                'faqs' => $faqs,
                'structuredData' => $structuredData,
                'faqSchema' => $faqSchema,
                'seoTitle' => $seoTitle,
                'seoDescription' => $seoDescription,
                'allGenres' => $allGenres,
            ];
        });

        $title = $cachedData['title'];

        // Live Reviews & Rating Breakdown (queried dynamically so new reviews appear immediately)
        $reviews = $title->reviews()->where('is_approved', true)->latest()->get();
        $reviewCount = $reviews->count();
        $ratingDistribution = [
            10 => 0, 9 => 0, 8 => 0, 7 => 0, 6 => 0,
            5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0,
        ];
        foreach ($reviews as $rev) {
            $r = (int) $rev->rating;
            if (isset($ratingDistribution[$r])) {
                $ratingDistribution[$r]++;
            }
        }

        $votedReviews = session()->get('helpful_reviews', []);

        return view('titles.show', array_merge($cachedData, [
            'reviews' => $reviews,
            'reviewCount' => $reviewCount,
            'ratingDistribution' => $ratingDistribution,
            'votedReviews' => $votedReviews,
        ]));
    }

    /**
     * Generate programmatic FAQs answering conversational search queries.
     */
    protected function generateTitleFaqs(Title $title, $directors, $cast): array
    {
        $faqs = [];
        $isSeries = ($title->type instanceof \App\Enums\TitleType ? $title->type === \App\Enums\TitleType::TV_SERIES : $title->type === 'tv_series');
        $typeWord = $isSeries ? 'web series' : 'movie';

        // A1. Release Date ("when did {movie_name} come out", "{movie_name} release date")
        if ($title->release_date) {
            $dateStr = $title->release_date->format('F d, Y');
            $yearStr = $title->release_date->format('Y');
            $faqs[] = [
                'question' => "When did {$title->title} come out and what is its release date?",
                'answer' => "{$title->title} officially released on {$dateStr} ({$yearStr}). Discover full theatrical release timeline, festival screenings, and streaming dates on TonightOnScreen.",
            ];
        }

        // A2. Runtime ("{movie_name} runtime", "{movie_name} run time")
        if ($title->runtime_minutes) {
            $hours = intdiv($title->runtime_minutes, 60);
            $minutes = $title->runtime_minutes % 60;
            $durationFormatted = $hours > 0 ? "{$hours}h {$minutes}m" : "{$minutes}m";
            $faqs[] = [
                'question' => "What is the runtime of {$title->title}?",
                'answer' => "The total runtime of {$title->title} is {$title->runtime_minutes} minutes ({$durationFormatted}).",
            ];
        }

        // A3. Genre ("{movie_name} genre")
        if ($title->relationLoaded('genres') && $title->genres->isNotEmpty()) {
            $genreList = $title->genres->pluck('name')->join(', ', ' and ');
            $faqs[] = [
                'question' => "What genre is {$title->title}?",
                'answer' => "{$title->title} is categorized under {$genreList}. Explore curated recommendations and top-rated titles in these genres on TonightOnScreen.",
            ];
        }

        // B1. Cast & Actors ("{movie_name} cast", "cast of {movie_name}", "who stars in {movie_name}", "actors in {movie_name}")
        if ($cast->isNotEmpty()) {
            $castWithChars = $cast->take(5)->map(function($c) {
                $name = $c->person?->name;
                $char = $c->character_name;
                return $char ? "{$name} as {$char}" : $name;
            })->filter()->join(', ', ' and ');

            $castNames = $cast->take(6)->map(fn($c) => $c->person?->name)->filter()->join(', ', ' and ');

            $faqs[] = [
                'question' => "Who stars in {$title->title} and who is in the cast list?",
                'answer' => "The cast of {$title->title} stars {$castNames}. Detailed character names and talent biographies are available on TonightOnScreen.",
            ];

            // B2. Characters & Character Names ("{movie_name} characters", "{movie_name} character names")
            if (!empty($castWithChars)) {
                $faqs[] = [
                    'question' => "Who are the main characters in {$title->title}?",
                    'answer' => "Key characters in {$title->title} include {$castWithChars}.",
                ];
            }
        }

        // C1. Budget & Box Office Collection ("{movie_name} budget", "{movie_name} collection", "{movie_name} budget and collection")
        if ($title->budget || $title->box_office) {
            $budgetStr = $title->formatted_budget ?? 'Undisclosed';
            $boxOfficeStr = $title->formatted_box_office ?? 'Under compilation';
            $label = $title->box_office_label;

            $faqs[] = [
                'question' => "What is the budget and box office collection of {$title->title}?",
                'answer' => "{$title->title} was produced on an estimated budget of {$budgetStr} and grossed a worldwide {$label} of {$boxOfficeStr}.",
            ];

            // C2. Hit or Flop Commercial Verdict ("{movie_name} hit or flop")
            if ($title->budget && $title->box_office && $title->box_office_verdict) {
                $faqs[] = [
                    'question' => "Is {$title->title} a hit or flop?",
                    'answer' => "Based on its estimated budget of {$budgetStr} and worldwide box office collection of {$boxOfficeStr}, {$title->title} is classified as a {$title->box_office_verdict} at the box office.",
                ];
            }
        }

        // D1. OTT and Streaming ("where to watch {movie_name}", "{movie_name} OTT", "{movie_name} OTT release date", "{movie_name} on Netflix")
        if ($title->relationLoaded('streamingPlatforms') && $title->streamingPlatforms->isNotEmpty()) {
            $platformList = $title->streamingPlatforms->pluck('name')->join(', ', ' and ');
            $faqs[] = [
                'question' => "Where can I watch {$title->title} on OTT?",
                'answer' => "{$title->title} is currently available to stream online on {$platformList}. Check TonightOnScreen for real-time 4K HDR streaming options and regional availability.",
            ];
        } else {
            $faqs[] = [
                'question' => "Where to watch {$title->title} online?",
                'answer' => "Digital streaming and OTT rights for {$title->title} are tracked regularly on TonightOnScreen. Bookmark this page for instant streaming alerts and platform updates.",
            ];
        }

        // E1. Director, Writer & Producer ("{movie_name} director", "who directed {movie_name}", "{movie_name} writer", "{movie_name} producer")
        if ($directors->isNotEmpty()) {
            $directorNames = $directors->map(fn($d) => $d->person?->name)->filter()->join(', ', ' and ');
            $writerNames = $writers->isNotEmpty() ? $writers->map(fn($w) => $w->person?->name)->filter()->join(', ', ' and ') : null;
            $writerPart = $writerNames ? " and written by {$writerNames}" : '';

            $faqs[] = [
                'question' => "Who directed and wrote {$title->title}?",
                'answer' => "{$title->title} was directed by {$directorNames}{$writerPart}. Explore their complete filmographies and upcoming releases on TonightOnScreen.",
            ];
        }

        // Story Synopsis ("{movie_name} movie", "{movie_name} film")
        if (!empty($title->overview)) {
            $faqs[] = [
                'question' => "What is the story of {$title->title} about?",
                'answer' => SeoHelper::cleanMetaDescription($title->overview, 250),
            ];
        }

        return $faqs;
    }
}
