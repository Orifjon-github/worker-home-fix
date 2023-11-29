<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Social::create([
            'name' => 'Instagram',
            'link' => 'https://instagram.com',
            'icon' => '/storage/socials/instagram.png'
        ]);
        Social::create([
            'name' => 'Telegram',
            'link' => 'https://t.me',
            'icon' => '/storage/socials/telegram.png'
        ]);
    }
}
