<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\StreamingPlatform;
use App\Models\Title;
use App\Services\Seo\SitemapService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    /**
     * Generate and deliver the dynamic XML Sitemap.
     * Fully compliant with sitemaps.org standard. Cached for high performance (<5ms).
     */
    public function sitemap(SitemapService $sitemapService): Response
    {
        $xml = Cache::remember('tonightonscreen_sitemap_xml_v3', 3600, function () use ($sitemapService) {
            $titles = $sitemapService->getEligibleTitles();
            $people = $sitemapService->getEligiblePeople();
            $companies = $sitemapService->getEligibleCompanies();
            $genres = $sitemapService->getEligibleGenres();
            $platforms = $sitemapService->getEligiblePlatforms();

            return view('sitemap.xml', [
                'titles' => $titles,
                'people' => $people,
                'companies' => $companies,
                'genres' => $genres,
                'platforms' => $platforms,
                'latestUpdate' => $titles->first()?->updated_at ?? now(),
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex', // Sitemap itself shouldn't be indexed as content
        ]);
    }

    /**
     * Generate dynamic robots.txt file with directives and sitemap URL.
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

# XML Sitemap Index
Sitemap: {$sitemapUrl}
TXT;

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }
}
