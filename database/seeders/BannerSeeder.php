<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        Banner::create([
           'title' => 'Title Uz',
           'title_ru' => 'Title Ru',
           'description' => 'Test Description'
        ]);
    }
}
