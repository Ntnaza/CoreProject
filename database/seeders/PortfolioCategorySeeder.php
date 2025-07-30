<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('portfolio_categories')->insert([
            'id' => 1,
            'name' => 'Website',
            'filter' => 'filter-app',
            'created_at' => '2025-07-22 20:52:31',
            'updated_at' => '2025-07-22 20:52:31',
        ]);
    }
}
