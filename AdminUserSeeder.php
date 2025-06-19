<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin; // Pastikan ini diimpor
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com', // Gunakan email ini untuk login
            'password' => Hash::make('admin'), // Gunakan password ini
            'email_verified_at' => now(),
        ]);
        // Anda bisa tambahkan admin lain jika perlu
    }
}