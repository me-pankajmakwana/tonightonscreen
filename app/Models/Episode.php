<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_id',
        'title_id',
        'episode_number',
        'name',
        'overview',
        'still_path',
        'air_date',
        'runtime_minutes',
        'video_url',
    ];

    protected $casts = [
        'episode_number' => 'integer',
        'runtime_minutes' => 'integer',
        'air_date' => 'date',
    ];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(Title::class);
    }

    public function credits(): MorphMany
    {
        return $this->morphMany(Credit::class, 'creditable');
    }

    public function getStillUrlAttribute(): ?string
    {
        if (! $this->still_path) {
            return null;
        }

        if (Str::startsWith($this->still_path, ['http://', 'https://'])) {
            return $this->still_path;
        }

        return Storage::disk('public')->url($this->still_path);
    }
}
