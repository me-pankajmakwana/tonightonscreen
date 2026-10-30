<?php

namespace App\Http\Controllers;

use App\Models\ProductionCompany;
use App\Models\Title;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display the specified studio / production company profile page.
     * High performance with eager loaded titles, genres and platforms.
     */
    public function show(string $slug)
    {
        $company = ProductionCompany::query()
            ->where('slug', $slug)
            ->with([
                'titles' => function ($q) {
                    $q->with([
                        'genres:id,name,slug',
                        'streamingPlatforms:id,name,slug',
                    ])->orderByDesc('release_date');
                },
            ])
            ->firstOrFail();

        $titles = $company->titles;

        // Group into Movies and TV Series
        $movies = $titles->filter(fn($t) => 
            ($t->type instanceof \App\Enums\TitleType ? $t->type === \App\Enums\TitleType::MOVIE : $t->type === 'movie')
        )->values();

        $series = $titles->filter(fn($t) => 
            ($t->type instanceof \App\Enums\TitleType ? $t->type === \App\Enums\TitleType::TV_SERIES : $t->type === 'tv_series')
        )->values();

        // Top Rated Spotlight Titles (Hall of Fame)
        $spotlight = $titles->sortByDesc('rating')->take(4)->values();

        // Studio Analytics / Stats
        $totalBoxOffice = $titles->sum('box_office');
        $totalBudget = $titles->sum('budget');
        $avgRating = $titles->avg('rating') ? number_format((float) $titles->avg('rating'), 1) : '8.3';

        $allGenres = $titles->flatMap(fn($t) => $t->genres->pluck('name'));
        $topGenre = $allGenres->countBy()->sortDesc()->keys()->first() ?? 'Cinema';

        $earliestYear = $titles->min(fn($t) => $t->release_date?->format('Y')) ?? '2020';
        $latestYear = $titles->max(fn($t) => $t->release_date?->format('Y')) ?? 'Present';
        $catalogSpan = $earliestYear === $latestYear ? $earliestYear : "{$earliestYear} — {$latestYear}";

        $stats = [
            'totalTitles' => $titles->count(),
            'totalMovies' => $movies->count(),
            'totalSeries' => $series->count(),
            'totalBoxOffice' => $totalBoxOffice,
            'totalBudget' => $totalBudget,
            'avgRating' => $avgRating,
            'topGenre' => $topGenre,
            'catalogSpan' => $catalogSpan,
        ];

        return view('companies.show', compact('company', 'titles', 'movies', 'series', 'spotlight', 'stats'));
    }
}
