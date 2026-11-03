<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\StreamingPlatform;
use App\Models\Title;
use App\Services\Seo\SitemapService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    /**
     * Master Sitemap Index (<sitemapindex>).
     * Points Googlebot to segmented sub-sitemaps for parallel crawling & clean GSC reporting.
     */
    public function index(SitemapService $sitemapService): Response
    {
        $xml = Cache::remember('tos_sitemap_index_v1', 3600, function () use ($sitemapService) {
            $latestUpdate = Title::query()->latest('updated_at')->value('updated_at') ?? now();

            return view('sitemap.index', [
                'latestUpdate' => $latestUpdate,
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }

    /**
     * Main Core Pages, Hubs, Genres & Platforms Sitemap.
     */
    public function main(SitemapService $sitemapService): Response
    {
        $xml = Cache::remember('tos_sitemap_main_v1', 3600, function () use ($sitemapService) {
            $genres = $sitemapService->getEligibleGenres();
            $platforms = $sitemapService->getEligiblePlatforms();
            $latestUpdate = Title::query()->latest('updated_at')->value('updated_at') ?? now();

            return view('sitemap.main', [
                'genres' => $genres,
                'platforms' => $platforms,
                'latestUpdate' => $latestUpdate,
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }

    /**
     * Titles (Movies & TV Series) Sitemap.
     */
    public function titles(SitemapService $sitemapService): Response
    {
        $xml = Cache::remember('tos_sitemap_titles_v1', 3600, function () use ($sitemapService) {
            $titles = $sitemapService->getEligibleTitles();
            $latestUpdate = $titles->first()?->updated_at ?? now();

            return view('sitemap.titles', [
                'titles' => $titles,
                'latestUpdate' => $latestUpdate,
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }

    /**
     * People (Actors, Actresses, Directors) Sitemap.
     */
    public function people(SitemapService $sitemapService): Response
    {
        $xml = Cache::remember('tos_sitemap_people_v1', 3600, function () use ($sitemapService) {
            $people = $sitemapService->getEligiblePeople();
            $latestUpdate = $people->first()?->updated_at ?? now();

            return view('sitemap.people', [
                'people' => $people,
                'latestUpdate' => $latestUpdate,
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }

    /**
     * Production Companies Sitemap.
     */
    public function companies(SitemapService $sitemapService): Response
    {
        $xml = Cache::remember('tos_sitemap_companies_v1', 3600, function () use ($sitemapService) {
            $companies = $sitemapService->getEligibleCompanies();
            $latestUpdate = $companies->first()?->updated_at ?? now();

            return view('sitemap.companies', [
                'companies' => $companies,
                'latestUpdate' => $latestUpdate,
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }

    /**
     * Legacy Single Sitemap (Preserved for backwards compatibility).
     */
    public function sitemap(SitemapService $sitemapService): Response
    {
        return $this->index($sitemapService);
    }

    /**
     * Generate dynamic robots.txt file with directives and sitemap index URL.
     */
    public function robots(): Response
    {
        $sitemapUrl = url('/sitemap.xml');

        $content = <<<TXT
User-agent: *
Allow: /

# Protected Admin & Internal CMS
Disallow: /admin
Disallow: /admin/
Disallow: /admin/*

# Internal Actions & Private APIs
Disallow: /search/autocomplete
Disallow: /watchlist/toggle
Disallow: /watchlist/clear
Disallow: /reviews/*/helpful
Disallow: /api/what-to-watch/recommend
Disallow: /api/games/*

# XML Sitemap Index
Sitemap: {$sitemapUrl}
TXT;

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }
}
