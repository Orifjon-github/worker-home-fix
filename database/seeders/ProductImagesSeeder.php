<?php

namespace Database\Seeders;

use App\Models\ProductImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImages::create([
            'product_id' => 1,
           'image' => 'path/image1'
        ]);
        ProductImages::create([
            'product_id' => 1,
            'image' => 'path/image2'
        ]);
        ProductImages::create([
            'product_id' => 1,
            'image' => 'path/image3'
        ]);
        ProductImages::create([
            'product_id' => 1,
            'image' => 'path/image4'
        ]);
    }
}
