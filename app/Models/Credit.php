<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'creditable_type',
        'creditable_id',
        'department',
        'job',
        'character_name',
        'billing_order',
        'is_featured',
    ];

    protected $casts = [
        'billing_order' => 'integer',
        'is_featured' => 'boolean',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function creditable(): MorphTo
    {
        return $this->morphTo();
    }
}
