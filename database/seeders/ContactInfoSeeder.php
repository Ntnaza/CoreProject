<?php

namespace Database\Seeders;
use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    ContactInfo::create([
        'section_title' => 'Contact',
        'section_subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
        'address' => 'A108 Adam Street, New York, NY 535022',
        'phone' => '+1 5589 55488 55',
        'email' => 'info@example.com',
        'map_url' => 'http://googleusercontent.com/maps.google.com/3',
    ]);
}
}
