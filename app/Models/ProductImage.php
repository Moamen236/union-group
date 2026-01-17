<?php

namespace App\Models;

use App\Helpers\LocalizableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends LocalizableModel
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'image',
        'alt_en',
        'alt_ar',
        'is_main',
        'order',
    ];

    protected $casts = [
        'is_main' => 'boolean',
        'order' => 'integer',
    ];

    protected $localizable = [
        'alt',
    ];

    /**
     * Get the product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the color
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    /**
     * Scope for ordered images
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Scope for main images
     */
    public function scopeMain($query)
    {
        return $query->where('is_main', true);
    }

    /**
     * Get alt text based on locale
     */
    public function getAltAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->alt_ar : $this->alt_en;
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
