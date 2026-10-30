<?php

namespace App\Http\Controllers;

use App\Enums\TitleType;
use App\Models\Genre;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GenreController extends Controller
{
    /**
     * Display the index directory of all entertainment genres.
     */
    public function index()
    {
        $genres = Genre::query()
            ->withCount('titles')
            ->orderBy('name')
            ->get();

        // Get top 1 featured title per genre for card preview
        $genreSpotlights = [];
        foreach ($genres as $genre) {
            $topTitle = $genre->titles()
                ->select(['titles.id', 'titles.title', 'titles.slug', 'titles.poster_path', 'titles.rating', 'titles.release_date'])
                ->orderByDesc('rating')
                ->first();
            $genreSpotlights[$genre->id] = $topTitle;
        }

        return view('genres.index', compact('genres', 'genreSpotlights'));
    }

    /**
     * Display a rich, dedicated Genre Landing Showcase page.
     */
    public function show(Request $request, string $slug)
    {
        $genre = Genre::query()
            ->where('slug', $slug)
            ->withCount('titles')
            ->firstOrFail();

        // Filter by format (all, movie, tv_series)
        $format = $request->input('format', 'all');
        $sort = $request->input('sort', 'rating_desc');

        $query = $genre->titles()
            ->select(['titles.id', 'titles.title', 'titles.slug', 'titles.type', 'titles.release_date', 'titles.rating', 'titles.poster_path', 'titles.backdrop_path', 'titles.content_rating', 'titles.overview', 'titles.tagline'])
            ->with([
                'genres:id,name,slug',
                'streamingPlatforms:id,name,slug',
            ]);

        if ($format === 'movie') {
            $query->where('titles.type', TitleType::MOVIE);
        } elseif ($format === 'tv_series') {
            $query->where('titles.type', TitleType::TV_SERIES);
        }

        // Apply sort
        match ($sort) {
            'date_desc' => $query->orderByDesc('titles.release_date'),
            'date_asc' => $query->orderBy('titles.release_date'),
            'title_asc' => $query->orderBy('titles.title'),
            default => $query->orderByDesc('titles.rating')->orderByDesc('titles.release_date'),
        };

        $titles = $query->paginate(12)->withQueryString();

        // Must-watch spotlight (Top-rated in this genre)
        $spotlight = $genre->titles()
            ->with(['genres:id,name,slug', 'streamingPlatforms:id,name,slug'])
            ->orderByDesc('rating')
            ->first();

        // Genre metrics
        $avgRating = round((float) $genre->titles()->avg('rating'), 1);
        $movieCount = $genre->titles()->where('type', TitleType::MOVIE)->count();
        $seriesCount = $genre->titles()->where('type', TitleType::TV_SERIES)->count();

        // All genres for comprehensive interlinking
        $allGenres = Cache::remember('genre_interlinking_all_v3', 3600, function () {
            return Genre::withCount('titles')
                ->orderBy('name')
                ->get();
        });
        $otherGenres = $allGenres;

        // Thematic color palettes per genre
        $themeMap = [
            'action' => [
                'accent' => 'from-amber-500 to-rose-600',
                'pill' => 'bg-amber-500/10 border-amber-500/20 text-amber-400',
                'badge' => 'bg-amber-400 text-slate-950',
                'glow' => 'bg-amber-500/15',
            ],
            'sci-fi' => [
                'accent' => 'from-cyan-400 to-indigo-600',
                'pill' => 'bg-cyan-500/10 border-cyan-500/20 text-cyan-400',
                'badge' => 'bg-cyan-400 text-slate-950',
                'glow' => 'bg-cyan-500/15',
            ],
            'drama' => [
                'accent' => 'from-amber-200 to-amber-600',
                'pill' => 'bg-amber-500/10 border-amber-500/20 text-amber-300',
                'badge' => 'bg-amber-400 text-slate-950',
                'glow' => 'bg-amber-500/15',
            ],
            'thriller' => [
                'accent' => 'from-emerald-400 to-teal-700',
                'pill' => 'bg-emerald-500/10 border-emerald-500/20 text-emerald-400',
                'badge' => 'bg-emerald-400 text-slate-950',
                'glow' => 'bg-emerald-500/15',
            ],
            'horror' => [
                'accent' => 'from-rose-500 to-red-800',
                'pill' => 'bg-rose-500/10 border-rose-500/20 text-rose-400',
                'badge' => 'bg-rose-500 text-white',
                'glow' => 'bg-rose-500/15',
            ],
            'comedy' => [
                'accent' => 'from-yellow-400 to-orange-500',
                'pill' => 'bg-yellow-500/10 border-yellow-500/20 text-yellow-400',
                'badge' => 'bg-yellow-400 text-slate-950',
                'glow' => 'bg-yellow-500/15',
            ],
            'romance' => [
                'accent' => 'from-pink-400 to-rose-600',
                'pill' => 'bg-pink-500/10 border-pink-500/20 text-pink-400',
                'badge' => 'bg-pink-400 text-slate-950',
                'glow' => 'bg-pink-500/15',
            ],
            'adventure' => [
                'accent' => 'from-amber-500 to-emerald-600',
                'pill' => 'bg-amber-500/10 border-amber-500/20 text-amber-400',
                'badge' => 'bg-amber-400 text-slate-950',
                'glow' => 'bg-amber-500/15',
            ],
            'mystery' => [
                'accent' => 'from-purple-400 to-indigo-700',
                'pill' => 'bg-purple-500/10 border-purple-500/20 text-purple-300',
                'badge' => 'bg-purple-400 text-slate-950',
                'glow' => 'bg-purple-500/15',
            ],
            'crime' => [
                'accent' => 'from-slate-300 to-slate-600',
                'pill' => 'bg-slate-500/10 border-slate-500/20 text-slate-300',
                'badge' => 'bg-slate-300 text-slate-950',
                'glow' => 'bg-slate-500/15',
            ],
        ];

        $theme = $themeMap[$genre->slug] ?? [
            'accent' => 'from-amber-400 to-rose-600',
            'pill' => 'bg-amber-500/10 border-amber-500/20 text-amber-400',
            'badge' => 'bg-amber-400 text-slate-950',
            'glow' => 'bg-amber-500/15',
        ];

        return view('genres.show', compact(
            'genre',
            'titles',
            'spotlight',
            'avgRating',
            'movieCount',
            'seriesCount',
            'format',
            'sort',
            'otherGenres',
            'allGenres',
            'theme'
        ));
    }
}
