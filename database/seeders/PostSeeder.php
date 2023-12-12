<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
           'title' => 'Example Blog RU',
           'title_uz' => 'Example Blog UZ',
           'description' => 'Example Description RU',
           'short_description' => 'Example Short Description RU',
           'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);
        Post::create([
            'title' => 'Example Blog RU',
            'title_uz' => 'Example Blog UZ',
            'description' => 'Example Description RU',
            'short_description' => 'Example Short Description RU',
            'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);
        Post::create([
            'title' => 'Example Blog RU',
            'title_uz' => 'Example Blog UZ',
            'description' => 'Example Description RU',
            'short_description' => 'Example Short Description RU',
            'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);
        Post::create([
            'title' => 'Example Blog RU',
            'title_uz' => 'Example Blog UZ',
            'description' => 'Example Description RU',
            'short_description' => 'Example Short Description RU',
            'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);
        Post::create([
            'title' => 'Example Blog RU',
            'title_uz' => 'Example Blog UZ',
            'description' => 'Example Description RU',
            'short_description' => 'Example Short Description RU',
            'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);
        Post::create([
            'title' => 'Example Blog RU',
            'title_uz' => 'Example Blog UZ',
            'description' => 'Example Description RU',
            'short_description' => 'Example Short Description RU',
            'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);
        Post::create([
            'title' => 'Example Blog RU',
            'title_uz' => 'Example Blog UZ',
            'description' => 'Example Description RU',
            'short_description' => 'Example Short Description RU',
            'description_uz' => 'Example Description UZ',
            'image' => 'path/image.png'
        ]);

    }
}
