<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            'id' => 1,
            'section_title' => 'Tentang Kami',
            'section_subtitle' => 'Kami melayani dengan Sepenuh Hati',
            'headline' => 'Pengembangan Aplikasi Berbasis Website Inovatif, Kolaboratif, Integritas, dan Profesional',
            'main_image' => 'about/rp7C41fR1fuxIsH41h6zJWBoiHSQOB0Koc6fxuLE.png',
            'paragraph1' => 'Berkembang sesuai dengan perkembangan Zaman',
            'paragraph2' => 'Siap memerangi Era Digital',
            'italic_paragraph' => 'Visi & Misi',
            'list_items' => "Memberikan layanan profesional di bidang konstruksi dan teknologi dengan standar mutu tinggi.\r\nMengintegrasikan inovasi dan teknologi terbaru dalam setiap proyek.\r\nMenjalin hubungan jangka panjang dengan klien melalui kepercayaan dan kepuasan.\r\nMengembangkan sumber daya manusia yang unggul dan berintegritas.\r\nBerkomitmen pada pembangunan berkelanjutan dan tanggung jawab sosial.",
            'final_paragraph' => 'Lebih lengkap tentang kami😍',
            'video_image' => 'about/gRsgRc2RV4MZH3DZE72SXkJd4YcjSHHrBQ2l9K8F.png',
            'video_url' => 'https://www.youtube.com/@Natanz.T',
            'created_at' => '2025-07-20 23:24:02',
            'updated_at' => '2025-07-24 09:30:56',
        ]);
    }
}
