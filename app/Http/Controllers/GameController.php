<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Support\SeoHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * Display the Gaming Arcade Hub.
     */
    public function index(): View
    {
        $seoTitle = "Free Cinema Games & Daily Movie Trivia Online — TonightOnScreen";
        $seoDescription = "Play free interactive cinema games! Test your movie knowledge with our Daily Cinele mystery puzzle and the addictive Box Office Higher or Lower clash.";
        $seoKeywords = [
            'movie games online',
            'cinema trivia games',
            'guess the movie game',
            'box office higher or lower',
            'daily movie puzzle',
            'cinenerdle alternative',
            'free film games',
            'bollywood movie quiz',
            'hollywood trivia game',
        ];

        // Schema.org WebApplication & VideoGame Hub
        $hubSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'TonightOnScreen Cinema Games Arcade',
            'description' => $seoDescription,
            'url' => route('games.index'),
            'hasPart' => [
                [
                    '@type' => 'VideoGame',
                    'name' => 'Daily Cinele — Mystery Movie Guesser',
                    'url' => route('games.cinele'),
                    'genre' => ['Puzzle', 'Trivia'],
                    'gamePlatform' => ['Web Browser', 'Mobile Web'],
                    'operatingSystem' => 'Any',
                ],
                [
                    '@type' => 'VideoGame',
                    'name' => 'Box Office Clash — Higher or Lower Game',
                    'url' => route('games.higher-lower'),
                    'genre' => ['Trivia', 'Casual'],
                    'gamePlatform' => ['Web Browser', 'Mobile Web'],
                    'operatingSystem' => 'Any',
                ],
            ],
        ];

        $faqs = [
            [
                'question' => "What cinema games can I play on TonightOnScreen?",
                'answer' => "TonightOnScreen features two interactive games: Daily Cinele (where you guess a mystery film from 5 progressive clues) and Box Office Clash (a fast-paced Higher or Lower game comparing worldwide ticket sales).",
            ],
            [
                'question' => "Are the TonightOnScreen games free to play?",
                'answer' => "Yes, all cinema games on TonightOnScreen are 100% free with no account creation or subscription required.",
            ],
            [
                'question' => "When does the Daily Cinele puzzle reset?",
                'answer' => "Daily Cinele resets every midnight local time with a new mystery movie from Indian and global cinema.",
            ],
        ];

        $faqSchema = SeoHelper::buildFaqSchema($faqs);

        return view('games.index', [
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
            'hubSchema' => $hubSchema,
            'faqSchema' => $faqSchema,
            'faqs' => $faqs,
        ]);
    }

    /**
     * Display the Box Office Higher or Lower Game.
     */
    public function higherLower(): View
    {
        $seoTitle = "Box Office Clash: Higher or Lower Movie Game — TonightOnScreen";
        $seoDescription = "Did Jawan gross more than Kalki 2898 AD? Test your box office intuition in the ultimate Higher or Lower cinema clash. Play free with live streak tracking!";
        $seoKeywords = [
            'box office game',
            'higher or lower movie game',
            'box office clash',
            'movie gross quiz',
            'higher lower box office',
            'guess the box office collection',
            'cinema revenue game',
        ];

        $gameSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'VideoGame',
            'name' => 'Box Office Clash: The Higher or Lower Movie Game',
            'description' => $seoDescription,
            'url' => route('games.higher-lower'),
            'genre' => ['Trivia', 'Casual'],
            'gamePlatform' => ['Web Browser', 'Mobile Web'],
            'applicationCategory' => 'Game',
            'operatingSystem' => 'Any',
        ];

        $faqs = [
            [
                'question' => "How do you play the Box Office Higher or Lower game?",
                'answer' => "You are presented with two movies. The first movie reveals its worldwide box office collection. You must guess whether the second movie grossed HIGHER or LOWER. Each correct guess adds to your streak!",
            ],
            [
                'question' => "Where do the box office numbers come from?",
                'answer' => "All box office numbers are sourced from verified production house reports, theatrical distributors, and industry box office aggregators cataloged on TonightOnScreen.",
            ],
        ];

        $faqSchema = SeoHelper::buildFaqSchema($faqs);

        // Fetch initial pair
        $initialPair = $this->fetchRandomPair();

        return view('games.higher-lower', [
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
            'gameSchema' => $gameSchema,
            'faqSchema' => $faqSchema,
            'faqs' => $faqs,
            'initialPair' => $initialPair,
        ]);
    }

    /**
     * API: Fetch next challenger title for Higher or Lower.
     */
    public function higherLowerNext(Request $request): JsonResponse
    {
        $excludeId = (int) $request->input('exclude_id', 0);

        $challenger = Title::query()
            ->where('is_active', true)
            ->where('box_office', '>', 5000000)
            ->where('id', '!=', $excludeId)
            ->with(['directors.person'])
            ->inRandomOrder()
            ->first();

        if (!$challenger) {
            return response()->json(['error' => 'No challenger found'], 404);
        }

        return response()->json([
            'id' => $challenger->id,
            'title' => $challenger->title,
            'slug' => $challenger->slug,
            'year' => $challenger->release_date?->format('Y') ?: $challenger->release_year,
            'poster' => $challenger->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
            'director' => $challenger->directors->first()?->person?->name ?: 'Celebrated Director',
            'box_office_raw' => (int) $challenger->box_office,
            'box_office_formatted' => $challenger->formatted_box_office,
        ]);
    }

    /**
     * Display the Daily Cinele Game.
     */
    public function cinele(): View
    {
        $todayDate = now()->format('Y-m-d');
        $todaySeed = crc32($todayDate);

        $eligibleTitles = Title::query()
            ->where('is_active', true)
            ->whereNotNull('release_date')
            ->where('rating', '>=', 6.0)
            ->with(['genres', 'directors.person', 'cast.person'])
            ->orderBy('id')
            ->get();

        if ($eligibleTitles->isEmpty()) {
            $eligibleTitles = Title::query()->where('is_active', true)->with(['genres'])->get();
        }

        $dailyIndex = abs($todaySeed) % $eligibleTitles->count();
        $dailyTitle = $eligibleTitles->get($dailyIndex);

        $dayNumber = (int) (now()->diffInDays('2026-01-01') + 1);

        // Prepare Progressive Clues
        $clues = [
            1 => [
                'type' => 'Release & Genre',
                'badge' => 'Clue 1',
                'title' => ($dailyTitle->release_date?->format('Y') ?: $dailyTitle->release_year) . ' • ' . $dailyTitle->genres->pluck('name')->join(', '),
                'subtitle' => 'Runtime: ' . ($dailyTitle->runtime ? "{$dailyTitle->runtime} mins" : 'Feature Length') . ($dailyTitle->content_rating ? " | Certificate: {$dailyTitle->content_rating}" : ''),
            ],
            2 => [
                'type' => 'Visionary Director',
                'badge' => 'Clue 2',
                'title' => 'Directed by ' . ($dailyTitle->directors->first()?->person?->name ?: 'Acclaimed Filmmaker'),
                'subtitle' => 'Production Country: ' . ($dailyTitle->origin_country ?: 'World Cinema'),
            ],
            3 => [
                'type' => 'Box Office & Commercial Verdict',
                'badge' => 'Clue 3',
                'title' => $dailyTitle->box_office_verdict ?: 'Major Theatrical Release',
                'subtitle' => 'Worldwide Gross: ' . ($dailyTitle->formatted_box_office ?: 'Blockbuster Collections') . ($dailyTitle->budget ? " | Budget: {$dailyTitle->formatted_budget}" : ''),
            ],
            4 => [
                'type' => 'Starring Cast',
                'badge' => 'Clue 4',
                'title' => 'Starring: ' . ($dailyTitle->cast->take(3)->map(fn($c) => $c->person?->name)->filter()->join(', ') ?: 'Ensemble Cast'),
                'subtitle' => 'Character Roles cataloged on TonightOnScreen',
            ],
            5 => [
                'type' => 'Tagline & Plot Hook',
                'badge' => 'Clue 5',
                'title' => !empty($dailyTitle->tagline) ? '"' . $dailyTitle->tagline . '"' : 'Final Clue: Unblurring Poster',
                'subtitle' => SeoHelper::cleanMetaDescription($dailyTitle->overview, 110),
            ],
        ];

        $seoTitle = "Daily Cinele #{$dayNumber} — Guess the Mystery Movie in 5 Clues";
        $seoDescription = "Can you guess today's mystery movie in 5 clues? Play Daily Cinele #{$dayNumber} on TonightOnScreen. New puzzle unlocks every midnight!";
        $seoKeywords = [
            'daily cinele',
            'guess the movie game',
            'movie wordle',
            'daily film puzzle',
            'guess movie from clues',
            'framed movie game alternative',
            'cinenerdle today',
            'bollywood movie guesser',
        ];

        $gameSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'VideoGame',
            'name' => "Daily Cinele — Daily Cinema Mystery Game #{$dayNumber}",
            'description' => $seoDescription,
            'url' => route('games.cinele'),
            'genre' => ['Puzzle', 'Trivia'],
            'gamePlatform' => ['Web Browser', 'Mobile Web'],
            'operatingSystem' => 'Any',
        ];

        $faqs = [
            [
                'question' => "How does Daily Cinele work?",
                'answer' => "You have 5 attempts to guess today's mystery movie. Each guess reveals a new progressive clue: starting with release year and genre, then director, box office verdict, lead cast, and finally the tagline.",
            ],
            [
                'question' => "Is there a new Cinele puzzle every day?",
                'answer' => "Yes! Every day at midnight local time, a brand new movie puzzle is automatically generated.",
            ],
        ];

        $faqSchema = SeoHelper::buildFaqSchema($faqs);

        return view('games.cinele', [
            'dayNumber' => $dayNumber,
            'todayDate' => $todayDate,
            'clues' => $clues,
            'dailyTitle' => $dailyTitle,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
            'gameSchema' => $gameSchema,
            'faqSchema' => $faqSchema,
            'faqs' => $faqs,
        ]);
    }

    /**
     * API: Validate guess for Daily Cinele.
     */
    public function cineleGuess(Request $request): JsonResponse
    {
        $guessSlug = (string) $request->input('guess_slug', '');
        $todayDate = now()->format('Y-m-d');
        $todaySeed = crc32($todayDate);

        $eligibleTitles = Title::query()
            ->where('is_active', true)
            ->whereNotNull('release_date')
            ->where('rating', '>=', 6.0)
            ->orderBy('id')
            ->get();

        if ($eligibleTitles->isEmpty()) {
            $eligibleTitles = Title::query()->where('is_active', true)->get();
        }

        $dailyIndex = abs($todaySeed) % $eligibleTitles->count();
        $dailyTitle = $eligibleTitles->get($dailyIndex);

        $isCorrect = ($dailyTitle && $dailyTitle->slug === $guessSlug);

        // Fetch the guessed movie info for display
        $guessedTitle = Title::where('slug', $guessSlug)->first();

        return response()->json([
            'is_correct' => $isCorrect,
            'guessed_title' => $guessedTitle?->title ?: $guessSlug,
            'guessed_year' => $guessedTitle?->release_date?->format('Y') ?: $guessedTitle?->release_year,
            'guessed_poster' => $guessedTitle?->poster_url,
            'actual_title' => $isCorrect ? $dailyTitle->title : null,
            'actual_url' => $isCorrect ? route('title.show', $dailyTitle->slug) : null,
        ]);
    }

    /**
     * Helper: Fetch a clean random pair for Higher or Lower.
     */
    protected function fetchRandomPair(): array
    {
        $titles = Title::query()
            ->where('is_active', true)
            ->where('box_office', '>', 5000000)
            ->with(['directors.person'])
            ->inRandomOrder()
            ->take(2)
            ->get();

        if ($titles->count() < 2) {
            $titles = Title::query()->where('is_active', true)->take(2)->get();
        }

        $first = $titles[0];
        $second = $titles[1];

        return [
            'first' => [
                'id' => $first->id,
                'title' => $first->title,
                'slug' => $first->slug,
                'year' => $first->release_date?->format('Y') ?: $first->release_year,
                'poster' => $first->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                'director' => $first->directors->first()?->person?->name ?: 'Celebrated Director',
                'box_office_raw' => (int) $first->box_office,
                'box_office_formatted' => $first->formatted_box_office,
            ],
            'second' => [
                'id' => $second->id,
                'title' => $second->title,
                'slug' => $second->slug,
                'year' => $second->release_date?->format('Y') ?: $second->release_year,
                'poster' => $second->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                'director' => $second->directors->first()?->person?->name ?: 'Celebrated Director',
                'box_office_raw' => (int) $second->box_office,
                'box_office_formatted' => $second->formatted_box_office,
            ],
        ];
    }
}

