<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialitySeeder extends Seeder
{
    public function run(): void
    {
        $specialities = [
            ['name' => 'Cardiology',         'slug' => 'cardiology',         'description' => 'Specialized coding for cardiac procedures and diagnostics',    'icon_url' => null, 'order' => 1],
            ['name' => 'Orthopedics',        'slug' => 'orthopedics',        'description' => 'Complete billing solutions for orthopedic surgeries',           'icon_url' => null, 'order' => 2],
            ['name' => 'Psychiatry',         'slug' => 'psychiatry',         'description' => 'Mental health billing with insurance compliance',               'icon_url' => null, 'order' => 3],
            ['name' => 'Pediatrics',         'slug' => 'pediatrics',         'description' => 'Well-child visits, immunizations, and screenings',              'icon_url' => null, 'order' => 4],
            ['name' => 'OB/GYN',             'slug' => 'obgyn',              'description' => "Maternity care and women's health billing",                     'icon_url' => null, 'order' => 5],
            ['name' => 'Emergency Medicine', 'slug' => 'emergency-medicine', 'description' => 'ER coding with facility and professional components',           'icon_url' => null, 'order' => 6],
        ];

        foreach ($specialities as $spec) {
            DB::table('specialities')->updateOrInsert(
                ['slug' => $spec['slug']],
                [
                    'name'        => $spec['name'],
                    'slug'        => $spec['slug'],
                    'description' => $spec['description'],
                    'icon_url'    => $spec['icon_url'],
                    'status'      => 'active',
                    'order'       => $spec['order'],
                    'updated_at'  => now(),
                ]
            );
        }
    }
}
