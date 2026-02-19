<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'file',
        'logo',
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
    public function getFileUrlAttribute(): ?string
    {
        return $this->file ? asset('storage/' . $this->file) : null;
    }

    /**
     * Get logo URL (or null if no logo)
     */
    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    /**
     * URL used when viewing the certificate (file if present, otherwise logo).
     */
    public function getViewUrlAttribute(): ?string
    {
        if ($this->file) {
            return $this->file_url;
        }

        return $this->logo_url;
    }

    /**
     * Whether there is any viewable resource (file or logo).
     */
    public function hasViewableResource(): bool
    {
        return (bool) ($this->file || $this->logo);
    }

    /**
     * Check if certificate resource is PDF (based on stored file path).
     */
    public function isPdf(): bool
    {
        if (!$this->file) {
            return false;
        }

        return Str::endsWith(Str::lower($this->file), '.pdf');
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
