<?php

if (!function_exists('setting')) {
    function setting($key, $default = null) {
        try {
            $setting = \App\Models\Setting::where('key', $key)->first();
            if (!$setting) return $default;
            
            $value = $setting->value;
            
            // Special handling for logo - return full R2 URL
            if ($key === 'logo' && $value && !str_starts_with($value, 'http')) {
                return \Storage::disk('r2')->url($value);
            }
            
            return $value;
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('pageContent')) {
    function pageContent($page, $section, $field = null, $default = null) {
        try {
            $content = \App\Models\PageContent::where('page', $page)
                        ->where('section', $section)
                        ->where('is_active', true)
                        ->first();
            if (!$content) return $default;
            
            // If no field specified, return the whole object
            if (!$field) return $content;
            
            // Handle metadata fields
            if (str_contains($field, 'metadata.')) {
                $metaKey = str_replace('metadata.', '', $field);
                return $content->metadata[$metaKey] ?? $default;
            }
            
            // Handle regular fields
            if (isset($content->$field)) {
                // Special handling for image_url
                if ($field === 'image_url' && $content->image_url) {
                    return \Storage::disk('r2')->url($content->image_url);
                }
                if ($field === 'image_url' && !$content->image_url) {
                    return $default;
                }
                return $content->$field;
            }
            
            return $default;
        } catch (\Exception $e) {
            return $default;
        }
    }
}
