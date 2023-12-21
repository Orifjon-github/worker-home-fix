<?php

namespace Database\Seeders;

use App\Models\Capability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Capability::create([
            'title' => "Многолетний опыт",
            'title_uz' => "Ko'p yillik tajriba",
            'image' => 'uploads/example.png'
        ]);
        Capability::create([
            'title' => "Быстрая доставка",
            'title_uz' => "Tezkor yetkazib berish",
            'image' => 'uploads/example.png'
        ]);
        Capability::create([
            'title' => "Натуральный продукт",
            'title_uz' => "Tabiiy mahsulot",
            'image' => 'uploads/example.png'
        ]);
    }
}
