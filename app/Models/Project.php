<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['tool_id', 'title', 'description', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    /**
     * 'images' collection: multiple project showcase images.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }

    /**
     * Auto-generate optimised conversions for project images:
     * - 'card'  : used in the arc grid (400×200 WebP)
     * - 'thumb' : used in Filament admin previews
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('card')
            ->fit('cover', 400, 200)
            ->format('webp')
            ->optimize()
            ->performOnCollections('images');

        $this->addMediaConversion('thumb')
            ->fit('cover', 200, 120)
            ->format('webp')
            ->optimize()
            ->performOnCollections('images');
    }

    /* ── Relationships ── */
    public function tool(): BelongsTo
    {
        return $this->belongsTo(Tool::class);
    }

    /* ── Helpers ── */

    /** Returns array of card-size image URLs for the arc JS. */
    public function getCardImagesAttribute(): array
    {
        return $this->getMedia('images')
            ->map(fn ($m) => $m->getUrl('card'))
            ->values()
            ->toArray();
    }
}