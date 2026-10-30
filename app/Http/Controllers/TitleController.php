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

        // 1. Where to watch
        if ($title->relationLoaded('streamingPlatforms') && $title->streamingPlatforms->isNotEmpty()) {
            $platformList = $title->streamingPlatforms->pluck('name')->join(', ', ' and ');
            $faqs[] = [
                'question' => "Where can I watch {$title->title} online?",
                'answer' => "You can stream {$title->title} online on {$platformList}. Check TonightOnScreen for real-time OTT release dates, 4K HDR streaming availability, and subscription options.",
            ];
        } else {
            $faqs[] = [
                'question' => "Where can I stream {$title->title}?",
                'answer' => "Streaming availability for {$title->title} is regularly updated on TonightOnScreen. Keep this page bookmarked for verified OTT platform announcements and theatrical release details.",
            ];
        }

        // 2. Director & Release Date
        if ($directors->isNotEmpty()) {
            $directorNames = $directors->map(fn($d) => $d->person?->name)->filter()->join(', ', ' and ');
            if (!empty($directorNames)) {
                $releasePart = $title->release_date ? " and officially released on " . $title->release_date->format('F d, Y') : '';
                $faqs[] = [
                    'question' => "Who directed the {$typeWord} {$title->title} and when was it released?",
                    'answer' => "{$title->title} was directed by {$directorNames}{$releasePart}. Explore their complete filmography and upcoming projects on TonightOnScreen.",
                ];
            }
        }

        // 3. Lead Cast (targets: "cast of oppenheimer (film)", "fight club cast")
        if ($cast->isNotEmpty()) {
            $castNames = $cast->take(5)->map(fn($c) => $c->person?->name)->filter()->join(', ', ' and ');
            if (!empty($castNames)) {
                $faqs[] = [
                    'question' => "Who is in the cast of {$title->title} ({$typeWord})?",
                    'answer' => "The cast of {$title->title} features {$castNames} in central roles, delivering standout cinematic performances across the story.",
                ];
            }
        }

        // 4. Budget & Box Office / Collection (targets: "super deluxe budget and collection", "kumbalangi nights budget")
        if ($title->budget || $title->box_office) {
            $budgetStr = $title->formatted_budget ?? 'Confidential';
            $boxOfficeStr = $title->formatted_box_office ?? 'Under compilation';
            $label = $title->box_office_label;
            $verdictSuffix = $title->box_office_verdict ? " The {$typeWord} is commercially classified as a {$title->box_office_verdict} at the box office." : '';

            $faqs[] = [
                'question' => "What is the budget and {$label} of {$title->title}?",
                'answer' => "{$title->title} was produced on an estimated budget of {$budgetStr} and recorded a worldwide {$label} of {$boxOfficeStr}.{$verdictSuffix}",
            ];

            // 4b. Hit or Flop Commercial Verdict
            if ($title->budget && $title->box_office && $title->box_office_verdict) {
                $faqs[] = [
                    'question' => "Is {$title->title} a hit or flop at the box office?",
                    'answer' => "With an estimated budget of {$budgetStr} and worldwide collections reaching {$boxOfficeStr}, {$title->title} is classified as a {$title->box_office_verdict} in commercial theatrical performance.",
                ];
            }
        }

        // 5. Release Date & Runtime (if director didn't already cover release date)
        if ($title->release_date && $directors->isEmpty()) {
            $releaseStr = $title->release_date->format('F d, Y');
            $runtimeStr = $title->runtime_minutes ? " with a total runtime of {$title->runtime_minutes} minutes" : '';
            $faqs[] = [
                'question' => "When was {$title->title} released in theatres?",
                'answer' => "{$title->title} officially premiered on {$releaseStr}{$runtimeStr}.",
            ];
        }

        // 6. Story Synopsis (targets: "[title] film", "[title] storyline")
        if (!empty($title->overview)) {
            $faqs[] = [
                'question' => "What is the story of {$title->title} ({$typeWord}) about?",
                'answer' => SeoHelper::cleanMetaDescription($title->overview, 250),
            ];
        }

        return $faqs;
    }
}
