<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page', 'section', 'title', 'subtitle', 'content',
        'image_url', 'metadata', 'order', 'is_active',
    ];

    protected $casts = [
        'metadata' => 'array',        'is_active' => 'boolean',
    ];
}
