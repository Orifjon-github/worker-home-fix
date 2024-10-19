<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskWorks extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'task_works';
    use HasFactory;
    protected $fillable = [
        'task_id',
        'name',
        'price',
        'is_finished',
    ];
}
