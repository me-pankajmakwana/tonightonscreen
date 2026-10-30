<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\StreamingPlatform;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlatformController extends Controller
{
    /**
     * Display all streaming platforms & networks directory
     */
    public function index(): View
    {
        $platforms = StreamingPlatform::where('is_active', true)
            ->withCount('titles')
            ->orderByDesc('display_priority')
            ->orderBy('name')
            ->get();

        $featuredTitles = Title::has('platforms')
            ->with(['platforms', 'genres'])
            ->orderByDesc('rating')
            ->take(8)
            ->get();

        $seoTitle = "Streaming Services Guide — Watch Movies & Shows on Netflix, Disney+, Prime & More | TonightOnScreen";
        $seoDescription = "Find out where to stream your favorite movies and TV shows. Browse streaming platforms including Netflix, Disney+, Amazon Prime Video, Apple TV+, and more with release guides.";

        return view('platforms.index', compact('platforms', 'featuredTitles', 'seoTitle', 'seoDescription'));
    }

    /**
     * Show a specific streaming platform with its titles
     */
    public function show(string $slug, Request $request): View
    {
        $platform = StreamingPlatform::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $type = $request->query('type', 'all');
        $genreSlug = $request->query('genre');
        $sort = $request->query('sort', 'rating'); // rating, newest, popularity

        $query = $platform->titles()->with(['genres']);

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

        if ($sort === 'newest') {
            $query->orderByDesc('release_date');
        } elseif ($sort === 'popularity') {
            $query->orderByDesc('is_trending')->orderByDesc('rating');
        } else {
            $query->orderByDesc('rating');
        }

        $titles = $query->paginate(20)->withQueryString();
        $genres = Genre::orderBy('name')->get();

        // Other platforms for cross-linking
        $otherPlatforms = StreamingPlatform::where('is_active', true)
            ->where('id', '!=', $platform->id)
            ->orderByDesc('display_priority')
            ->take(6)
            ->get();

        $seoTitle = "Best Movies & TV Shows on {$platform->name} Tonight — Streaming Guide | TonightOnScreen";
        $seoDescription = "What to watch on {$platform->name} right now. Discover top-rated films, critically acclaimed series, and new releases streaming on {$platform->name} with ratings & reviews.";

        return view('platforms.show', compact(
            'platform',
            'titles',
            'genres',
            'otherPlatforms',
            'type',
            'genreSlug',
            'sort',
            'seoTitle',
            'seoDescription'
        ));
    }
}
