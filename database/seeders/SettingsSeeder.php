<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name',    'value' => 'DBillers'],
            ['key' => 'company_email',   'value' => 'billing@dbillers.com'],
            ['key' => 'company_phone',   'value' => '+1 (727) 350-2535'],
            ['key' => 'company_address', 'value' => '7901 4th St N # 21126 St. Petersburg, FL 33702'],
            ['key' => 'facebook_url',    'value' => 'https://www.facebook.com/profile.php?id=61588915531661'],
            ['key' => 'twitter_url',     'value' => 'http://x.com/DBillersRCM'],
            ['key' => 'linkedin_url',    'value' => 'https://www.linkedin.com/company/dbiller/'],
            ['key' => 'site_title',      'value' => 'DBillers - Smart Medical Billing for US Healthcare Providers'],
            ['key' => 'site_description','value' => 'DBillers is a top US medical billing firm - applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing to experts.'],
            ['key' => 'site_keywords',   'value' => 'medical billing, revenue cycle management, medical coding, healthcare billing, claim processing, RCM services'],
            ['key' => 'og_image',        'value' => ''],
            ['key' => 'logo',            'value' => 'logos/01KRHSJ6CFBTN1TG0Q1SH78J41.png'],
            ['key' => 'gtm_id',          'value' => ''],
            ['key' => 'gtm_enabled',     'value' => '0'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'updated_at' => now()]
            );
        }
    }
}
