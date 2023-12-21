<?php

namespace Database\Seeders;

use App\Models\AboutImage;
use App\Models\HistoryImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistoryImage::create([
            'history_id' => 1,
            'image' => 'uploads/example.png'
        ]);
        HistoryImage::create([
            'history_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        HistoryImage::create([
            'history_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        HistoryImage::create([
            'history_id' => 1,

            'image' => 'uploads/example.png'
        ]);
        HistoryImage::create([
            'history_id' => 1,

            'image' => 'uploads/example.png'
        ]);
    }
}
