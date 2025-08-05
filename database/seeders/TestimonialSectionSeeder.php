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
            'subtitle' => 'Apa kata mereka tentang Core Project',
            'background_image' => 'testimonials/bg/kkz3yjjyx98VnLKvYkHWx0ZWv2d43AcNoxYxNcJk.jpg',
            'created_at' => '2025-07-25 23:45:57',
            'updated_at' => '2025-08-01 10:22:44',
        ]);
    }
}
