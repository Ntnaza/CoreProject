<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TestimonialSection;

class TestimonialSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    TestimonialSection::create([
        'title' => 'Testimonials',
        'subtitle' => 'Apa yang mereka katakan tentang kami',
        'background_image' => null, // Awalnya kosong
    ]);
}
}
