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
            'title' => "Многолетний опыт",
            'title_uz' => "Ko'p yillik tajriba",
            'description' => 'Lorem ipsum dolor as set',
            'icon' => '/storage/advantages/experience.png'
        ]);
        Advantage::create([
            'title' => "Быстрая доставка",
            'title_uz' => "Tezkor yetkazib berish",
            'description' => 'Lorem ipsum dolor as set',
            'icon' => '/storage/advantages/fast-delivery.png'
        ]);
        Advantage::create([
            'title' => "Натуральный продукт",
            'title_uz' => "Tabiiy mahsulot",
            'description' => 'Lorem ipsum dolor as set',
            'icon' => '/storage/advantages/natural.png'
        ]);
    }
}
