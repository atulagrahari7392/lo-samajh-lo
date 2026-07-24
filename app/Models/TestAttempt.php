<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_id',
        'started_at',
        'submitted_at',
        'status',
        'total_attempted',
        'total_correct',
        'total_wrong',
        'total_unattempted',
        'score',
        'percentage',
        'rank',
        'time_taken_seconds',
        'ip_address',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'submitted_at' => 'datetime',
        'score' => 'decimal:2',
        'percentage' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function answers()
    {
        return $this->hasMany(AttemptAnswer::class, 'attempt_id');
    }
}
