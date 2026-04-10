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
            ['name' => 'Cardiology', 'description' => 'Specialized coding for cardiac procedures and diagnostics', 'order' => 1],
            ['name' => 'Orthopedics', 'description' => 'Complete billing solutions for orthopedic surgeries', 'order' => 2],
            ['name' => 'Psychiatry', 'description' => 'Mental health billing with insurance compliance', 'order' => 3],
            ['name' => 'Pediatrics', 'description' => 'Well-child visits, immunizations, and screenings', 'order' => 4],
            ['name' => 'OB/GYN', 'description' => 'Maternity care and women\'s health billing', 'order' => 5],
            ['name' => 'Emergency Medicine', 'description' => 'ER coding with facility and professional components', 'order' => 6],
        ];

        foreach ($specialities as $speciality) {
            DB::table('specialities')->insert([
                'name' => $speciality['name'],
                'slug' => Str::slug($speciality['name']),
                'description' => $speciality['description'],
                'status' => 'active',
                'order' => $speciality['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
