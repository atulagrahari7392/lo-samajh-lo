<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveClassAttendance extends Model
{
    use HasFactory;

    protected $table = 'live_class_attendance';
    protected $guarded = ['id'];

    protected $casts = [
        'joined_at' => 'datetime',
        'left_at' => 'datetime',
    ];

    public function liveClass(): BelongsTo
    {
        return $this->belongsTo(LiveClass::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
