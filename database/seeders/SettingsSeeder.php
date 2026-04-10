<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'DBillers'],
            ['key' => 'company_email', 'value' => 'contact@dbillers.com'],
            ['key' => 'company_phone', 'value' => '+1 (555) 123-4567'],
            ['key' => 'company_address', 'value' => '123 Medical District, New York, NY 10001'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/dbillers'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/dbillers'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/dbillers'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'updated_at' => now()]
            );
        }
    }
}
