<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'category_id',
        'title',
        'title_hi',
        'slug',
        'description',
        'description_hi',
        'thumbnail',
        'preview_video',
        'language',
        'level',
        'price',
        'discounted_price',
        'duration_hours',
        'total_lessons',
        'is_free',
        'is_featured',
        'is_published',
        'exam_type',
        'requirements',
        'what_you_learn',
        'meta_title',
        'meta_description',
        'ratings_avg',
        'ratings_count',
        'enrollments_count',
    ];

    protected $casts = [
        'is_free' => 'boolean',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'requirements' => 'array',
        'what_you_learn' => 'array',
        'price' => 'decimal:2',
        'discounted_price' => 'decimal:2',
        'ratings_avg' => 'decimal:2',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function subjects()
    {
        return $this->hasMany(CourseSubject::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
    
    public function getActivePriceAttribute()
    {
        return $this->discounted_price > 0 ? $this->discounted_price : $this->price;
    }
}
