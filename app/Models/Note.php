<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Note extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_free' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(CourseSubject::class, 'subject_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function scopeFree(Builder $query): Builder
    {
        return $query->where('is_free', true);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
