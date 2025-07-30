<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contact_infos')->insert([
            'id' => 1,
            'section_title' => 'Contact',
            'section_subtitle' => 'Ikuti sosial media kami',
            'address' => 'Jl. Raya Cianjur Bandung Km. 09 Sukaluyu, Selajambe, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43215',
            'phone' => '+62 821-2071-7150',
            'email' => 'coreproject58@gmail.com',
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.425055092776!2d107.21962892110595!3d-6.80325795964781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68535d2dd12b03%3A0xbb08b654531fb447!2sNurul%20Islam%20Vocational%20High%20School!5e0!3m2!1sid!2sid!4v1753337935180!5m2!1sid!2sid',
            'twitter_url' => 'https://x.com/NatanzT7',
            'facebook_url' => 'https://www.facebook.com/?locale=id_ID',
            'instagram_url' => 'https://www.instagram.com/coreproject.sch/',
            'linkedin_url' => 'https://id.linkedin.com/',
            'youtube_url' => 'https://www.youtube.com/@Natanz.T',
            'Tiktok_url' => 'https://www.tiktok.com/',
            'created_at' => '2025-07-23 00:33:28',
            'updated_at' => '2025-07-28 00:28:28',
        ]);
    }
}
