<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'title' => 'Example Title Ru 1',
            'title_uz' => "Example Title Uz 1",
            'title_en' => "Example Title En 1",
            'image' => 'uploads/example.png',
            'image_uz' => 'uploads/example.png'
        ]);
        Home::create([
            'title' => 'Example Title Ru 2',
            'title_uz' => "Example Title Uz 2",
            'title_en' => "Example Title En 2",
            'image' => 'uploads/example.png',
            'image_uz' => 'uploads/example.png'
        ]);
    }
}
