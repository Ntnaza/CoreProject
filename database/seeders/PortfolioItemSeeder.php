<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('portfolio_items')->insert([
            [
                'id' => 1,
                'title' => 'Website Profil',
                'description' => 'Branding profesional dengan website profil digital',
                'image' => 'portfolio/W7YyDlkcYrvqBnkf44HJoO8OTuV3CWCjI2D6cqEy.png',
                'portfolio_category_id' => 1,
                'detail_url' => 'https://dapurgiung.com',
                'created_at' => '2025-07-22 20:54:05',
                'updated_at' => '2025-07-25 20:00:53',
            ],
            [
                'id' => 3,
                'title' => 'Website digital Printing',
                'description' => '...',
                'image' => 'portfolio/2XydvLxaj3U3jqh3Upm4TXn7PyfHTP177LNgCv7h.png',
                'portfolio_category_id' => 1,
                'detail_url' => 'https://digitalprinting.yayasannurulislam.org/login',
                'created_at' => '2025-07-25 20:19:15',
                'updated_at' => '2025-07-25 21:15:50',
            ],
        ]);
    }
}
