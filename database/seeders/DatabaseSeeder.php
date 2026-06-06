<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,          // admin accounts (requires ADMIN_SEED_PASSWORD in .env)
            SettingsSeeder::class,      // all settings incl. SEO + GTM
            SpecialitySeeder::class,    // specialities table
            PageContentSeeder::class,   // home, about, services, specialities, contact
            LegalPagesSeeder::class,    // privacy, terms
            RcmPageSeeder::class,       // /revenue-cycle-management page
            MbcPageSeeder::class,       // /medical-billing-consulting page
        ]);
    }
}
