<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StreamingPlatform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo_path',
        'website',
        'is_active',
        'display_priority',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_priority' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($platform) {
            if (empty($platform->slug)) {
                $platform->slug = Str::slug($platform->name);
            }
        });
    }

    public function titles(): BelongsToMany
    {
        return $this->belongsToMany(Title::class, 'platform_title')
            ->withPivot('access_type', 'watch_url', 'quality')
            ->withTimestamps();
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (! $this->logo_path) {
            return null;
        }

        if (Str::startsWith($this->logo_path, ['http://', 'https://'])) {
            return $this->logo_path;
        }

        return Storage::disk('public')->url($this->logo_path);
    }
}
