<?php

namespace App\Http\Controllers;

use App\Enums\TitleType;
use App\Models\Genre;
use App\Models\StreamingPlatform;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ExploreController extends Controller
{
    /**
     * Display the advanced exploration, search & filter page.
     * Engineered for maximum speed, strict input validation and zero N+1 queries.
     */
    public function __invoke(Request $request)
    {
        // 1. Sanitized Inputs
        $search = trim((string) $request->input('q', ''));
        $type = $request->input('type', 'all');
        $genreSlug = $request->input('genre');
        $platformSlug = $request->input('platform');
        $minRating = $request->input('rating');
        $sort = $request->input('sort', 'trending');

        // Whitelist allowed sort values
        $validSorts = ['trending', 'rating_desc', 'date_desc', 'date_asc', 'title_asc'];
        if (! in_array($sort, $validSorts, true)) {
            $sort = 'trending';
        }

        // 2. Query Builder with Conditional Eager Loading
        $query = Title::query()
            ->select(['id', 'title', 'slug', 'type', 'release_date', 'rating', 'poster_path', 'content_rating', 'is_trending', 'overview'])
            ->with([
                'genres:id,name,slug',
                'streamingPlatforms:id,name,slug',
            ]);

        // Search Filter (Titles, Synopsis or Talents)
        if (! empty($search)) {
            $sanitizedSearch = substr($search, 0, 80);
            $query->where(function ($sub) use ($sanitizedSearch) {
                $sub->where('title', 'like', "%{$sanitizedSearch}%")
                    ->orWhere('overview', 'like', "%{$sanitizedSearch}%")
                    ->orWhereHas('credits.person', function ($personQuery) use ($sanitizedSearch) {
                        $personQuery->where('name', 'like', "%{$sanitizedSearch}%");
                    });
            });
        }

        // Format / Type Filter
        if ($type === 'movie') {
            $query->where('type', TitleType::MOVIE);
        } elseif ($type === 'tv_series') {
            $query->where('type', TitleType::TV_SERIES);
        }

        // Genre Filter
        if (! empty($genreSlug)) {
            $query->whereHas('genres', function ($gQuery) use ($genreSlug) {
                $gQuery->where('genres.slug', $genreSlug);
            });
        }

        // Streaming OTT Platform Filter
        if (! empty($platformSlug)) {
            $query->whereHas('streamingPlatforms', function ($pQuery) use ($platformSlug) {
                $pQuery->where('streaming_platforms.slug', $platformSlug);
            });
        }

        // Rating Threshold Filter
        if (is_numeric($minRating) && (float) $minRating > 0) {
            $query->where('rating', '>=', min(9.9, (float) $minRating));
        }

        // Ordering Strategy
        match ($sort) {
            'rating_desc' => $query->orderByDesc('rating')->orderByDesc('release_date'),
            'date_desc' => $query->orderByDesc('release_date'),
            'date_asc' => $query->orderBy('release_date'),
            'title_asc' => $query->orderBy('title'),
            default => $query->orderByDesc('is_trending')->orderByDesc('rating')->latest('id'),
        };

        // 3. Fast Paginated Results
        $titles = $query->paginate(12)->withQueryString();

        // 4. Cached Filter Options (<1ms)
        $genres = Cache::remember('explore_all_genres', 3600, fn() => Genre::orderBy('name')->get(['id', 'name', 'slug']));
        $platforms = Cache::remember('explore_all_platforms', 3600, fn() => StreamingPlatform::where('is_active', true)->orderBy('display_priority')->get(['id', 'name', 'slug']));

        $filters = [
            'q' => $search,
            'type' => $type,
            'genre' => $genreSlug,
            'platform' => $platformSlug,
            'rating' => $minRating,
            'sort' => $sort,
        ];

        return view('explore.index', compact('titles', 'genres', 'platforms', 'filters'));
    }
}
