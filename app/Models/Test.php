<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'created_by', 'course_id', 'category_id', 'title', 'title_hi', 
        'slug', 'description', 'type', 'exam_type', 'total_questions', 
        'total_marks', 'passing_marks', 'duration_minutes', 'negative_marking', 
        'negative_marks_value', 'is_free', 'is_published', 'instructions', 
        'instructions_hi', 'scheduled_at', 'is_live', 'total_attempts', 
        'meta_title', 'meta_description'
    ];

    protected $casts = [
        'negative_marking' => 'boolean',
        'is_free' => 'boolean',
        'is_published' => 'boolean',
        'is_live' => 'boolean',
        'scheduled_at' => 'datetime',
        'total_marks' => 'decimal:2',
        'passing_marks' => 'decimal:2',
        'negative_marks_value' => 'decimal:2',
    ];

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function sections()
    {
        return $this->hasMany(TestSection::class)->orderBy('order');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function attempts()
    {
        return $this->hasMany(TestAttempt::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeLive($query)
    {
        return $query->where('is_live', true)->whereNotNull('scheduled_at');
    }

    public function scopeFree($query)
    {
        return $query->where('is_free', true);
    }
}
