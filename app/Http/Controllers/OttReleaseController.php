<?php

namespace App\Http\Controllers;

use App\Models\StreamingPlatform;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OttReleaseController extends Controller
{
    /**
     * Display the OTT Releases Calendar & Digital Streaming Guide.
     */
    public function index(Request $request): View
    {
        $selectedPlatformSlug = (string) $request->input('platform', 'all');
        $selectedYear = $request->input('year');

        $platforms = StreamingPlatform::where('is_active', true)
            ->withCount(['titles' => fn($q) => $q->where('is_active', true)])
            ->orderByDesc('titles_count')
            ->get();

        $query = Title::query()
            ->where('is_active', true)
            ->whereHas('streamingPlatforms')
            ->with(['streamingPlatforms', 'genres']);

        if ($selectedPlatformSlug !== 'all' && !empty($selectedPlatformSlug)) {
            $query->whereHas('streamingPlatforms', fn($q) => $q->where('slug', $selectedPlatformSlug));
        }

        if (!empty($selectedYear) && is_numeric($selectedYear)) {
            $query->whereYear('release_date', (int) $selectedYear);
        }

        $allOttTitles = $query->orderByDesc('release_date')
            ->paginate(24)
            ->withQueryString();

        // Top Trending on OTT
        $featuredOtt = Title::query()
            ->where('is_active', true)
            ->whereHas('streamingPlatforms')
            ->with(['streamingPlatforms', 'genres'])
            ->orderByDesc('rating')
            ->take(6)
            ->get();

        // Schema.org Structured Data
        $itemListSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Latest OTT Releases & Digital Streaming Guide',
            'description' => 'Comprehensive release calendar and OTT streaming guide for movies and web series across Netflix, Prime Video, Hotstar, JioCinema, and Zee5.',
            'url' => route('ott.releases'),
            'numberOfItems' => $allOttTitles->total(),
            'itemListElement' => $allOttTitles->take(10)->map(fn($t, $idx) => [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'url' => route('title.show', $t->slug),
                'name' => "{$t->title} OTT Release",
            ])->values()->all(),
        ];

        $seoTitle = "OTT Releases This Week — Latest Movie & Web Series Streaming Calendar";
        $seoDescription = "Check out the latest OTT releases this week and coming soon. Find where to stream new movies and web series online across Netflix, Amazon Prime, Hotstar, JioCinema & Zee5.";
        $seoKeywords = [
            'ott releases',
            'ott releases this week',
            'latest ott releases',
            'ott release date',
            'new movies on netflix this week',
            'prime video new releases',
            'hotstar new movies',
            'where to watch online',
            'digital release date',
        ];

        return view('hubs.ott-releases', [
            'platforms' => $platforms,
            'titles' => $allOttTitles,
            'featuredOtt' => $featuredOtt,
            'selectedPlatform' => $selectedPlatformSlug,
            'selectedYear' => $selectedYear,
            'itemListSchema' => $itemListSchema,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
        ]);
    }
}


