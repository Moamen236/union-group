<?php

namespace App\Models;

use App\Helpers\LocalizableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
