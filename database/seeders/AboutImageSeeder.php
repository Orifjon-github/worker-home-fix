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
           'image' => '/storage/about/image1.png'
        ]);
        AboutImage::create([
            'image' => '/storage/about/image2.png'
        ]);
        AboutImage::create([
            'image' => '/storage/about/image3.png'
        ]);
        AboutImage::create([
            'image' => '/storage/about/image4.png'
        ]);
        AboutImage::create([
            'image' => '/storage/about/image5.png'
        ]);
    }
}
