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
                'name' => 'rubrub',
                'email' => 'pribodogkulimihi@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$rnxRD5TR6rJPYEso0GEXROgxg4pPQn69ek93hfMMwI7G4cNFs8di2', // sudah hash
                'remember_token' => null,
                'created_at' => '2025-07-20 21:05:00',
                'updated_at' => '2025-07-20 21:05:00',
            ],
            [
                'id' => 2,
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => '2025-07-20 23:18:10',
                'password' => '$2y$12$j/7.Jb1klSs8Q.yem57Q7uJZ3kFd00r3hUacu3awPVvjlLlmzH5e2',
                'remember_token' => 'ZoEKXyAVzV',
                'created_at' => '2025-07-20 23:18:10',
                'updated_at' => '2025-07-20 23:18:10',
            ],
            [
                'id' => 3,
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => '2025-07-20 23:24:03',
                'password' => '$2y$12$lXGkIxysZmD9R2R8CYnbduGxjvm061i.BDq0gz3E71lJJG5Ov.kq6',
                'remember_token' => 'mjycWojYHjYKFC0HAHdis2T3Pc41L0o7tOG3cuaDGCt4jKrkaxyYESBAbK10',
                'created_at' => '2025-07-20 23:24:03',
                'updated_at' => '2025-07-20 23:24:03',
            ],
        ]);
    }
}
