<?php

namespace App\Support;

use App\Models\Person;
use App\Models\Title;
use Illuminate\Support\Str;

class SeoHelper
{
    // Common SEO Constants
    public const SITE_NAME = 'TonightOnScreen';
    public const SITE_URL = 'https://tonightonscreen.com';
    public const DEFAULT_OG_IMAGE = 'https://tonightonscreen.com/Tonight OnScreen Logo.png';
    public const DEFAULT_CACHE_TTL = 86400; // 24 hours in seconds

    public const INDIAN_LANGUAGES = [
        'hindi', 'tamil', 'telugu', 'malayalam', 'kannada',
        'bengali', 'marathi', 'punjabi', 'gujarati', 'odia',
        'urdu', 'assamese', 'bhojpuri'
    ];

    /**
     * Format a currency amount according to origin:
     * - Indian: Rs. X Crore / Lakh
     * - International: $ USD
     */
    public static function formatCurrency(?int $amount, bool $isIndian = false): ?string
    {
        if ($amount === null) {
            return null;
        }

        if ($isIndian) {
            if ($amount >= 10000000) { // >= 1 Crore (10 Million)
                $crores = round($amount / 10000000, 2);
                $croresStr = (fmod($crores, 1) === 0.0)
                    ? number_format($crores, 0)
                    : rtrim(rtrim(number_format($crores, 2), '0'), '.');
                return "Rs. {$croresStr} Crore";
            } elseif ($amount >= 100000) { // >= 1 Lakh
                $lakhs = round($amount / 100000, 2);
                $lakhsStr = (fmod($lakhs, 1) === 0.0)
                    ? number_format($lakhs, 0)
                    : rtrim(rtrim(number_format($lakhs, 2), '0'), '.');
                return "Rs. {$lakhsStr} Lakh";
            } else {
                return "Rs. " . number_format($amount);
            }
        }

        return "$" . number_format($amount);
    }

    /**
     * Check if a country or language represents an Indian production.
     */
    public static function isIndian(?string $country, ?string $language = null, ?string $text = null): bool
    {
        if ($country && in_array(strtolower(trim($country)), ['india', 'in', 'ind'])) {
            return true;
        }

        if ($language && in_array(strtolower(trim($language)), self::INDIAN_LANGUAGES)) {
            return true;
        }

        if ($text) {
            $t = strtolower($text);
            return str_contains($t, 'bollywood')
                || str_contains($t, 'kollywood')
                || str_contains($t, 'tollywood')
                || str_contains($t, 'mollywood')
                || str_contains($t, 'indian cinema');
        }

        return false;
    }

