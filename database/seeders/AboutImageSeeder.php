<?php

namespace Database\Seeders;

use App\Models\AboutImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutImage::create([
           'image' => 'uploads/example.png'
        ]);
        AboutImage::create([
            'image' => 'uploads/example.png'
        ]);
        AboutImage::create([
            'image' => 'uploads/example.png'
        ]);
        AboutImage::create([
            'image' => 'uploads/example.png'
        ]);
        AboutImage::create([
            'image' => 'uploads/example.png'
        ]);
    }
}
