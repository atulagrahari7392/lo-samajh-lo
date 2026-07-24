<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'name',
        'name_hi',
        'total_questions',
        'marks_per_question',
        'negative_marks',
        'time_limit',
        'order',
    ];

    protected $casts = [
        'marks_per_question' => 'decimal:2',
        'negative_marks' => 'decimal:2',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'section_id');
    }
}
