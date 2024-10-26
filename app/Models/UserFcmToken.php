<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $fcm_token)
 */
class UserFcmToken extends Model
{
    use HasFactory;
    protected $table = 'user_fcm_token';
    protected $fillable = [
        'user_id',
        'token',
    ];
}
