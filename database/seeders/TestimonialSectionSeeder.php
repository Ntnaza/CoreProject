<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonial_sections')->insert([
            'id' => 1,
            'title' => 'Testimoni',
            'subtitle' => 'Apa yang mereka katakan tentang kami',
            'background_image' => 'testimonials/bg/YbiyjiNMPut8H5k5djA8z2YiJBXv9HO16mFklLZG.jpg',
            'created_at' => '2025-07-25 23:45:57',
            'updated_at' => '2025-07-26 00:27:01',
        ]);
    }
}
