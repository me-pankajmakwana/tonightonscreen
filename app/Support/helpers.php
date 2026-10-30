<?php

use App\Support\SeoHelper;

if (! function_exists('seo_money')) {
    /**
     * Format currency in Rs. or USD based on Indian origin.
     */
    function seo_money(?int $amount, bool $isIndian = false): ?string
    {
        return SeoHelper::formatCurrency($amount, $isIndian);
    }
}

if (! function_exists('seo_json_ld')) {
    /**
     * Convert PHP schema array to safe JSON-LD without invalid escape characters.
     */
    function seo_json_ld(array $schema): string
    {
        return SeoHelper::toJsonLd($schema);
    }
}

if (! function_exists('seo_clean_desc')) {
    /**
     * Sanitize and truncate meta description text.
     */
    function seo_clean_desc(?string $text, int $limit = 160): string
    {
        return SeoHelper::cleanMetaDescription($text, $limit);
    }
}
