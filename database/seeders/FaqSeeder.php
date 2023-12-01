<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Какова цена?',
            'answer' => 'Самые дешевые и доступные цены!'
        ]);
        Faq::create([
            'question' => 'Какова цена?',
            'answer' => 'Самые дешевые и доступные цены!'
        ]);
        Faq::create([
            'question' => 'Какова цена?',
            'answer' => 'Самые дешевые и доступные цены!'
        ]);
        Faq::create([
            'question' => 'Какова цена?',
            'answer' => 'Самые дешевые и доступные цены!'
        ]);
    }
}
