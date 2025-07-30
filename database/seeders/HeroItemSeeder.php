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
                'id' => 9,
                'title' => 'Punya toko tapi pencatatan masi manual',
                'description' => 'ada kami penyedia layanan digital sesuai dengan kebutuhan anda dengan fitur lengkap',
                'image' => 'hero-carousel/IIASlyheZc4gODf0CJ9ISuCFgkdK9RrvdCI34zf3.jpg',
                'created_at' => '2025-07-21 20:45:18',
                'updated_at' => '2025-07-25 19:21:19',
            ],
            [
                'id' => 10,
                'title' => 'Bingung Media pemasaran Brand anda?',
                'description' => 'Ada kami sebagai penyedia Platform digital Berbasis website',
                'image' => 'hero-carousel/ZkBKlPskzNw7iaE0DvoqrIeHBKQRJACxcDbfFk65.jpg',
                'created_at' => '2025-07-21 20:45:44',
                'updated_at' => '2025-07-25 19:06:10',
            ],
            [
                'id' => 11,
                'title' => 'Selamat datang di Website Core Project',
                'description' => 'Penyedia layanan Pembuatan Website Profesional pendukung kebutuhan Anda',
                'image' => 'hero-carousel/d6i5h5ObS9gP1sTuVQqNKmHLTVlHNh8uuj5nMyhF.jpg',
                'created_at' => '2025-07-21 20:45:54',
                'updated_at' => '2025-07-25 18:56:53',
            ],
        ]);
    }
}
