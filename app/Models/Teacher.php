<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'subject_specialization' => 'array',
        'bank_account' => 'array',
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
        'verified_at' => 'datetime',
        'commission_percentage' => 'decimal:2',
        'rating' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courses(): HasManyThrough
    {
        return $this->hasManyThrough(Course::class, User::class, 'id', 'teacher_id', 'user_id', 'id');
    }
}
