<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudyPlan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'exam_date' => 'date',
        'plan_data' => 'array',
        'ai_generated' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
