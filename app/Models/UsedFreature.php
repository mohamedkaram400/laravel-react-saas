<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsedFreature extends Model
{
    protected $fillable = [
        'credits',
        'user_id',
        'feature_id',
        'data'
    ];

    public function casts(): array
    {
        return [
            'data' => 'array'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
