<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make(env('ADMIN_SEED_PASSWORD', 'ChangeMe123!'));

        DB::table('users')->updateOrInsert(
            ['email' => 'admin@dbillers.com'],
            [
                'name'               => 'Super Admin',
                'email'              => 'admin@dbillers.com',
                'password'           => $password,
                'role'               => 'super_admin',
                'email_verified_at'  => null,
                'remember_token'     => null,
                'created_at'         => '2026-04-10 07:15:55',
                'updated_at'         => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'Mahfooz@dbillers.com'],
            [
                'name'               => 'Mahfooz',
                'email'              => 'Mahfooz@dbillers.com',
                'password'           => $password,
                'role'               => 'admin',
                'email_verified_at'  => null,
                'remember_token'     => null,
                'created_at'         => '2026-04-10 10:44:26',
                'updated_at'         => now(),
            ]
        );
    }
}
