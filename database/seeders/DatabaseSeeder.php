<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder lain di sini
        $this->call([
            AboutSeeder::class,
            ContacInfoSeeder::class,
            // HeroItemSeeder::class, // Anda bisa menambahkan seeder lain jika ada
        ]);

        // Anda tetap bisa membuat user default jika diperlukan
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
    }
}