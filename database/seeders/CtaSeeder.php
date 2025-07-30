<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CtaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ctas')->insert([
            'id' => 1,
            'headline' => 'Call To Action',
            'paragraph' => 'Lihat hasil kerja terbaik kami dan temukan inspirasi untuk proyek Anda berikutnya.',
            'button_text' => 'Produk Kami',
            'button_url' => '#portfolio',
            'background_image' => 'cta/WM5m08opnUbWlt0FrOcdNndr8cidaZkhcjWLUvGp.jpg',
            'created_at' => '2025-07-21 20:06:11',
            'updated_at' => '2025-07-24 18:47:48',
        ]);
    }
}
