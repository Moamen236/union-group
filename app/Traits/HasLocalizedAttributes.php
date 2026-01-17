<?php

namespace App\Traits;

trait HasLocalizedAttributes
{
    /**
     * Get a localized attribute value.
     *
     * @param string $attribute The base attribute name (without locale suffix)
     * @return string|null
     */
    public function getLocalizedAttribute(string $attribute): ?string
    {
        $locale = app()->getLocale();
        $localizedAttribute = "{$attribute}_{$locale}";
        $fallbackAttribute = "{$attribute}_en";

        // Return the localized value if it exists and is not empty
        if (!empty($this->{$localizedAttribute})) {
            return $this->{$localizedAttribute};
        }

        // Fall back to English if available
        return $this->{$fallbackAttribute} ?? null;
    }

    /**
     * Magic method to handle localized attribute access.
     *
     * Allows accessing $model->title instead of $model->title_en or $model->title_ar
     * based on current locale.
     *
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        // Check if the attribute has localized versions
        if ($this->hasLocalizedVersion($key)) {
            return $this->getLocalizedAttribute($key);
        }

        return parent::getAttribute($key);
    }

    /**
     * Check if an attribute has localized versions.
     *
     * @param string $attribute
     * @return bool
     */
    protected function hasLocalizedVersion(string $attribute): bool
    {
        return property_exists($this, 'localizedAttributes')
            && in_array($attribute, $this->localizedAttributes);
    }
}
