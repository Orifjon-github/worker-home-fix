<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Suncella',
            'image' => 'product/image1.png',
            'description' => 'Этот продукт очень полезен для вас и содержит очень натуральные травы.Этот продукт очень полезен для вас и содержит очень натуральные травы.',
            'description_uz' => 'Ushbu mahsulot siz uchun juda yaxshi va juda tabiiy o`simliklarni o`z ichiga oladi.Bu mahsulot siz uchun juda yaxshi va juda tabiiy o`tlarni o`z ichiga oladi.'
        ]);
    }
}
