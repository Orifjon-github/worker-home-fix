<?php

namespace Database\Seeders;

use App\Models\ProjectImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectImage::create([
            'project_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        ProjectImage::create([
            'project_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        ProjectImage::create([
            'project_id' => 1,
            'image' => 'uploads/example.png'
        ]);
        ProjectImage::create([
            'project_id' => 1,
            'image' => 'uploads/example.png'
        ]);
        ProjectImage::create([
            'project_id' => 1,
            'image' => 'uploads/example.png'
        ]);
    }
}
