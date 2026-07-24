<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'applicable_courses' => 'array',
        'is_active' => 'boolean',
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'value' => 'decimal:2',
        'min_order_amount' => 'decimal:2',
        'max_discount' => 'decimal:2',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $now = now();
        if ($now->lt($this->valid_from) || $now->gt($this->valid_until)) {
            return false;
        }

        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }
}
