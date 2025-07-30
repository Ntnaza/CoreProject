<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('team_members')->insert([
            [
                'id' => 1,
                'name' => 'M Ruby Alamsyah',
                'position' => 'Wakil CEO',
                'photo' => 'team/AJoXgWM69kho2J34RPVySERTysxPYvVjjI2Cyf31.jpg',
                'description' => 'Tuhan memberkati',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => 'https://www.instagram.com/_rubb3rs/',
                'linkedin_url' => null,
                'created_at' => '2025-07-22 23:49:05',
                'updated_at' => '2025-07-28 00:27:11',
            ],
            [
                'id' => 2,
                'name' => 'Raditia Pratama',
                'position' => 'Backend Developer',
                'photo' => 'team/fPrpLLUJU69gnR8YT7Wk1jrVFW21ka6D0CSOUskV.jpg',
                'description' => 'Kucing Imup',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => 'https://www.instagram.com/neonekooo/',
                'linkedin_url' => null,
                'created_at' => '2025-07-24 10:28:56',
                'updated_at' => '2025-07-24 23:28:16',
            ],
            [
                'id' => 3,
                'name' => 'M Nizar Rahmatulloh',
                'position' => 'Fullstak Developer',
                'photo' => 'team/VcxwpKxOGzRjOXXtV7Ew4rCCufWRZ8b5T4reRFI3.jpg',
                'description' => 'AI adalah solusi',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => 'https://www.instagram.com/izar.26/',
                'linkedin_url' => null,
                'created_at' => '2025-07-24 10:53:50',
                'updated_at' => '2025-07-28 00:25:49',
            ],
            [
                'id' => 4,
                'name' => 'Miftah Alfa Reza',
                'position' => 'Backend Developer',
                'photo' => 'team/pdv99EEPdZqBudnPhc8ALWLzikcnY5KgO0dbNQ8J.jpg',
                'description' => 'No fruit',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => 'https://www.instagram.com/markmhbr/',
                'linkedin_url' => null,
                'created_at' => '2025-07-24 11:05:37',
                'updated_at' => '2025-07-28 00:26:01',
            ],
            [
                'id' => 5,
                'name' => 'Jindan',
                'position' => 'Fulstak Devloper',
                'photo' => 'team/pvjw1iRI0aT9x8JT7I6n4cEMTUAp8zlumH5ZTkZI.jpg',
                'description' => 'Woah woah we wan I LIKE Very NICE',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => 'https://www.instagram.com/urbaefinn/',
                'linkedin_url' => null,
                'created_at' => '2025-07-24 11:12:46',
                'updated_at' => '2025-07-28 00:26:10',
            ],
            [
                'id' => 6,
                'name' => 'Arinda Ayu Lestari',
                'position' => 'Frontend Developer',
                'photo' => 'team/8AUCie25sNG3AGbyhjY9X9obS1bCozsYY9LI0pWm.jpg',
                'description' => 'Makanan',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'created_at' => '2025-07-24 11:28:43',
                'updated_at' => '2025-07-24 11:28:43',
            ],
            [
                'id' => 7,
                'name' => 'Sultan Malik Ahmad',
                'position' => 'Designer and Video Editing',
                'photo' => 'team/cSmnGWv7tp6BU4s8h85dtkGocrsYWLSBmAwHfBkS.jpg',
                'description' => 'Niat',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => 'https://www.instagram.com/natanz.t/',
                'linkedin_url' => null,
                'created_at' => '2025-07-24 11:30:23',
                'updated_at' => '2025-07-28 00:26:25',
            ],
            [
                'id' => 8,
                'name' => 'Utep Sutiana',
                'position' => 'Direktur Utama',
                'photo' => 'team/XWDC6SCjvkAlY0frj7b1FLEnM0ICtr31rn7OxvL2.jpg',
                'description' => 'Konsisten',
                'twitter_url' => null,
                'facebook_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'created_at' => '2025-07-24 11:31:47',
                'updated_at' => '2025-07-24 19:54:57',
            ],
        ]);
    }
}
