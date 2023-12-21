<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        History::create([
            'years' => '2015-2019',
            'title' => 'Example Title Ru 1',
            'title_uz' => "Example Title Uz 1",
            'title_en' => "Example Title En 1",
            'description' => 'Example Description Ru 1',
        ]);
        History::create([
            'years' => '2019-2023',
            'title' => 'Example Title Ru 2',
            'title_uz' => "Example Title Uz 2",
            'title_en' => "Example Title En 2",
            'description' => 'Example Description Ru 2',
        ]);
    }
}
