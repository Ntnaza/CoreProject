<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('feature_sections')->insert([
            'id' => 1,
            'headline' => 'Mengapa Memilih Produk Kami?',
            'paragraph' => 'Core Project hadir sebagai solusi terpercaya untuk kebutuhan Anda dalam bidang konstruksi dan pengembangan teknologi. Kami memahami bahwa setiap proyek adalah investasi berharga, oleh karena itu kami menawarkan produk dan layanan yang tidak hanya berkualitas tinggi, tetapi juga didukung oleh tim profesional.',
            'link_text' => 'Lihat Layanan',
            'link_url' => '#services',
            'created_at' => '2025-07-21 00:53:24',
            'updated_at' => '2025-08-01 21:05:43',
        ]);
    }
}
