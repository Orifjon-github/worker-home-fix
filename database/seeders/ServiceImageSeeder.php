<?php

namespace Database\Seeders;

use App\Models\ServiceImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceImage::create([
            'service_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        ServiceImage::create([
            'service_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        ServiceImage::create([
            'service_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        ServiceImage::create([
            'service_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        ServiceImage::create([
            'service_id' => 1,

            'image' => 'uploads/example.png'
        ]);
    }
}
