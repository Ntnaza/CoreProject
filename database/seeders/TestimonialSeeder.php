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
                'name' => 'Raditia Pratama',
                'position' => 'Backend Developer',
                'quote' => 'Websitenya keren, next order mybe😘',
                'photo' => 'testimonials/7MCbciRJfgQpkyqUcDth3hQqFFjkWgJEFMtBI5Vz.jpg',
                'stars' => 5,
                'is_approved' => 1,
                'created_at' => '2025-07-25 21:05:32',
                'updated_at' => '2025-07-25 21:35:02',
            ],
            [
                'id' => 2,
                'name' => 'Ruby Alamsyah',
                'position' => 'Wakil CEO',
                'quote' => 'adafaf',
                'photo' => 'testimonials/2X2IkgDnZ3FECd1Ht3E7fUtondoEbhYUSBjhqbSg.jpg',
                'stars' => 5,
                'is_approved' => 0,
                'created_at' => '2025-07-25 21:44:08',
                'updated_at' => '2025-07-25 21:44:08',
            ],
            [
                'id' => 3,
                'name' => 'nizar',
                'position' => 'Fullstak Developer',
                'quote' => 'asfadfafgf',
                'photo' => 'testimonials/Mxrb2IeUvx39FrZ1lMCS49BZ5FH9gCSLrUTjFKVA.jpg',
                'stars' => 4,
                'is_approved' => 1,
                'created_at' => '2025-07-25 21:50:19',
                'updated_at' => '2025-07-25 21:50:38',
            ],
            [
                'id' => 4,
                'name' => 'nathan',
                'position' => 'ada',
                'quote' => 'aadad',
                'photo' => 'testimonials/3e5hTAsakd0WsKBOzj0QhYmNJQfcqu1nT5T1LIAu.jpg',
                'stars' => 5,
                'is_approved' => 0,
                'created_at' => '2025-07-25 23:55:53',
                'updated_at' => '2025-07-25 23:55:53',
            ],
            [
                'id' => 5,
                'name' => 'Raditia Pratama',
                'position' => 'Wakil CEO',
                'quote' => 'radirt judezz dechh',
                'photo' => 'testimonials/saKmLhNegdOKlH1HBZvjvhjkvHHtjyBZtGVtn3Z0.png',
                'stars' => 1,
                'is_approved' => 0,
                'created_at' => '2025-07-26 00:25:33',
                'updated_at' => '2025-07-26 00:25:33',
            ],
            [
                'id' => 6,
                'name' => 'Arinda ayu Lestari',
                'position' => 'Frontend Developer',
                'quote' => 'Pelayanannya ramah banget dimulai dari awal sampe jadi Puas banget',
                'photo' => 'testimonials/E0f9t0cPbUWCFJ9XyfvtQurLoAzqA82ojATe4BEW.jpg',
                'stars' => 5,
                'is_approved' => 1,
                'created_at' => '2025-07-26 01:19:52',
                'updated_at' => '2025-07-26 01:20:07',
            ],
            [
                'id' => 7,
                'name' => 'ahmad dhani',
                'position' => 'Wakil CEO',
                'quote' => 'wow website buatan core projek sangat keren dari gemini ya',
                'photo' => 'testimonials/YQZ2205QdjtPIsLwWCLWs1evlHoohZw2j4vkWcOj.png',
                'stars' => 5,
                'is_approved' => 1,
                'created_at' => '2025-07-26 02:01:19',
                'updated_at' => '2025-07-26 02:01:36',
            ],
        ]);
    }
}
