<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Kategori Galeri
        $category1_id = DB::table('gallery_categories')->insertGetId([
            'name' => 'Kegiatan Internal',
            'filter' => 'kegiatan-internal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $category2_id = DB::table('gallery_categories')->insertGetId([
            'name' => 'Proyek Klien',
            'filter' => 'proyek-klien',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Buat Item Galeri
        // PENTING: Pastikan Anda memiliki gambar-gambar ini di folder 'public/storage/gallery/'
        // Atau ganti dengan path gambar placeholder Anda.
        DB::table('gallery_items')->insert([
            [
                'title' => 'Rapat Tim Awal Pekan',
                'description' => 'Diskusi strategi dan pembagian tugas untuk proyek baru.',
                'image' => 'gallery/sample1.jpg',
                'gallery_category_id' => $category1_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Workshop Laravel',
                'description' => 'Sesi pelatihan internal untuk meningkatkan skill backend.',
                'image' => 'gallery/sample2.jpg',
                'gallery_category_id' => $category1_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Website Profil Sekolah',
                'description' => 'Pengembangan sistem informasi akademik untuk sekolah.',
                'image' => 'gallery/sample3.jpg',
                'gallery_category_id' => $category2_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Aplikasi Kasir Toko',
                'description' => 'Aplikasi Point of Sale (POS) untuk UMKM.',
                'image' => 'gallery/sample4.jpg',
                'gallery_category_id' => $category2_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
