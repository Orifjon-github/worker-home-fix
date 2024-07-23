<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Work::create([
            'title' => 'One Go-to Handyman',
            'description' => 'Get one skilled, reliable handyperson. Our team is fully-employed by Honey Homes and vetted for quality and service.',
            'image' => 'uploads/work.png'
        ]);
        Work::create([
            'title' => 'Ongoing Care',
            'description' => 'We\'ll tackle your to-do\'s and maintenance needs every month. For specialist jobs that come up, we\'ll help coordinate.',
            'image' => 'uploads/work.png'
        ]);
        Work::create([
            'title' => 'Simple Coordination',
            'description' => 'Add and track to-do\'s, book visits, and message our team anytime on the Honey Homes mobile app.',
            'image' => 'uploads/work.png'
        ]);
    }
}
