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
        Testimonial::create([
           'image' => 'path/image.png'
        ]);
        Testimonial::create([
            'image' => 'path/image.png'
        ]);
        Testimonial::create([
            'image' => 'path/image.png'
        ]);
        Testimonial::create([
            'image' => 'path/image.png'
        ]);
        Testimonial::create([
            'image' => 'path/image.png'
        ]);
    }
}
