<?php

namespace App\Http\Controllers;

use App\Enums\TitleType;
use App\Models\StreamingPlatform;
use App\Models\Title;
use App\Support\SeoHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WhatToWatchController extends Controller
{
    /**
     * Map mood keys to relevant Genre names.
     */
    protected const MOOD_MAP = [
        'action' => ['Action', 'Adventure'],
        'thriller' => ['Thriller', 'Mystery', 'Crime'],
        'comedy' => ['Comedy'],
        'drama' => ['Drama', 'Biography', 'History'],
        'romance' => ['Romance'],
        'horror' => ['Horror'],
        'scifi' => ['Science Fiction', 'Sci-Fi', 'Fantasy'],
        'feelgood' => ['Family', 'Animation', 'Comedy'],
    ];

    /**
     * Display the What to Watch Tonight discovery page.
     */
    public function index(Request $request): View
    {
        $platforms = StreamingPlatform::where('is_active', true)
            ->orderBy('display_priority')
            ->orderBy('name')
            ->get();

        $mood = $request->input('mood', 'action');
        $duration = $request->input('duration', 'any');
        $platform = $request->input('platform', 'all');
        $type = $request->input('type', 'all');

        $recommendations = $this->queryRecommendations($mood, $duration, $platform, $type, 9);

        // SEO Schema & Meta
        $seoTitle = "What to Watch Tonight — Curated Movie & Streaming Recommender";
        $seoDescription = "Can't decide what to watch tonight? Pick your mood, time budget, and streaming service (Netflix, Prime, Hotstar) to find the perfect movie or series instantly.";
        $seoKeywords = [
            'what to watch tonight',
            'what should i watch tonight',
            'movie recommender by mood',
            'best movies to stream tonight',
            'what to watch on netflix tonight',
            'what to watch on prime video',
            'streaming recommendation guide',
        ];

        return view('pages.what-to-watch', [
            'platforms' => $platforms,
            'recommendations' => $recommendations,
            'selectedMood' => $mood,
            'selectedDuration' => $duration,
            'selectedPlatform' => $platform,
            'selectedType' => $type,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
        ]);
    }

    /**
     * Reactive JSON API for instant client-side mood filtering.
     */
    public function recommend(Request $request): JsonResponse
    {
        $mood = (string) $request->input('mood', 'action');
        $duration = (string) $request->input('duration', 'any');
        $platform = (string) $request->input('platform', 'all');
        $type = (string) $request->input('type', 'all');

        $titles = $this->queryRecommendations($mood, $duration, $platform, $type, 6);

        $formatted = $titles->map(function (Title $t) {
            $isSeries = ($t->type instanceof TitleType ? $t->type === TitleType::TV_SERIES : str_contains((string) $t->type, 'series'));
            $topPlatform = $t->streamingPlatforms->first();

            return [
                'id' => $t->id,
                'title' => $t->title,
                'slug' => $t->slug,
                'url' => route('title.show', $t->slug),
                'poster' => $t->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                'year' => $t->release_date?->format('Y') ?: $t->release_year,
                'rating' => $t->rating ? number_format((float) $t->rating, 1) : null,
                'runtime_formatted' => $t->runtime ? "{$t->runtime} min" : null,
                'type_label' => $isSeries ? 'TV Series' : 'Movie',
                'overview' => SeoHelper::cleanMetaDescription($t->overview ?: $t->tagline, 140),
                'genres' => $t->genres->pluck('name')->take(2)->values(),
                'platform' => $topPlatform ? [
                    'name' => $topPlatform->name,
                    'watch_url' => $topPlatform->pivot->watch_url ?: route('title.show', $t->slug),
                    'access' => $topPlatform->pivot->access_type ?: 'Streaming',
                ] : null,
            ];
        });

        return response()->json([
            'mood' => $mood,
            'duration' => $duration,
            'platform' => $platform,
            'count' => $formatted->count(),
            'recommendations' => $formatted,
        ]);
    }

    /**
     * Query recommendations matching criteria.
     */
    protected function queryRecommendations(string $mood, string $duration, string $platform, string $type, int $limit)
    {
        $query = Title::query()
            ->where('is_active', true)
            ->with(['streamingPlatforms', 'genres']);

        // 1. Mood / Genre Filter
        if (isset(self::MOOD_MAP[$mood])) {
            $targetGenres = self::MOOD_MAP[$mood];
            $query->whereHas('genres', function ($q) use ($targetGenres) {
                $q->whereIn('name', $targetGenres);
            });
        }

        // 2. Duration / Runtime Filter
        if ($duration === 'quick') {
            $query->where('runtime', '>', 0)->where('runtime', '<=', 105);
        } elseif ($duration === 'medium') {
            $query->whereBetween('runtime', [106, 145]);
        } elseif ($duration === 'epic') {
            $query->where('runtime', '>', 145);
        }

        // 3. Platform Filter
        if ($platform !== 'all' && !empty($platform)) {
            $query->whereHas('streamingPlatforms', function ($q) use ($platform) {
                $q->where('slug', $platform);
            });
        }

        // 4. Type Filter
        if ($type === 'movie') {
            $query->where('type', '!=', 'tv_series');
        } elseif ($type === 'tv_series') {
            $query->where('type', 'tv_series');
        }

        return $query->orderByDesc('rating')
            ->orderByDesc('release_date')
            ->take($limit)
            ->get();
    }
}

