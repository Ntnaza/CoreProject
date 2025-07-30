<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('feature_items')->insert([
            [
                'id' => 1,
                'icon' => 'bi-check',
                'title' => 'Berpengalaman dan Terpercaya',
                'description' => 'Kami telah menyelesaikan berbagai proyek berskala kecil hingga besar dengan hasil memuaskan.',
                'created_at' => '2025-07-21 01:26:11',
                'updated_at' => '2025-07-24 09:47:06',
            ],
            [
                'id' => 5,
                'icon' => 'bi-award',
                'title' => 'Komitmen Kualitas',
                'description' => 'Setiap proyek kami kerjakan dengan standar mutu tinggi dan perhatian pada setiap detail.',
                'created_at' => '2025-07-21 02:13:00',
                'updated_at' => '2025-07-24 09:49:43',
            ],
            [
                'id' => 6,
                'icon' => 'bi-clock',
                'title' => 'Tepat Waktu',
                'description' => 'Kami menjunjung tinggi komitmen terhadap tenggat waktu sesuai dengan timeline dan kesepakatan.',
                'created_at' => '2025-07-21 02:13:10',
                'updated_at' => '2025-07-24 09:52:38',
            ],
        ]);
    }
}
