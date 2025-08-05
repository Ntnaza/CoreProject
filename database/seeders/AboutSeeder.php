<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Tambahkan ini untuk mengelola tanggal

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            'id' => 1,
            'section_title' => 'Tentang Kami',
            'section_subtitle' => 'Kami melayani dengan Sepenuh Hati',
            'italic_paragraph' => 'Visi & Misi',
            'list_items' => "Memberikan layanan profesional di bidang konstruksi dan teknologi dengan standar mutu tinggi.\r\nMengintegrasikan inovasi dan teknologi terbaru dalam setiap proyek.\r\nMenjalin hubungan jangka panjang dengan klien melalui kepercayaan dan kepuasan.\r\nMengembangkan sumber daya manusia yang unggul dan berintegritas.\r\nBerkomitmen pada pembangunan berkelanjutan dan tanggung jawab sosial.",
            'video_image' => 'about/placeholder.png',
            'video_url' => 'https://www.youtube.com/watch?v=your_video_id',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ]);
    }
}