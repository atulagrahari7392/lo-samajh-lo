<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting.{$key}", function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            
            if (!$setting) {
                return $default;
            }

            return match ($setting->type) {
                'boolean' => (bool) $setting->value,
                'json' => json_decode($setting->value, true),
                'number' => is_numeric($setting->value) ? $setting->value + 0 : $setting->value,
                default => $setting->value,
            };
        });
    }
    
    protected static function booted()
    {
        static::saved(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });
        
        static::deleted(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });
    }
}
