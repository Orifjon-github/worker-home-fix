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
            'image' => 'image/path1'
        ]);
        Capability::create([
            'title' => 'Натуральный продукт',
            'image' => 'image/path2'
        ]);
        Capability::create([
            'title' => 'Дает энергию',
            'image' => 'image/path3'
        ]);
        Capability::create([
            'title' => 'Полезно для организма',
            'image' => 'image/path4'
        ]);
    }
}
