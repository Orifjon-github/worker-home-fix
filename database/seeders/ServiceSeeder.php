<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'Example Title Ru 1',
            'title_uz' => "Example Title Uz 1",
            'title_en' => "Example Title En 1",
            'image' => 'uploads/example.png',
        ]);
        Service::create([
            'title' => 'Example Title Ru 2',
            'title_uz' => "Example Title Uz 2",
            'title_en' => "Example Title En 2",
            'image' => 'uploads/example.png',
        ]);
    }
}
