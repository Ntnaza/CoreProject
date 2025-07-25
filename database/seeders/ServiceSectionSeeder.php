<?php

namespace Database\Seeders;
use App\Models\ServiceSection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSectionSeeder extends Seeder
{
   public function run(): void
{
    ServiceSection::create([
        'title' => 'Services',
        'subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
    ]);
}
}
