<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'author' => 'Orifjon',
            'phone' => '998908319755',
            'product_id' => 1,
            'description' => 'Best quality Product. Perfect!!',
            'video' => 'video/path1'
        ]);
        Comment::create([
            'author' => 'Orifjon',
            'phone' => '998908319755',
            'product_id' => 1,
            'description' => 'Best quality Product. Perfect!!',
            'video' => 'video/path2'
        ]);
        Comment::create([
            'author' => 'Orifjon',
            'phone' => '998908319755',
            'product_id' => 1,
            'description' => 'Best quality Product. Perfect!!',
            'video' => 'video/path3'
        ]);
    }
}
