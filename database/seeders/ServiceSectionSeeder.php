<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('service_sections')->insert([
            'id' => 1,
            'title' => 'Layanan',
            'subtitle' => 'Solusi Terbaik untuk Kebutuhan Anda',
            'created_at' => '2025-07-21 17:45:49',
            'updated_at' => '2025-07-24 09:54:46',
        ]);
    }
}
