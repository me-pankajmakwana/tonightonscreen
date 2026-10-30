<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TopRatedController extends Controller
{
    /**
     * Display the Top Rated Movies & TV Shows of All Time (High Search Intent SEO Hub)
     */
    public function index(Request $request): View
    {
        $type = $request->query('type', 'all'); // all, movie, tv_series
        $genreSlug = $request->query('genre');
        $minRating = (float) $request->query('min_rating', 7.0);

        $query = Title::query()
            ->with(['genres', 'directors'])
            ->whereNotNull('rating')
            ->where('rating', '>=', $minRating);

        if ($type === 'movie') {
            $query->where('type', 'movie');
        } elseif ($type === 'tv_series') {
            $query->where('type', 'tv_series');
        }

        if ($genreSlug) {
            $query->whereHas('genres', function ($q) use ($genreSlug) {
                $q->where('slug', $genreSlug);
            });
        }

        $titles = $query->orderByDesc('rating')
            ->orderByDesc('release_date')
            ->paginate(24)
            ->withQueryString();

        $genres = Genre::orderBy('name')->get();
        $selectedGenre = $genreSlug ? $genres->firstWhere('slug', $genreSlug) : null;

        // Dynamic SEO Title & Description
        $typeLabel = match($type) {
            'movie' => 'Movies',
            'tv_series' => 'TV Series & Shows',
            default => 'Movies & TV Series',
        };

        $genreLabel = $selectedGenre ? " in {$selectedGenre->name}" : '';
        $seoTitle = "Top Rated {$typeLabel}{$genreLabel} — Best of All Time | TonightOnScreen";
        $seoDescription = "Discover the highest-rated {$typeLabel}{$genreLabel} as rated by cinema critics and film lovers. Browse IMDb/TOS top-ranked titles with streaming availability, cast, and reviews.";

        return view('hubs.top-rated', compact(
            'titles',
            'genres',
            'type',
            'genreSlug',
            'selectedGenre',
            'minRating',
            'seoTitle',
            'seoDescription'
        ));
    }

    /**
     * Display Trending Movies & TV Shows Tonight
     */
    public function trending(Request $request): View
    {
        $type = $request->query('type', 'all');

        $query = Title::query()
            ->with(['genres', 'platforms'])
            ->whereNotNull('poster_path');

        if ($type === 'movie') {
            $query->where('type', 'movie');
        } elseif ($type === 'tv_series') {
            $query->where('type', 'tv_series');
        }

        $titles = $query->orderByDesc('is_trending')
            ->orderByDesc('rating')
            ->orderByDesc('release_date')
            ->paginate(24)
            ->withQueryString();

        $genres = Genre::orderBy('name')->get();

        $typeLabel = match($type) {
            'movie' => 'Movies',
            'tv_series' => 'TV Shows',
            default => 'Movies & TV Shows',
        };

        $seoTitle = "Trending {$typeLabel} Tonight — What to Watch Right Now | TonightOnScreen";
        $seoDescription = "Explore the hottest trending {$typeLabel} streaming tonight. Real-time popularity rankings, critical consensus, streaming guides, and trailers.";

        return view('hubs.trending', compact(
            'titles',
            'genres',
            'type',
            'seoTitle',
            'seoDescription'
        ));
    }
}
