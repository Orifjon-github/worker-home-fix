<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advantage::create([
            'title' => "Professional employee",
            'description' => 'We strictly adhere to international food safety standards, ensuring you have products you can trust.',
            'icon' => 'uploads/advantage1.png'
        ]);
        Advantage::create([
            'title' => "Commitment",
            'description' => 'We strictly adhere to international food safety standards, ensuring you have products you can trust.',
            'icon' => 'uploads/advantage2.png'
        ]);
        Advantage::create([
            'title' => 'Verified',
            'description' => 'We strictly adhere to international food safety standards, ensuring you have products you can trust.',
            'icon' => 'uploads/advantage3.png'
        ]);
        Advantage::create([
            'title' => '24/7 support',
            'description' => 'We strictly adhere to international food safety standards, ensuring you have products you can trust.',
            'icon' => 'uploads/advantage4.png'
        ]);
    }
}
