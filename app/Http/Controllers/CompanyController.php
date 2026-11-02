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
            'totalTitles'    => $titles->count(),
            'totalMovies'    => $movies->count(),
            'totalSeries'    => $series->count(),
            'totalBoxOffice' => $totalBoxOffice,
            'totalBudget'    => $totalBudget,
            'avgRating'      => $avgRating,
            'topGenre'       => $topGenre,
            'catalogSpan'    => $catalogSpan,
        ];

        // SEO metadata targeting production company search queries:
        // "{company_name}", "movies produced by {company}", "{company} productions", "{company} movies"
        $companyName    = $company->name;
        $seoTitle       = "{$companyName} — Movies & Productions Catalogue | TonightOnScreen";
        $seoDescription = "Explore the complete filmography of {$companyName}. " .
                          "Browse all {$stats['totalTitles']} movies and TV shows produced by {$companyName} " .
                          "with ratings, streaming links, and box office data on TonightOnScreen.";
        $seoKeywords    = implode(', ', [
            $companyName,
            "{$companyName} movies",
            "{$companyName} productions",
            "{$companyName} films",
            "movies produced by {$companyName}",
            "{$companyName} filmography",
        ]);

        // Programmatic FAQ for production company pages
        $faqs = [];

        if ($stats['totalTitles'] > 0) {
            $topTitleNames = $spotlight->pluck('title')->join(', ', ' and ');
            $faqs[] = [
                'question' => "What movies and TV shows has {$companyName} produced?",
                'answer'   => "{$companyName} has produced {$stats['totalMovies']} feature films and {$stats['totalSeries']} TV series spanning {$stats['catalogSpan']}, " .
                              "with standout titles including {$topTitleNames}. " .
                              "Explore the full production catalogue with ratings and streaming options on TonightOnScreen.",
            ];
        }

        if ($stats['totalBoxOffice'] > 0) {
            $isIndianCompany = $titles->some(fn($t) => $t->isIndian());
            if ($isIndianCompany) {
                $crores = number_format($stats['totalBoxOffice'] / 10000000, 0);
                $faqs[] = [
                    'question' => "What is {$companyName}'s total box office collection?",
                    'answer'   => "Productions by {$companyName} have collectively grossed over Rs. {$crores} Crore at the worldwide box office.",
                ];
            } else {
                $millions = number_format($stats['totalBoxOffice'] / 1000000, 1);
                $faqs[] = [
                    'question' => "What is {$companyName}'s total box office gross?",
                    'answer'   => "Productions by {$companyName} have collectively grossed over \${$millions} million at the global box office.",
                ];
            }
        }

        $faqs[] = [
            'question' => "Where can I find the complete list of {$companyName} productions?",
            'answer'   => "The complete catalogue of {$companyName} movies and TV shows — including ratings, cast, and streaming platform availability — is curated on TonightOnScreen.",
        ];

        return view('companies.show', compact(
            'company', 'titles', 'movies', 'series', 'spotlight', 'stats',
            'seoTitle', 'seoDescription', 'seoKeywords', 'faqs'
        ));
    }
}
