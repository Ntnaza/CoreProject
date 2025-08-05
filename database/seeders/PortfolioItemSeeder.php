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
                'title' => 'Website Profil Restoran',
                'slug' => 'website-profil',
                'description' => 'Membangun citra rasa premium melalui identitas digital yang elegan. Website ini dirancang untuk menampilkan menu, galeri, dan cerita unik restoran kepada calon pelanggan.',
                'image' => 'portfolio/SqBwg3xYx9jPiGMGzuW6mVwWP5sgMMw5pgSPlRKn.jpg',
                'portfolio_category_id' => 2,
                'detail_url' => 'https://dapurgiung.com',
                'created_at' => '2025-07-22 20:54:05',
                'updated_at' => '2025-08-01 08:23:24',
            ],
            [
                'id' => 3,
                'title' => 'Website digital Printing',
                'slug' => 'website-digital-printing',
                'description' => '...',
                'image' => 'portfolio/YkYklu3Q29XuIgPSa7rgMHaScjNZ4kfkulg0Sl6S.png',
                'portfolio_category_id' => 1,
                'detail_url' => 'https://digitalprinting.yayasannurulislam.org/login',
                'created_at' => '2025-07-25 20:19:15',
                'updated_at' => '2025-08-01 08:25:22',
            ],
        ]);
    }
}
