<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$rnxRD5TR6rJPYEso0GEXROgxg4pPQn69ek93hfMMwI7G4cNFs8di2', // hashed
                'remember_token' => null,
                'created_at' => '2025-07-20 21:05:00',
                'updated_at' => '2025-07-20 21:05:00',
            ],
        ]);
    }
}
