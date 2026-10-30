<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id',
        'season_number',
        'name',
        'overview',
        'poster_path',
        'trailer_url',
        'air_date',
    ];

    protected $casts = [
        'season_number' => 'integer',
        'air_date' => 'date',
    ];

    public function title(): BelongsTo
    {
        return $this->belongsTo(Title::class);
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class)->orderBy('episode_number');
    }

    public function getPosterUrlAttribute(): ?string
    {
        if (! $this->poster_path) {
            return null;
        }

        if (Str::startsWith($this->poster_path, ['http://', 'https://'])) {
            return $this->poster_path;
        }

        return Storage::disk('public')->url($this->poster_path);
    }
}
