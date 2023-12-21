<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Example Name 1',
            'job' => 'Example Title Ru 1',
            'job_uz' => "Example Title Uz 1",
            'job_en' => "Example Title En 1",
            'image' => 'uploads/example.png',
        ]);
        Team::create([
            'name' => 'Example Name 2',
            'job' => 'Example Title Ru 2',
            'job_uz' => "Example Title Uz 2",
            'job_en' => "Example Title En 2",
            'image' => 'uploads/example.png',
        ]);
    }
}
