<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $int)
 * @method static find($id)
 */
class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'title_ru',
        'title_en',
        'short_description',
        'short_description_ru',
        'short_description_en',
        'description',
        'description_ru',
        'description_en',
        'image',
        'image_ru',
        'image_en',
        'type'  ,
        'is_view',
        'enable'
    ];


}
