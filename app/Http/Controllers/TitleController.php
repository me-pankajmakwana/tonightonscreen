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
        $cacheKey = "title_profile_v6_{$slug}";

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
                (is_string($c->job) && Str::contains(strtolower($c->job), 'director')))->values();

            $writers = $credits->filter(fn($c) =>
                $c->department === 'Writing' ||
                ($c->department instanceof \App\Enums\Department && $c->department === \App\Enums\Department::WRITING) ||
                (is_string($c->job) && Str::contains(strtolower($c->job), ['writer', 'screenplay', 'creator'])))->values();

            $producers = $credits->filter(fn($c) =>
                $c->department === 'Production' ||
                ($c->department instanceof \App\Enums\Department && $c->department === \App\Enums\Department::PRODUCTION) ||
                (is_string($c->job) && Str::contains(strtolower($c->job), 'producer')))->values();

            // Parse YouTube Trailer ID
            $youtubeId = null;
            if ($title->trailer_url) {
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $title->trailer_url, $matches)) {
                    $youtubeId = $matches[1];
                }
            }

            // Intelligently Ranked Similar / Recommended Titles (shared genres, directors, cast, language, ratings)
            $similarTitles = $this->getSimilarTitles($title, 6);

            // Generate Programmatic FAQs
            $faqs = $this->generateTitleFaqs($title, $directors, $writers, $cast);

            // Schema.org structured data
            $structuredData   = $structuredDataService->forTitle($title);
            $faqSchema        = !empty($faqs) ? $structuredDataService->forFaqs($faqs) : null;
            // HowTo schema: "how to watch {movie}", "how to stream {movie}" featured snippet
            $watchGuideSchema = $structuredDataService->forWatchGuide($title);

            // All genres for contextual internal interlinking (Rule 9)
            $allGenres = Cache::remember('all_genres_nav_v3', 86400, fn() => \App\Models\Genre::withCount('titles')->orderBy('name')->get());

            // Search-intent dynamic SEO title and description
            $seoTitle = SeoHelper::generateTitleSeoTitle($title);
            $seoDescription = SeoHelper::generateTitleMetaDescription($title, $cast, $directors);

            return [
                'title'            => $title,
                'cast'             => $cast,
                'directors'        => $directors,
                'writers'          => $writers,
                'producers'        => $producers,
                'youtubeId'        => $youtubeId,
                'similarTitles'    => $similarTitles,
                'faqs'             => $faqs,
                'structuredData'   => $structuredData,
                'faqSchema'        => $faqSchema,
                'watchGuideSchema' => $watchGuideSchema,
                'seoTitle'         => $seoTitle,
                'seoDescription'   => $seoDescription,
                'allGenres'        => $allGenres,
            ];
        });

        $title = $cachedData['title'];

        // Live Reviews & Rating Breakdown (queried dynamically so new reviews appear immediately)
        $reviews = $title->reviews()->where('is_approved', true)->latest()->get();
        $reviewCount = $reviews->count();
        $ratingDistribution = [
            10 => 0,
            9 => 0,
            8 => 0,
            7 => 0,
            6 => 0,
            5 => 0,
            4 => 0,
            3 => 0,
            2 => 0,
            1 => 0,
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
    protected function generateTitleFaqs(Title $title, $directors, $writers, $cast): array
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
            $castWithChars = $cast->take(5)->map(function ($c) {
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
            $writerNames = $writers && $writers->isNotEmpty() ? $writers->map(fn($w) => $w->person?->name)->filter()->join(', ', ' and ') : null;
            $writerPart = $writerNames ? " and written by {$writerNames}" : '';

            $faqs[] = [
                'question' => "Who directed and wrote {$title->title}?",
                'answer' => "{$title->title} was directed by {$directorNames}{$writerPart}. Explore their complete filmographies and upcoming releases on TonightOnScreen.",
            ];
        }

        // Story Synopsis ("{movie_name} movie", "{movie_name} film", "what is {show} about")
        if (!empty($title->overview)) {
            $typeLabel = $isSeries ? 'show' : 'movie';
            $faqs[] = [
                'question' => "What is the story / plot of {$title->title} about?",
                'answer' => SeoHelper::cleanMetaDescription($title->overview, 250),
            ];
        }

        // F1. TOS Rating & IMDb-style Rating ("{movie} rating", "{movie} imdb rating", "{movie} movie rating")
        if ($title->rating && (float) $title->rating > 0) {
            $ratingText = number_format((float) $title->rating, 1);
            $contentRatingPart = $title->content_rating
                ? " The official age classification is {$title->content_rating}."
                : '';
            $faqs[] = [
                'question' => "What is the rating of {$title->title}? ({$title->title} TonightOnScreen Rating)",
                'answer'   => "{$title->title} holds a TonightOnScreen audience and critical rating of {$ratingText}/10.{$contentRatingPart} Explore full cast reactions and verified community reviews on TonightOnScreen.",
            ];
        }

        // F2. Age Classification / Content Rating ("{movie} age rating", "{movie} certificate", "{movie} rating age")
        if ($title->content_rating) {
            $faqs[] = [
                'question' => "What is the age rating / content classification of {$title->title}?",
                'answer'   => "{$title->title} carries an official content rating of {$title->content_rating}. This classification helps parents and viewers make informed decisions about suitability before watching.",
            ];
        }

        // F3. Character-to-Actor Lookup ("who played [character] in {movie}", "[character] actor", "{character} braveheart")
        if ($cast->isNotEmpty()) {
            $characterActorPairs = $cast
                ->filter(fn($c) => !empty($c->character_name) && !empty($c->person?->name))
                ->take(6)
                ->map(fn($c) => "{$c->character_name} is played by {$c->person->name}")
                ->join('; ');

            if ($characterActorPairs) {
                $faqs[] = [
                    'question' => "Who plays which character in {$title->title}? (Character & Actor Guide)",
                    'answer'   => "In {$title->title}: {$characterActorPairs}. Find complete character profiles, role details, and full actor biographies on TonightOnScreen.",
                ];
            }
        }

        // F4. Title / Name Meaning ("{movie} meaning", "{movie} title meaning", "rangasthalam meaning")
        // Prioritise non-English titles or any title with a tagline that could explain its name
        if (!empty($title->tagline) && !empty($title->overview)) {
            $titleWords    = explode(' ', $title->title);
            $hasNonAscii   = collect($titleWords)->some(fn($w) => (bool) preg_match('/[^\x00-\x7F]/', $w));
            $likelyNonEn   = $hasNonAscii || (in_array(strtolower($title->original_language ?? ''), SeoHelper::INDIAN_LANGUAGES));
            if ($likelyNonEn) {
                $faqs[] = [
                    'question' => "What is the meaning of the title \"{$title->title}\"?",
                    'answer'   => "The title \"{$title->title}\" is accompanied by the tagline: \"{$title->tagline}\". " .
                                  "The name reflects the core themes of the {$typeWord}. " .
                                  "Explore the full synopsis and storyline context on TonightOnScreen.",
                ];
            }
        }

        // F5. Franchise / Sequel Identification ("{movie} 2", "{franchise} sequel order", "{movie} part of franchise?")
        if ($title->relationLoaded('productionCompanies') && $title->productionCompanies->isNotEmpty()) {
            $companyNames = $title->productionCompanies->pluck('name')->join(', ', ' and ');
            $faqs[] = [
                'question' => "Is {$title->title} part of a franchise or does it have sequels?",
                'answer'   => "{$title->title} was produced by {$companyNames}. " .
                              "To discover related sequels, prequels, and the complete franchise viewing order, " .
                              "explore the production company catalogue and genre collections on TonightOnScreen.",
            ];
        }

        // G1. Seasons & Episodes Count — Series only ("how many seasons does {show} have", "how many episodes")
        if ($isSeries && $title->relationLoaded('seasons') && $title->seasons->isNotEmpty()) {
            $seasonCount  = $title->seasons->count();
            $episodeCount = $title->seasons->sum(fn($s) => $s->episodes->count());
            $seasonWord   = Str::plural('season', $seasonCount);
            $faqs[] = [
                'question' => "How many seasons and episodes does {$title->title} have?",
                'answer'   => "{$title->title} has {$seasonCount} {$seasonWord}" .
                              ($episodeCount > 0 ? " with a total of {$episodeCount} episodes." : ".") .
                              " Complete season and episode guides, including air dates and synopses, are available on TonightOnScreen.",
            ];
        }

        // G2. Which studio / production company made it? ("{movie} studio", "who made {movie}", "{movie} production company")
        if ($title->relationLoaded('productionCompanies') && $title->productionCompanies->isNotEmpty()) {
            $companies = $title->productionCompanies->pluck('name')->join(', ', ' and ');
            $faqs[] = [
                'question' => "Which studio or production company made {$title->title}?",
                'answer'   => "{$title->title} was produced by {$companies}. " .
                              "Explore their complete film catalogue and other acclaimed productions on TonightOnScreen.",
            ];
        }

        // G3. Country of Origin ("{movie} which country", "is {movie} an Indian movie", "{movie} origin")
        if (!empty($title->origin_country)) {
            $langPart = $title->original_language
                ? ", originally produced in the " . ucfirst($title->original_language) . " language"
                : '';
            $faqs[] = [
                'question' => "Which country is {$title->title} from? (Origin & Language)",
                'answer'   => "{$title->title} is a {$title->origin_country} production{$langPart}. " .
                              "It represents the rich cinematic heritage of {$title->origin_country} cinema.",
            ];
        }

        // G4. Is it worth watching? ("is {movie} worth watching", "should i watch {movie}", "{movie} recommended")
        if ($title->rating && (float) $title->rating > 0) {
            $r = (float) $title->rating;
            $rStr = number_format($r, 1);
            if ($r >= 8.5) {
                $verdict = "Masterpiece — Essential Viewing";
                $reason  = "With an outstanding {$rStr}/10 rating, {$title->title} is universally acclaimed and considered one of the finest {$typeWord}s of its kind.";
            } elseif ($r >= 7.5) {
                $verdict = "Highly Recommended";
                $reason  = "Rated {$rStr}/10, {$title->title} is a highly regarded {$typeWord} that consistently earns strong audience and critical praise.";
            } elseif ($r >= 6.5) {
                $verdict = "Recommended — Worth a Watch";
                $reason  = "With a solid {$rStr}/10 rating, {$title->title} is an enjoyable {$typeWord} that most viewers find worthwhile.";
            } else {
                $verdict = "Mixed Reception";
                $reason  = "{$title->title} carries a {$rStr}/10 rating, reflecting a divided audience and critical response.";
            }
            $faqs[] = [
                'question' => "Is {$title->title} worth watching? (Recommendation & Verdict)",
                'answer'   => "{$verdict}. {$reason} " .
                              "Read in-depth verified audience reviews and the complete critical breakdown on TonightOnScreen.",
            ];
        }

        return $faqs;
    }

    /**
     * Get intelligently ranked similar titles based on shared genres, directors, stars, language, and theme.
     */
    protected function getSimilarTitles(Title $title, int $limit = 6)
    {
        $genreIds = $title->genres->pluck('id')->filter()->toArray();
        $directorIds = $title->credits
            ->filter(fn($c) => $c->department === 'Directing' || (is_string($c->job) && stripos($c->job, 'director') !== false))
            ->pluck('person_id')->filter()->toArray();
        $keyActorIds = $title->credits
            ->where('department', 'Acting')
            ->take(3)
            ->pluck('person_id')->filter()->toArray();

        $candidates = Title::query()
            ->where('id', '!=', $title->id)
            ->where('is_active', true)
            ->where(function ($q) use ($genreIds, $directorIds, $keyActorIds, $title) {
                $hasCondition = false;
                if (!empty($genreIds)) {
                    $q->whereHas('genres', fn($gq) => $gq->whereIn('genres.id', $genreIds));
                    $hasCondition = true;
                }
                if (!empty($directorIds) || !empty($keyActorIds)) {
                    $peopleIds = array_merge($directorIds, $keyActorIds);
                    if ($hasCondition) {
                        $q->orWhereHas('credits', fn($cq) => $cq->whereIn('person_id', $peopleIds));
                    } else {
                        $q->whereHas('credits', fn($cq) => $cq->whereIn('person_id', $peopleIds));
                        $hasCondition = true;
                    }
                }
                if (!$hasCondition) {
                    $q->where('type', $title->type)
                      ->where('original_language', $title->original_language);
                }
            })
            ->with([
                'genres:id,name,slug',
                'credits' => fn($q) => $q->where('is_featured', true)->with('person:id,name,slug')->take(3)
            ])
            ->select(['id', 'title', 'slug', 'type', 'poster_path', 'rating', 'release_date', 'original_language', 'origin_country', 'budget', 'box_office', 'tagline', 'content_rating', 'runtime_minutes'])
            ->get();

        if ($candidates->isEmpty()) {
            return Title::query()
                ->where('id', '!=', $title->id)
                ->where('is_active', true)
                ->where('type', $title->type)
                ->with('genres:id,name,slug')
                ->latest('rating')
                ->take($limit)
                ->get();
        }

        $directorPerson = $title->credits->first(fn($c) => $c->department === 'Directing')?->person;
        $leadActorPerson = $title->credits->first(fn($c) => $c->department === 'Acting')?->person;

        return $candidates->map(function ($candidate) use ($title, $genreIds, $directorIds, $keyActorIds, $directorPerson, $leadActorPerson) {
            $score = 0;
            $matchReasons = [];

            // 1. Same Director (10 pts)
            $candPersonIds = $candidate->credits->pluck('person_id')->toArray();
            if (!empty($directorIds) && !empty(array_intersect($directorIds, $candPersonIds))) {
                $score += 10;
                if ($directorPerson) {
                    $matchReasons[] = "Directed by {$directorPerson->name}";
                }
            }

            // 2. Same Lead Star (7 pts)
            if (!empty($keyActorIds) && !empty(array_intersect($keyActorIds, $candPersonIds))) {
                $score += 7;
                if ($leadActorPerson) {
                    $matchReasons[] = "Stars {$leadActorPerson->name}";
                }
            }

            // 3. Shared Genres (4 pts each)
            $candGenreIds = $candidate->genres->pluck('id')->toArray();
            $sharedGenres = array_intersect($genreIds, $candGenreIds);
            $sharedCount = count($sharedGenres);
            $score += $sharedCount * 4;
            if ($sharedCount > 0 && empty($matchReasons)) {
                $sharedNames = $candidate->genres->whereIn('id', $sharedGenres)->pluck('name')->take(2)->implode(' & ');
                $matchReasons[] = "Genre: {$sharedNames}";
            }

            // 4. Same Language & Country
            if (!empty($title->original_language) && $candidate->original_language === $title->original_language) {
                $score += 3;
            }
            if (!empty($title->origin_country) && $candidate->origin_country === $title->origin_country) {
                $score += 1;
            }

            // 5. Same Type
            if ($candidate->type === $title->type) {
                $score += 2;
            }

            // 6. Rating boost
            $score += ((float) $candidate->rating) * 0.5;

            $candidate->similarity_score = $score;
            $candidate->match_reason = !empty($matchReasons) ? $matchReasons[0] : ($candidate->genres->first()?->name ? $candidate->genres->first()->name . ' Movie' : 'Recommended');
            return $candidate;
        })
        ->sortByDesc('similarity_score')
        ->take($limit)
        ->values();
    }
}
