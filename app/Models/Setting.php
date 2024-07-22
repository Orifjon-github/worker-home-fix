<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 * @method static create(string[] $array)
 */
class Setting extends Model
{
    use HasFactory;

    public static function settings(): array
    {
        return [
            'favicon',
            'address',
            'email',
            'working_hours',
            'services_texts',
            'contact_us_texts',
            'career_texts',
            'faqs_texts',
            'reviews_texts',
            'membership_pla',
            'about_description',
            'about_video_bg',
            'about_video_url'
        ];
    }

    public static function serviceDetail(): array
    {
        return [
            'service_video_bg',
            'service_video_url',
        ];
    }
}
