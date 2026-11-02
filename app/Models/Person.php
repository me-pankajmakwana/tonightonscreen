<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'name',
        'full_name',
        'stage_name',
        'slug',
        'gender',
        'known_for_department',
        'birth_date',
        'death_date',
        'birth_place',
        'nationality',
        'residence',
        'hometown',
        'height',
        'languages',
        'education',
        'qualification',
        'religion',
        'zodiac_sign',
        'hobbies',
        'other_talents',
        'biography',
        'photo_path',
        'social_links',
        'website',
        'is_featured',
        'status',
        'is_active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'death_date' => 'date',
        'social_links' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active/published talents.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($person) {
            if (empty($person->slug)) {
                $person->slug = Str::slug($person->name);
                $originalSlug = $person->slug;
                $count = 1;
                while (static::where('slug', $person->slug)->exists()) {
                    $person->slug = "{$originalSlug}-{$count}";
                    $count++;
                }
            }
        });
    }

    /**
     * All credits for this person across titles and episodes.
     */
    public function credits(): HasMany
    {
        return $this->hasMany(Credit::class);
    }

    public function actingCredits(): HasMany
    {
        return $this->credits()->where('department', 'Acting');
    }

    public function directingCredits(): HasMany
    {
        return $this->credits()->where('department', 'Directing');
    }

    public function writingCredits(): HasMany
    {
        return $this->credits()->where('department', 'Writing');
    }

    public function producingCredits(): HasMany
    {
        return $this->credits()->where('department', 'Production');
    }

    public function getPhotoUrlAttribute(): ?string
    {
        if (! $this->photo_path) {
            return null;
        }

        if (Str::startsWith($this->photo_path, ['http://', 'https://'])) {
            return $this->photo_path;
        }

        if (Storage::disk('public')->exists($this->photo_path)) {
            return Storage::disk('public')->url($this->photo_path);
        }

        if (file_exists(public_path($this->photo_path))) {
            return asset($this->photo_path);
        }

        return Storage::disk('public')->url($this->photo_path);
    }

    public function getAgeAttribute(): ?int
    {
        if (! $this->birth_date) {
            return null;
        }

        $endDate = $this->death_date ?: now();

        return (int) $this->birth_date->diffInYears($endDate);
    }

    /**
     * Determine if this talent is an Indian cinema personality.
     */
    public function isIndian(): bool
    {
        if ($this->birth_place && str_contains(strtolower($this->birth_place), 'india')) {
            return true;
        }

        $bio = strtolower($this->biography ?? '');
        return str_contains($bio, 'indian')
            || str_contains($bio, 'bollywood')
            || str_contains($bio, 'tamil')
            || str_contains($bio, 'telugu')
            || str_contains($bio, 'malayalam')
            || str_contains($bio, 'kannada');
    }

    public function getIsIndianAttribute(): bool
    {
        return $this->isIndian();
    }

    /**
     * Get or calculate Zodiac sign from birth date if not explicitly set.
     */
    public function getZodiacSignAttribute(?string $value): ?string
    {
        if (!empty($value)) {
            return $value;
        }

        if (!$this->birth_date) {
            return null;
        }

        $month = (int) $this->birth_date->format('n');
        $day   = (int) $this->birth_date->format('j');

        return match ($month) {
            1  => $day <= 19 ? 'Capricorn' : 'Aquarius',
            2  => $day <= 18 ? 'Aquarius' : 'Pisces',
            3  => $day <= 20 ? 'Pisces' : 'Aries',
            4  => $day <= 19 ? 'Aries' : 'Taurus',
            5  => $day <= 20 ? 'Taurus' : 'Gemini',
            6  => $day <= 20 ? 'Gemini' : 'Cancer',
            7  => $day <= 22 ? 'Cancer' : 'Leo',
            8  => $day <= 22 ? 'Leo' : 'Virgo',
            9  => $day <= 22 ? 'Virgo' : 'Libra',
            10 => $day <= 22 ? 'Libra' : 'Scorpio',
            11 => $day <= 21 ? 'Scorpio' : 'Sagittarius',
            12 => $day <= 21 ? 'Sagittarius' : 'Capricorn',
            default => null,
        };
    }

    /**
     * Get popular name (stage name fallback to name).
     */
    public function getPopularNameAttribute(): string
    {
        return $this->stage_name ?: $this->name;
    }
}

