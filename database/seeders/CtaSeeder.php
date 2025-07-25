<?php

namespace Database\Seeders;

use App\Models\Cta;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CtaSeeder extends Seeder
{
    public function run(): void
    {
        Cta::create([
            'headline' => 'Call To Action',
            'paragraph' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'button_text' => 'Call To Action',
            'button_url' => '#',
            'background_image' => 'placeholder.jpg', // Nama file placeholder
        ]);
    }
}