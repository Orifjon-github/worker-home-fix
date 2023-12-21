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
        Partner::create([
           'name' => 'NBU',
           'link' => 'https://nbu.uz/ru',
           'link_uz' => 'https://nbu.uz/uz',
            'icon' => 'uploads/nbu.png'
        ]);
    }
}
