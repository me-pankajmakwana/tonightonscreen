<?php

namespace App\Models;

use App\Enums\ReleaseStatus;
use App\Enums\TitleType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'tagline',
        'overview',
        'description',
        'status',
        'release_date',
        'end_date',
        'original_language',
        'origin_country',
        'runtime_minutes',
        'content_rating',
        'poster_path',
        'backdrop_path',
        'trailer_url',
        'budget',
        'box_office',
        'official_website',
        'rating',
        'is_featured',
        'is_trending',
        'is_active',
    ];

    protected $casts = [
        'type' => TitleType::class,
        'status' => ReleaseStatus::class,
        'release_date' => 'date',
        'end_date' => 'date',
        'runtime_minutes' => 'integer',
        'rating' => 'decimal:1',
        'budget' => 'integer',
        'box_office' => 'integer',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active/published titles.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($title) {
            if (empty($title->slug)) {
                $year = $title->release_date ? $title->release_date->format('Y') : null;
                $baseSlug = Str::slug($title->title . ($year ? "-{$year}" : ''));
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$baseSlug}-{$count}";
                    $count++;
                }
                $title->slug = $slug;
            }
        });
    }

    /**
     * Web Series Seasons
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class)->orderBy('season_number');
    }

    /**
     * Web Series Episodes (direct query)
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

    /**
     * Genres
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * Production Companies
     */
    public function productionCompanies(): BelongsToMany
    {
        return $this->belongsToMany(ProductionCompany::class, 'company_title')
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Streaming / OTT platforms ("Where to Watch")
     */
    public function streamingPlatforms(): BelongsToMany
    {
        return $this->belongsToMany(StreamingPlatform::class, 'platform_title')
            ->withPivot('access_type', 'watch_url', 'quality')
            ->withTimestamps();
    }

    /**
     * Alias for streamingPlatforms
     */
    public function platforms(): BelongsToMany
    {
        return $this->streamingPlatforms();
    }

    /**
     * All credits (Actors, Actresses, Directors, Producers, Writers, Crew)
     */
    public function credits(): MorphMany
    {
        return $this->morphMany(Credit::class, 'creditable')->orderBy('billing_order');
    }

    /**
     * Cast members (Actors & Actresses)
     */
    public function cast(): MorphMany
    {
        return $this->credits()->where('department', 'Acting');
    }

    /**
     * Directors
     */
    public function directors(): MorphMany
    {
        return $this->credits()->where('department', 'Directing');
    }

    /**
     * Writers
     */
    public function writers(): MorphMany
    {
        return $this->credits()->where('department', 'Writing');
    }

    /**
     * Producers
     */
    public function producers(): MorphMany
    {
        return $this->credits()->where('department', 'Production');
    }

    /**
     * Media assets (posters, backdrops gallery)
     */
    public function mediaAssets(): MorphMany
    {
        return $this->morphMany(MediaAsset::class, 'mediable')->orderBy('display_order');
    }

    /**
     * User reviews and community ratings
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest();
    }

    /**
     * Approved community reviews
     */
    public function approvedReviews(): HasMany
    {
        return $this->reviews()->where('is_approved', true);
    }

    /**
     * Scopes
     */
    public function scopeMovies(Builder $query): Builder
    {
        return $query->where('type', TitleType::MOVIE);
    }

    public function scopeSeries(Builder $query): Builder
    {
        return $query->where('type', TitleType::TV_SERIES);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeTrending(Builder $query): Builder
    {
        return $query->where('is_trending', true);
    }

    /**
     * Accessors
     */
    public function getPosterUrlAttribute(): ?string
    {
        if (! $this->poster_path) {
            return null;
        }

        if (Str::startsWith($this->poster_path, ['http://', 'https://'])) {
            return $this->poster_path;
        }

        if (Storage::disk('public')->exists($this->poster_path)) {
            return Storage::disk('public')->url($this->poster_path);
        }

        if (file_exists(public_path($this->poster_path))) {
            return asset($this->poster_path);
        }

        return Storage::disk('public')->url($this->poster_path);
    }

    public function getBackdropUrlAttribute(): ?string
    {
        if (! $this->backdrop_path) {
            return null;
        }

        if (Str::startsWith($this->backdrop_path, ['http://', 'https://'])) {
            return $this->backdrop_path;
        }

        if (Storage::disk('public')->exists($this->backdrop_path)) {
            return Storage::disk('public')->url($this->backdrop_path);
        }

        if (file_exists(public_path($this->backdrop_path))) {
            return asset($this->backdrop_path);
        }

        return Storage::disk('public')->url($this->backdrop_path);
    }

    public function getReleaseYearAttribute(): ?string
    {
        return $this->release_date ? $this->release_date->format('Y') : null;
    }

    public function getFormattedRuntimeAttribute(): ?string
    {
        if (! $this->runtime_minutes) {
            return null;
        }

        $hours = floor($this->runtime_minutes / 60);
        $minutes = $this->runtime_minutes % 60;

        if ($hours > 0) {
            return "{$hours}h {$minutes}m";
        }

        return "{$minutes}m";
    }

    /**
     * Determine if this title is an Indian production.
     */
    public function isIndian(): bool
    {
        if (! empty($this->origin_country)) {
            return in_array(strtolower(trim($this->origin_country)), ['india', 'in', 'ind']);
        }

        $indianLanguages = [
            'hindi', 'tamil', 'telugu', 'malayalam', 'kannada', 
            'bengali', 'marathi', 'punjabi', 'gujarati', 'odia', 
            'urdu', 'assamese', 'bhojpuri'
        ];
        if (! empty($this->original_language) && in_array(strtolower(trim($this->original_language)), $indianLanguages)) {
            return true;
        }

        $text = strtolower(($this->overview ?? '') . ' ' . ($this->tagline ?? '') . ' ' . $this->title);
        return str_contains($text, 'bollywood')
            || str_contains($text, 'kollywood')
            || str_contains($text, 'tollywood')
            || str_contains($text, 'mollywood')
            || str_contains($text, 'indian cinema');
    }

    public function getIsIndianAttribute(): bool
    {
        return $this->isIndian();
    }

    /**
     * Format a currency amount according to country of origin:
     * - Indian titles: Indian Rupees (Rs. / Crore / Lakh)
     * - Others: USD ($)
     */
    public function formatCurrency(?int $amount): ?string
    {
        if ($amount === null) {
            return null;
        }

        if ($this->isIndian()) {
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

    public function getFormattedBudgetAttribute(): ?string
    {
        return $this->formatCurrency($this->budget);
    }

    public function getFormattedBoxOfficeAttribute(): ?string
    {
        return $this->formatCurrency($this->box_office);
    }

    public function getBoxOfficeLabelAttribute(): string
    {
        return $this->isIndian() ? 'Collection' : 'Box Office Gross';
    }

    /**
     * Compute commercial box office verdict based on budget vs gross ratio.
     * Only evaluated when both budget and box office figures are known (> 0).
     */
    public function getBoxOfficeVerdictAttribute(): ?string
    {
        if (empty($this->budget) || empty($this->box_office) || (int) $this->budget <= 0) {
            return null;
        }

        $multiplier = (float) $this->box_office / (float) $this->budget;

        if ($multiplier >= 3.0) {
            return 'All-Time Blockbuster';
        }

        if ($multiplier >= 2.0) {
            return 'Super Hit';
        }

        if ($multiplier >= 1.5) {
            return 'Hit';
        }

        if ($multiplier >= 1.0) {
            return 'Average / Semi-Hit';
        }

        return 'Below Average / Flop';
    }

    /**
     * Tailwind CSS classes for the verdict badge.
     */
    public function getBoxOfficeVerdictClassAttribute(): string
    {
        return match ($this->box_office_verdict) {
            'All-Time Blockbuster' => 'bg-emerald-500/20 text-emerald-400 border-emerald-500/40',
            'Super Hit' => 'bg-emerald-500/15 text-emerald-300 border-emerald-500/30',
            'Hit' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
            'Average / Semi-Hit' => 'bg-amber-500/20 text-amber-400 border-amber-500/30',
            'Below Average / Flop' => 'bg-rose-500/20 text-rose-400 border-rose-500/30',
            default => 'bg-slate-500/20 text-slate-400 border-slate-500/30',
        };
    }

    /**
     * Multiplier of box office vs budget (e.g. "9.8x").
     */
    public function getBoxOfficeMultiplierAttribute(): ?string
    {
        if (empty($this->budget) || empty($this->box_office) || (int) $this->budget <= 0) {
            return null;
        }

        $multiplier = round((float) $this->box_office / (float) $this->budget, 1);
        return "{$multiplier}x";
    }

    /**
     * Return on investment percentage (e.g. "+876%").
     */
    public function getBoxOfficeRoiPercentageAttribute(): ?string
    {
        if (empty($this->budget) || empty($this->box_office) || (int) $this->budget <= 0) {
            return null;
        }

        $roi = round(((float) $this->box_office - (float) $this->budget) / (float) $this->budget * 100);
        $prefix = $roi >= 0 ? '+' : '';
        return "{$prefix}{$roi}%";
    }
}

