<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'avatar',
        'google_id',
        'email_verified_at',
        'phone_verified_at',
        'is_active',
        'referral_code',
        'referred_by',
        'last_login_at',
        'device_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }
    
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    
    public function teacherProfile()
    {
        return $this->hasOne(Teacher::class);
    }
    
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements')->withTimestamps();
    }
    
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
    
    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }
    
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
