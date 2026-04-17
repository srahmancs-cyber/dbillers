<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_title', 'value' => 'DBillers - Smart Medical Billing for US Healthcare Providers'],
            ['key' => 'site_description', 'value' => 'DBillers is a top US medical billing firm - applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing to experts.'],
            ['key' => 'site_keywords', 'value' => 'medical billing, revenue cycle management, medical coding, healthcare billing, claim processing, RCM services'],
            ['key' => 'og_image', 'value' => ''],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
