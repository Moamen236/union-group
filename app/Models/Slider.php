<?php

namespace App\Models;

use App\Helpers\LocalizableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Slider extends LocalizableModel
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ar',
        'subtitle_en',
        'subtitle_ar',
        'image',
        'button_text_en',
        'button_text_ar',
        'button_url',
        'order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
    ];

    protected $localizable = [
        'title',
        'subtitle',
        'button_text',
    ];

    /**
     * Scope for active sliders
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope for ordered sliders
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get title based on locale
     */
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->title_ar : $this->title_en;
    }

    /**
     * Get subtitle based on locale
     */
    public function getSubtitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->subtitle_ar : $this->subtitle_en;
    }

    /**
     * Get button text based on locale
     */
    public function getButtonTextAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->button_text_ar : $this->button_text_en;
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image || empty($this->image) || $this->image === '0') {
            return null;
        }

        // Use Storage facade to get the correct URL
        if (Storage::disk('public')->exists($this->image)) {
            return Storage::disk('public')->url($this->image);
        }

        // Fallback to asset() if Storage::url() doesn't work
        $imagePath = ltrim($this->image, '/');
        if (strpos($imagePath, 'storage/') === 0) {
            return asset($imagePath);
        }

        return asset('storage/' . $imagePath);
    }
}
