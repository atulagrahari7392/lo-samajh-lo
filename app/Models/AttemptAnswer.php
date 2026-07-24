<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttemptAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'attempt_id',
        'question_id',
        'selected_options',
        'numerical_answer',
        'is_correct',
        'is_marked_review',
        'time_spent_seconds',
    ];

    protected $casts = [
        'selected_options' => 'array',
        'is_correct' => 'boolean',
        'is_marked_review' => 'boolean',
        'numerical_answer' => 'decimal:4',
    ];

    public function attempt()
    {
        return $this->belongsTo(TestAttempt::class, 'attempt_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
