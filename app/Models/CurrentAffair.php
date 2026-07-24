<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CurrentAffair extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function scopeDaily(Builder $query): Builder
    {
        return $query->where('type', 'daily');
    }

    public function scopeWeekly(Builder $query): Builder
    {
        return $query->where('type', 'weekly');
    }

    public function scopeMonthly(Builder $query): Builder
    {
        return $query->where('type', 'monthly');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
