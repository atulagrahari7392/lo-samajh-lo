<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaderboardEntry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'score' => 'decimal:2',
        'percentile' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
