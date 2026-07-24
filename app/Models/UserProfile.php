<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'date_of_birth',
        'gender',
        'city',
        'state',
        'education_level',
        'exam_target',
        'bio',
        'social_links',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'social_links' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
