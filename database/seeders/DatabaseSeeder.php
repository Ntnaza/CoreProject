<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
    AboutSeeder::class,
    ContactInfoSeeder::class,
    CtaSeeder::class,
    FeatureItemSeeder::class,
    FeatureSectionSeeder::class,
    HeroItemSeeder::class,
    PortfolioCategorySeeder::class,
    PortfolioItemSeeder::class,
    ServiceSeeder::class,
    ServiceSectionSeeder::class,
    SettingSeeder::class,
    TeamMemberSeeder::class,
    TeamSectionSeeder::class,
    TestimonialSeeder::class,
    TestimonialSectionSeeder::class,
    UserSeeder::class,
]);
    }
}
