<?php

namespace Database\Seeders;
use App\Models\FeatureSection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    FeatureSection::create([
        'headline' => 'Why Choose Our Products?',
        'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.',
        'link_text' => 'Learn More',
        'link_url' => '#',
    ]);
}
}
