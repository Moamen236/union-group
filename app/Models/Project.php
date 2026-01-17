<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Helpers\LocalizableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends LocalizableModel
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'slug',
        'description_en',
        'description_ar',
        'image',
        'location_en',
        'location_ar',
        'client',
        'completion_date',
        'order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
        'completion_date' => 'date',
    ];

    protected $localizable = [
        'name',
        'description',
        'location',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->name_en);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('name_en') && !$project->isDirty('slug')) {
                $project->slug = Str::slug($project->name_en);
            }
        });
    }

    /**
     * Scope for active projects
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope for ordered projects
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
     * Get location based on locale
     */
    public function getLocationAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->location_ar : $this->location_en;
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
