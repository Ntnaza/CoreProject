<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'id' => 1,
                'icon' => 'bi-globe',
                'title' => 'Website',
                'description' => 'Wujudkan kehadiran online Anda dengan website yang tidak hanya indah, tapi juga fungsional dan ramah mesin pencari (SEO) untuk menjangkau lebih banyak pelanggan.',
                'link' => 'https://fontawesome.com/icons/gears?f=classic&s=solid',
                'created_at' => '2025-07-21 18:20:57',
                'updated_at' => '2025-07-25 19:34:09',
            ],
            [
                'id' => 2,
                'icon' => 'bi-journal',
                'title' => 'Desain Grafis',
                'description' => 'Perkuat identitas brand Anda melalui desain grafis yang kreatif dan berdampak. Kami melayani pembuatan logo, branding kit, konten media sosial, dan materi promosi.',
                'link' => 'https://bootstrapmade.com/',
                'created_at' => '2025-07-21 18:22:04',
                'updated_at' => '2025-07-25 19:34:31',
            ],
            [
                'id' => 3,
                'icon' => 'bi-printer',
                'title' => 'Fotografi',
                'description' => 'Tampilkan produk dan momen terbaik Anda dengan hasil foto berkualitas profesional. Layanan kami mencakup fotografi produk, makanan, event, dan interior.',
                'link' => 'https://www.youtube.com/',
                'created_at' => '2025-07-21 18:22:46',
                'updated_at' => '2025-07-25 19:34:47',
            ],
        ]);
    }
}
