<?php

namespace Database\Seeders;
use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    About::create([
        'section_title' => 'About Us',
        'section_subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
        'headline' => 'Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo',
        'main_image' => 'placeholder.jpg',
        'paragraph1' => 'Ut fugiat ut sunt quia veniam...',
        'paragraph2' => 'Temporibus nihil enim deserunt...',
        'italic_paragraph' => 'Lorem ipsum dolor sit amet...',
        'list_items' => "Ullamco laboris nisi ut aliquip ex ea commodo consequat.\nDuis aute irure dolor in reprehenderit in voluptate velit.\nUllamco laboris nisi ut aliquip ex ea commodo consequat.",
        'final_paragraph' => 'Ullamco laboris nisi ut aliquip...',
        'video_image' => 'placeholder.jpg',
        'video_url' => 'https://www.youtube.com/watch?v=LXb3EKWsInQ',
    ]);
}
}
