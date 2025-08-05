<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hero_items')->insert([
            [
                'id' => 1,
                'title' => 'Solusi Website Profesional untuk Pertumbuhan Bisnis Anda',
                'description' => 'Tingkatkan jangkauan bisnis Anda dengan website yang dirancang profesional, aman, dan mudah dikelola. Solusi tepat untuk citra brand yang kuat di dunia digital.',
                'image' => 'hero-carousel/W3AJ2g1oChF8VRmCy4nhlbuk9uwkygXavCrttsSK.jpg',
                'created_at' => '2025-07-21 20:45:18',
                'updated_at' => '2025-08-01 23:13:09',
            ],
            [
                'id' => 2,
                'title' => 'Wujudkan Visibilitas Online & Kredibilitas dengan Website Profesional',
                'description' => 'Ubah ide Anda menjadi website yang fungsional dan menarik. Kami membantu bisnis seperti Anda untuk tampil profesional di dunia digital melalui platform website yang dirancang khusus untuk mendorong konversi dan pertumbuhan.',
                'image' => 'hero-carousel/yFmfO1BaxVbSgKifY1mFL2DJarR37CMaKKmCd9RI.jpg',
                'created_at' => '2025-07-21 20:45:44',
                'updated_at' => '2025-08-01 07:09:52',
            ],
            [
                'id' => 3,
                'title' => 'Selamat datang di Website Core Project',
                'description' => 'Penyedia layanan Pembuatan Website Profesional pendukung kebutuhan Anda',
                'image' => 'hero-carousel/sJEqn2VPFqx2rEEIUG45bcVGW4CkHRrLQUh8Yc3j.jpg',
                'created_at' => '2025-07-21 20:45:54',
                'updated_at' => '2025-08-01 23:12:27',
            ],
        ]);
    }
}
