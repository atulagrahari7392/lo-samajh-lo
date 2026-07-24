<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'course_id',
        'title',
        'title_hi',
        'description',
        'platform',
        'meeting_id',
        'meeting_link',
        'meeting_password',
        'scheduled_at',
        'duration_minutes',
        'is_recorded',
        'recording_url',
        'thumbnail',
        'is_free',
        'status',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'is_recorded' => 'boolean',
        'is_free' => 'boolean',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function attendances()
    {
        return $this->hasMany(LiveClassAttendance::class);
    }
}
