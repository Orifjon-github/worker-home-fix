<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskImages extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'task_images';
    use HasFactory;

    protected $fillable = [
        'task_id',
        'image',
        'state'
    ];
}
