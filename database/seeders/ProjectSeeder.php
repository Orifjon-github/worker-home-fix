<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Example Title Ru 1',
            'title_uz' => "Example Title Uz 1",
            'title_en' => "Example Title En 1",
            'short_description' => 'Example short_description Ru 1',
            'short_description_uz' => "Example short_description Uz 1",
            'short_description_en' => "Example short_description En 1",
            'description' => 'Example description Ru 1',
            'description_uz' => "Example description Uz 1",
            'description_en' => "Example description En 1",
            'image' => 'uploads/example.png'
        ]);
        Project::create([
            'title' => 'Example Title Ru 2',
            'title_uz' => "Example Title Uz 2",
            'title_en' => "Example Title En 2",
            'short_description' => 'Example short_description Ru 2',
            'short_description_uz' => "Example short_description Uz 2",
            'short_description_en' => "Example short_description En 2",
            'description' => 'Example description Ru 2',
            'description_uz' => "Example description Uz 2",
            'description_en' => "Example description En 2",
            'image' => 'uploads/example.png'
        ]);
    }
}
