<?php

namespace Database\Seeders;

use App\Models\Capability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Capability::create([
            'title' => 'Халяль',
            'title_uz' => 'Halol',
            'image' => 'image/path1'
        ]);
        Capability::create([
            'title' => 'Натуральный продукт',
            'title_uz' => 'Tabiiy mahsulot',
            'image' => 'image/path2'
        ]);
        Capability::create([
            'title' => 'Дает энергию',
            'title_uz' => 'Energiya beradi',
            'image' => 'image/path3'
        ]);
        Capability::create([
            'title' => 'Полезно для организма',
            'title_uz' => 'Tana uchun foydali',
            'image' => 'image/path4'
        ]);
    }
}
