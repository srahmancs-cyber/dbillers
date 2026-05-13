<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key', 'value'
    ];

    // Mutator to handle array from FileUpload component
    public function setValueAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['value'] = $value[0] ?? null;
        } else {
            $this->attributes['value'] = $value;
        }
    }
}
