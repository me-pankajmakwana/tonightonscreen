<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BoxOfficeController extends Controller
{
    /**
     * Display the Box Office Collections, Budgets & Commercial Verdicts Leaderboard.
     */
    public function index(Request $request): View
    {
        $filter = (string) $request->input('filter', 'highest_grossing');

        $baseQuery = Title::query()
            ->where('is_active', true)
            ->where(function ($q) {
                $q->where('box_office', '>', 0)
                  ->orWhere('budget', '>', 0);
            })
            ->with(['genres', 'directors.person']);

        // 1. Highest Grossing All Time
        $highestGrossing = (clone $baseQuery)
            ->where('box_office', '>', 0)
            ->orderByDesc('box_office')
            ->take(10)
            ->get();

        // 2. Biggest Budget Spectacles
        $biggestBudgets = (clone $baseQuery)
            ->where('budget', '>', 0)
            ->orderByDesc('budget')
            ->take(10)
            ->get();

        // 3. Main Filtered List
        $mainQuery = clone $baseQuery;

        if ($filter === 'roi') {
            $mainQuery->where('budget', '>', 0)
                ->where('box_office', '>', 0)
                ->orderByRaw('(CAST(box_office AS DECIMAL(15,2)) / NULLIF(budget, 0)) DESC');
        } elseif ($filter === 'biggest_budget') {
            $mainQuery->where('budget', '>', 0)
                ->orderByDesc('budget');
        } elseif ($filter === 'blockbusters') {
            $mainQuery->where('budget', '>', 0)
                ->where('box_office', '>', 0)
                ->whereRaw('(CAST(box_office AS DECIMAL(15,2)) / NULLIF(budget, 0)) >= 3.0')
                ->orderByDesc('box_office');
        } else {
            // default highest_grossing
            $mainQuery->where('box_office', '>', 0)
                ->orderByDesc('box_office');
        }

        $titles = $mainQuery->paginate(20)->withQueryString();

        // Schema.org Structured Data
        $boxOfficeSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Worldwide Box Office Collections & Movie Budgets Leaderboard',
            'description' => 'Comprehensive worldwide box office collections, production budgets, ROI multipliers, and hit or flop commercial verdicts for cinema.',
            'url' => route('box-office'),
            'numberOfItems' => $titles->total(),
            'itemListElement' => $titles->take(10)->map(fn($t, $idx) => [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'url' => route('title.show', $t->slug),
                'name' => "{$t->title} Box Office & Budget",
            ])->values()->all(),
        ];

        $seoTitle = "Worldwide Box Office & Budget Leaderboard — Hit or Flop Verdicts";
        $seoDescription = "Track official worldwide box office collections, movie production budgets, ROI multipliers, and commercial hit or flop verdicts on TonightOnScreen.";
        $seoKeywords = [
            'box office collection worldwide',
            'movie budget and collection',
            'highest grossing movies',
            'hit or flop verdict',
            'box office collection',
            'movie budget',
            'all time blockbuster movies',
            'indian box office collection',
        ];

        return view('hubs.box-office', [
            'titles' => $titles,
            'highestGrossing' => $highestGrossing,
            'biggestBudgets' => $biggestBudgets,
            'filter' => $filter,
            'boxOfficeSchema' => $boxOfficeSchema,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
        ]);
    }
}

