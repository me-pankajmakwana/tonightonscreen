<?php

namespace App\Services\Seo;

use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\StreamingPlatform;
use App\Models\Title;
use Illuminate\Support\Collection;

class SitemapService
{
    /**
     * Get all eligible, active titles for indexing.
     */
    public function getEligibleTitles(): Collection
    {
        return Title::query()
            ->where('is_active', true)
            ->whereNotNull('slug')
            ->select(['id', 'slug', 'updated_at'])
            ->latest('updated_at')
            ->get();
    }

    /**
     * Get all eligible, active talents/people for indexing.
     */
    public function getEligiblePeople(): Collection
    {
        return Person::query()
            ->where('status', 'active')
            ->where('is_active', true)
            ->whereNotNull('slug')
            ->select(['id', 'slug', 'updated_at'])
            ->latest('updated_at')
            ->get();
    }

    /**
     * Get all eligible production companies for indexing.
     */
    public function getEligibleCompanies(): Collection
    {
        return ProductionCompany::query()
            ->whereNotNull('slug')
            ->select(['id', 'slug', 'updated_at'])
            ->latest('updated_at')
            ->get();
    }

    /**
     * Get all eligible genres for indexing.
     */
    public function getEligibleGenres(): Collection
    {
        return Genre::query()
            ->whereNotNull('slug')
            ->select(['id', 'slug', 'updated_at'])
            ->orderBy('name')
            ->get();
    }

    /**
     * Get all eligible streaming platforms for indexing.
     */
    public function getEligiblePlatforms(): Collection
    {
        return StreamingPlatform::query()
            ->where('is_active', true)
            ->whereNotNull('slug')
            ->select(['id', 'slug', 'updated_at'])
            ->orderBy('name')
            ->get();
    }
}
