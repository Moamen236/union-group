<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Helpers\LocalizableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends LocalizableModel
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_en',
        'name_ar',
        'code',
        'slug',
        'description_en',
        'description_ar',
        'features_en',
        'features_ar',
        'is_favorite',
        'order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_favorite' => 'boolean',
        'order' => 'integer',
    ];

    protected $localizable = [
        'name',
        'description',
        'features',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name_en);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name_en') && !$product->isDirty('slug')) {
                $product->slug = Str::slug($product->name_en);
            }
        });
    }

    /**
     * Get the category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Get product colors
     */
    public function colors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
    }

    /**
     * Get product images
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get main image
     */
    public function mainImage()
    {
        return $this->images()->where('is_main', true)->first()
            ?? $this->images()->first();
    }

    /**
     * Scope for active products
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope for favorite products
     */
    public function scopeFavorite($query)
    {
        return $query->where('is_favorite', true);
    }

    /**
     * Scope for ordered products
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get name based on locale
     */
    public function getNameAttribute(): string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->name_ar : $this->name_en;
    }

    /**
     * Get description based on locale
     */
    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->description_ar : $this->description_en;
    }

    /**
     * Get features based on locale
     */
    public function getFeaturesAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->features_ar : $this->features_en;
    }

    /**
     * Get main image URL
     */
    public function getMainImageUrlAttribute(): ?string
    {
        $mainImage = $this->mainImage();
        return $mainImage ? asset('storage/' . $mainImage->image) : null;
    }

    /**
     * Get second image (for hover effect).
     * Uses the image explicitly set as "hover" in the dashboard, otherwise first non-main image, else main.
     */
    public function secondImage()
    {
        $mainImage = $this->mainImage();

        // Prefer the image marked as hover in the dashboard
        $hoverImage = $this->images()->where('is_hover', true)->first();
        if ($hoverImage) {
            return $hoverImage;
        }

        // Fallback: first image that's not the main one
        $secondImage = $this->images()
            ->when($mainImage, fn($q) => $q->where('id', '!=', $mainImage->id))
            ->first();

        return $secondImage ?? $mainImage;
    }

    /**
     * Get second image URL (for hover effect)
     */
    public function getSecondImageUrlAttribute(): ?string
    {
        $secondImage = $this->secondImage();
        return $secondImage ? asset('storage/' . $secondImage->image) : null;
    }
}
