<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'phone',
            'value' => '+998908319755'
        ]);
        Setting::create([
            'key' => 'socials',
            'value' => '[
    {
        "name": "Instagram",
        "link": "www.instagram.com"
    },
    {
        "name": "Telegram",
        "link": "eee"
    }
]'
        ]);
    }
}
