<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id',
        'user_id',
        'author_name',
        'author_email',
        'rating',
        'headline',
        'content',
        'is_approved',
        'contains_spoilers',
        'helpful_votes',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'contains_spoilers' => 'boolean',
        'helpful_votes' => 'integer',
    ];

    protected static function booted()
    {
        static::saved(function (Review $review) {
            $review->syncTitleRating();
        });

        static::deleted(function (Review $review) {
            $review->syncTitleRating();
        });
    }

    /**
     * Associated title
     */
    public function title(): BelongsTo
    {
        return $this->belongsTo(Title::class);
    }

    /**
     * Associated user (optional)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope approved reviews
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    /**
     * Recalculate and update the aggregate rating on the Title model
     */
    public function syncTitleRating(): void
    {
        if (! $this->title_id) {
            return;
        }

        $avg = static::where('title_id', $this->title_id)
            ->where('is_approved', true)
            ->avg('rating');

        if ($avg !== null) {
            Title::where('id', $this->title_id)->update([
                'rating' => round($avg, 1),
            ]);
        }
    }

    /**
     * Get a human-readable rating label based on the 10-point scale
     */
    public function getRatingLabelAttribute(): string
    {
        return match ($this->rating) {
            10 => 'Masterpiece',
            9 => 'Outstanding',
            8 => 'Great',
            7 => 'Good',
            6 => 'Decent',
            5 => 'Average',
            4 => 'Mediocre',
            3 => 'Poor',
            2 => 'Terrible',
            default => 'Awful',
        };
    }
}
