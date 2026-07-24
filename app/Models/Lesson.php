<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'subject_id',
        'teacher_id',
        'title',
        'title_hi',
        'slug',
        'type',
        'video_url',
        'video_duration',
        'pdf_url',
        'description',
        'order',
        'is_free_preview',
        'is_published',
    ];

    protected $casts = [
        'is_free_preview' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(CourseSubject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }
}
