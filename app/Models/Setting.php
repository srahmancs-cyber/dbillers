<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        // Virtual fields used by Filament form components
        'logo_file',
        'gtm_enabled_value',
    ];

    // ──────────────────────────────────────────────────────────────
    // GETTERS
    // Filament reads these when it fills the edit form from the record
    // ──────────────────────────────────────────────────────────────

    /**
     * Populate the logo_file virtual field so FileUpload shows the current logo.
     * FileUpload expects an array of paths, not a plain string.
     */
    public function getLogoFileAttribute(): array
    {
        if ($this->key === 'logo' && !empty($this->value)) {
            return [$this->value];
        }
        return [];
    }

    /**
     * Populate the gtm_enabled_value virtual field so the Select shows current state.
     */
    public function getGtmEnabledValueAttribute(): ?string
    {
        if ($this->key === 'gtm_enabled') {
            return $this->value;
        }
        return null;
    }

    // ──────────────────────────────────────────────────────────────
    // SETTERS
    // Filament calls these when it saves the form
    // ──────────────────────────────────────────────────────────────

    /**
     * When FileUpload saves logo_file (an array), write the path into 'value'.
     */
    public function setLogoFileAttribute($upload): void
    {
        if (is_array($upload) && !empty($upload)) {
            $this->attributes['value'] = $upload[0];
        } elseif (is_string($upload) && !empty($upload)) {
            $this->attributes['value'] = $upload;
        }
        // If empty/null, leave the existing value untouched
    }

    /**
     * When the GTM Select saves gtm_enabled_value, write it into 'value'.
     */
    public function setGtmEnabledValueAttribute(?string $val): void
    {
        if ($val !== null) {
            $this->attributes['value'] = $val;
        }
    }
}
