<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * SEO settings are now included in SettingsSeeder.
 * This class is kept for backward compatibility only.
 */
class SeoSettingsSeeder extends Seeder
{
    public function run(): void
    {
        // SEO keys (site_title, site_description, site_keywords, og_image)
        // are now seeded by SettingsSeeder. Nothing to do here.
    }
}