    /**
     * Build Schema.org BreadcrumbList structured data.
     */
    public static function buildBreadcrumbSchema(array $items): array
    {
        $list = [];
        $position = 1;
        foreach ($items as $item) {
            $list[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $item['name'],
                'item' => $item['url'] ?? null,
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $list,
        ];
    }

    /**
     * Build Schema.org FAQPage structured data.
     */
    public static function buildFaqSchema(array $faqs): ?array
    {
        if (empty($faqs)) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn($f) => [
                '@type' => 'Question',
                'name' => $f['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($f['answer']),
                ],
            ], $faqs),
        ];
    }

    /**
     * Safely output JSON-LD script content without invalid escape sequences.
     */
    public static function toJsonLd(array $schema): string
    {
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * Clean and truncate plain text for meta descriptions (155-160 chars).
     */
    public static function cleanMetaDescription(?string $text, int $limit = 160): string
    {
        if (empty($text)) {
            return "TonightOnScreen — The definitive database and curated streaming guide for world cinema, web series, and talent filmographies.";
        }

        $cleaned = trim(preg_replace('/\s+/', ' ', strip_tags($text)));
        return Str::limit($cleaned, $limit);
    }

    /**
     * Generate an intent-targeted, high-CTR SEO title tag for title profile pages.
     * Captures high-volume search clusters:
     * - "[Title] budget and collection"
     * - "cast of [Title] (film)"
     * - "[Title] budget"
     * - "[Title] film"
     * - "[Title] cast"
     */
    public static function generateTitleSeoTitle(Title $title): string
    {
        $year = $title->release_year ? "({$title->release_year}) " : '';
        $isSeries = ($title->type?->value ?? $title->type) === 'tv_series';

        if ($isSeries) {
            return "{$title->title} {$year}TV Series — Cast, Episodes, OTT Streaming & Reviews | " . self::SITE_NAME;
        }

        // Movie / Film
        $hasFinancials = !empty($title->budget) || !empty($title->box_office);

        if ($hasFinancials) {
            if ($title->isIndian()) {
                return "{$title->title} {$year}Film — Cast, Budget and Collection, OTT | " . self::SITE_NAME;
            }

            return "{$title->title} {$year}Film — Cast, Budget & Box Office Collection | " . self::SITE_NAME;
        }

        return "{$title->title} {$year}Film — Full Cast, Director, Storyline, OTT & Reviews | " . self::SITE_NAME;
    }

    /**
     * Generate a search-intent optimized meta description for title profile pages.
     * Incorporates cast of [title] (film), budget and collection, director, and storyline.
     */
    public static function generateTitleMetaDescription(Title $title, $cast = null, $directors = null): string
    {
        $year = $title->release_year ? "({$title->release_year} film)" : 'film';
        $isSeries = ($title->type?->value ?? $title->type) === 'tv_series';
        if ($isSeries) {
            $year = $title->release_year ? "({$title->release_year} TV series)" : 'TV series';
        }

        // Extract lead cast (up to 3 actors, deduped)
        $castNames = '';
        if ($cast && count($cast) > 0) {
            $castNames = collect($cast)
                ->filter(fn($c) => !empty($c->person?->name))
                ->unique(fn($c) => $c->person->name)
                ->take(3)
                ->map(fn($c) => $c->person->name)
                ->join(', ');
        } elseif ($title->relationLoaded('credits')) {
            $castNames = $title->credits
                ->where('department', 'Acting')
                ->filter(fn($c) => !empty($c->person?->name))
                ->unique(fn($c) => $c->person->name)
                ->take(3)
                ->map(fn($c) => $c->person->name)
                ->join(', ');
        }

        // Extract director
        $directorName = '';
        if ($directors && count($directors) > 0) {
            $directorName = collect($directors)->first()?->person?->name;
        } elseif ($title->relationLoaded('credits')) {
            $directorName = $title->credits->where('department', 'Directing')->first()?->person?->name;
        }

        // Financials (Budget & Collection)
        $financialSnippet = '';
        if (!empty($title->budget) && !empty($title->box_office)) {
            $financialSnippet = "Budget: {$title->formatted_budget}, {$title->box_office_label}: {$title->formatted_box_office}.";
        } elseif (!empty($title->budget)) {
            $financialSnippet = "Budget: {$title->formatted_budget}.";
        } elseif (!empty($title->box_office)) {
            $financialSnippet = "Worldwide {$title->box_office_label}: {$title->formatted_box_office}.";
        }

        $parts = [];
        $parts[] = "Cast of {$title->title} {$year}" . ($castNames ? " starring {$castNames}" : "") . ".";

        if ($directorName) {
            $parts[] = "Directed by {$directorName}.";
        }

        if ($financialSnippet) {
            $parts[] = $financialSnippet;
        }

        if (!empty($title->overview)) {
            $cleanedOverview = trim(preg_replace('/\s+/', ' ', strip_tags($title->overview)));
            $parts[] = Str::limit($cleanedOverview, 100);
        }

        $parts[] = "Explore full cast, storyline, box office & where to watch OTT on " . self::SITE_NAME . ".";

        $fullDescription = implode(' ', $parts);
        return self::cleanMetaDescription($fullDescription, 160);
    }
}
