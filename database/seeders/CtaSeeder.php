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
            'headline' => 'Buat Perusahaan anda Exposed lebih luas di masyarakat',
            'paragraph' => 'Lihat hasil kerja terbaik kami dan temukan inspirasi untuk proyek Anda berikutnya.',
            'button_text' => 'Produk Kami',
            'button_url' => '#portfolio',
            'background_image' => 'cta/ZVsaNYlqoMmSHp1b95AzVrvNaVsDKF4wxKDtWD0z.jpg',
            'created_at' => '2025-07-21 20:06:11',
            'updated_at' => '2025-08-01 23:26:51',
        ]);
    }
}
