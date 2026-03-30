<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'job_title', 'company', 'period',
        'description', 'highlights', 'badges',
        'is_current', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'highlights' => 'array',
        'badges'     => 'array',
        'is_current' => 'boolean',
        'is_active'  => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}