<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            'id' => 1,
            'site_name' => 'Core Project',
            'logo' => 'settings/8bWotVbZdq5Wm8IoocMe4jOhdzhJFRtNvqxsRpQL.png',
            'created_at' => '2025-07-24 00:37:00',
            'updated_at' => '2025-07-24 02:26:04',
        ]);
    }
}
