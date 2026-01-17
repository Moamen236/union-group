<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'file',
        'type',
        'issuer_en',
        'issuer_ar',
        'issue_date',
        'expiry_date',
        'order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];

    /**
     * Scope for active certificates
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope for ordered certificates
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Scope by type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
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
     * Get issuer based on locale
     */
    public function getIssuerAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->issuer_ar : $this->issuer_en;
    }

    /**
     * Get file URL
     */
    public function getFileUrlAttribute(): string
    {
        return asset('storage/' . $this->file);
    }

    /**
     * Check if certificate is PDF
     */
    public function isPdf(): bool
    {
        return $this->type === 'pdf';
    }

    /**
     * Check if certificate is expired
     */
    public function isExpired(): bool
    {
        if (!$this->expiry_date) {
            return false;
        }
        return $this->expiry_date->isPast();
    }
}
