<?php

namespace Database\Seeders;
use App\Models\TeamSection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    TeamSection::create([
        'title' => 'Team',
        'subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
    ]);
}
}
