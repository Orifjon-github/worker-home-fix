<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WokerRating extends Model
{
    protected $connection = 'mysql';
    use HasFactory;

    protected $table = 'woker_ratings';

    protected $fillable = [
        'user_id',
        'task_id',
        'is_success'
    ];
    public const WORKER_RATING = [
        '0'=>'false',
        '1'=>'true',
    ];
}
