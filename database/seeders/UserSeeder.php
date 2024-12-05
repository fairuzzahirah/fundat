<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'account_id' => Str::random(18), // Menghasilkan account_id acak
                'email' => 'admin@example.com',
                'email_verified_at' => now(), // Menandakan email sudah diverifikasi
                'password' => Hash::make('password'), // Ganti dengan password yang aman
                'role' => 'admin',
                'status' => 'active',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => Str::random(18),
                'email' => 'organizer@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'status' => 'active',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => Str::random(18),
                'email' => 'mitra@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'entrepreneur',
                'status' => 'active',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
