<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'test_id',
        'section_id',
        'course_id',
        'subject_id',
        'topic',
        'type',
        'question_text',
        'question_text_hi',
        'image_url',
        'difficulty',
        'marks',
        'negative_marks',
        'explanation',
        'explanation_hi',
        'tags',
        'pyq_year',
        'pyq_exam',
        'created_by',
    ];

    protected $casts = [
        'marks' => 'decimal:2',
        'negative_marks' => 'decimal:2',
        'tags' => 'array',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function section()
    {
        return $this->belongsTo(TestSection::class, 'section_id');
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
