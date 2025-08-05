<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('team_sections')->insert([
            'id' => 1,
            'title' => 'Team',
            'subtitle' => 'Berikut adalah tim luar biasa di balik Core Project',
            'created_at' => '2025-07-22 22:23:21',
            'updated_at' => '2025-08-01 09:23:40',
        ]);
    }
}
