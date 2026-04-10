<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Configure the default disk for file uploads
        config(['filament.default_filesystem_disk' => 'r2']);
    }
}
