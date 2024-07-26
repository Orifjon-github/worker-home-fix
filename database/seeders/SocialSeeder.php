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
            'link' => 'https://t.me/orifjon_oripov',
            'icon' => 'uploads/66a227d2a43d1.png'
        ]);
        Social::create([
            'name' => 'Facebook',
            'link' => 'https://t.me/orifjon_oripov',
            'icon' => 'uploads/66a227c49abaf.png'
        ]);
        Social::create([
            'name' => 'Youtube',
            'link' => 'https://t.me/orifjon_oripov',
            'icon' => 'uploads/66a227d2a43d1.png'
        ]);
    }
}
