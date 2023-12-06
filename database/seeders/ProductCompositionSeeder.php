<?php

namespace Database\Seeders;

use App\Models\ProductComposition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCompositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductComposition::create([
           'product_id' => 1,
           'name' => 'Состав 1',
           'name_uz' => 'Tarkib 1',
        ]);
        ProductComposition::create([
            'product_id' => 1,
            'name' => 'Состав 2',
            'name_uz' => 'Tarkib 2',
        ]);
        ProductComposition::create([
            'product_id' => 1,
            'name' => 'Состав 3',
            'name_uz' => 'Tarkib 3',
        ]);
        ProductComposition::create([
            'product_id' => 1,
            'name' => 'Состав 4',
            'name_uz' => 'Tarkib 4',
        ]);
        ProductComposition::create([
            'product_id' => 1,
            'name' => 'Состав 5',
            'name_uz' => 'Tarkib 5',
        ]);
    }
}
