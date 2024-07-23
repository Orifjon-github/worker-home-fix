<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 6; $i++) {
            Partner::create([
                'name' => 'Newsweek',
                'link' => 'https://www.newsweek.com/',
                'icon' => 'uploads/newsweek.png'
            ]);
        }
    }
}
