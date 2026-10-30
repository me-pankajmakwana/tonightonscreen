<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($genre) {
            if (empty($genre->slug)) {
                $genre->slug = Str::slug($genre->name);
            }
        });
    }

    public function titles(): BelongsToMany
    {
        return $this->belongsToMany(Title::class);
    }

    /**
     * Get the URL for the genre's representative backdrop imagery.
     */
    public function getImageUrlAttribute(): string
    {
        $path = "images/genres/{$this->slug}.jpg";
        if (file_exists(public_path($path))) {
            return asset($path);
        }

        return asset('images/hero_cinema_collage.jpg');
    }
}
