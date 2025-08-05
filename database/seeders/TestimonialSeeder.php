<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'id' => 1,
                'name' => 'Arinda ayu Lestari',
                'position' => 'Frontend Developer',
                'quote' => 'Pelayanannya ramah banget dimulai dari awal sampe jadi Puas banget',
                'photo' => 'testimonials/E0f9t0cPbUWCFJ9XyfvtQurLoAzqA82ojATe4BEW.jpg',
                'stars' => 5,
                'is_approved' => 1,
                'created_at' => '2025-07-26 01:19:52',
                'updated_at' => '2025-08-01 10:17:33',
            ],
            [
                'id' => 2,
                'name' => 'Nathan',
                'position' => 'CEO ZOO Digital',
                'quote' => 'Websitenya keren banget, desainnya bersih dan cepat diakses!',
                'photo' => 'testimonials/n8z3EGi96hr04sCvzCn92NRkxCEONnbs2D6l9kVi.jpg',
                'stars' => 5,
                'is_approved' => 1,
                'created_at' => '2025-08-01 10:18:42',
                'updated_at' => '2025-08-01 10:18:42',
            ],
            [
                'id' => 3,
                'name' => 'Muhammad Nizar',
                'position' => 'Freelancer',
                'quote' => 'Tim Core Project sangat responsif dan membantu. Proyek saya selesai tepat waktu!',
                'photo' => 'testimonials/k0YHOZZZwX1oKH2j0j8DeyvqJ53EsnmG7xq5Z7UO.jpg',
                'stars' => 4,
                'is_approved' => 1,
                'created_at' => '2025-08-01 10:19:21',
                'updated_at' => '2025-08-01 10:19:21',
            ],
            [
                'id' => 4,
                'name' => 'Ruby Alamsyah',
                'position' => 'Wakil CEO',
                'quote' => 'Supportnya mantap dan desainnya sesuai request.',
                'photo' => 'testimonials/2X2IkgDnZ3FECd1Ht3E7fUtondoEbhYUSBjhqbSg.jpg',
                'stars' => 5,
                'is_approved' => 0,
                'created_at' => '2025-07-25 21:44:08',
                'updated_at' => '2025-08-01 10:20:00',
            ],
        ]);
    }
}
