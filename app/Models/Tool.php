<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

class Tool extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    /**
     * Register Spatie media collections.
     * - 'icon'  : the tool icon shown in the arc carousel (single file)
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')
            ->singleFile()                        // only one icon per tool
            ->acceptsMimeTypes(['image/png', 'image/svg+xml', 'image/webp']);
    }

    /**
     * Auto-convert uploaded icon to optimised WebP thumbnail.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 150, 150)
            ->format('webp')
            ->optimize()
            ->performOnCollections('icon');
    }

    /* ── Relationships ── */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class)->orderBy('sort_order');
    }

    /* ── Scopes ── */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    /* ── Helpers ── */
    public function getIconUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('icon', 'thumb')
            ?: asset('icons/' . $this->slug . '.png'); // fallback to legacy path
    }
}