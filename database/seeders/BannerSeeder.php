<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        Banner::create([
           'title' => 'Finally, one handyman to knock off your to-do list.',
           'description' => 'Become a member and skip the hassle of home upkeep and maintenance. See what we can do for you with a free, no-obligation home walk-thru.',
            'image' => 'uploads/banner.png'
        ]);
    }
}
