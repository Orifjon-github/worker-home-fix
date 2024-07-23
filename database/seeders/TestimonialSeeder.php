<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 10; $i++) {
            Testimonial::create([
                'name' => 'Julian Martinez',
                'image' => 'uploads/review.png',
                'description' => 'We recently moved into a fixer upper in Walnut Creek. Sam has helped us make our house feel like a home MUCH faster and sooner than we would/could have done on our own. One project I am (and Sam is) particularly proud of- creating a hallway of flashing lights as you walk through the house! Sam hung these on a Friday morning, that evening our family had a disco party in the hallway, all thanks to Honey Homes and Sam!',
                'video_url' => 'youtube link',
            ]);
        }
    }
}
