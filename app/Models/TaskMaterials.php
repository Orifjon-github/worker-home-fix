<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMaterials extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'task_materials';
    use HasFactory;
    protected $fillable = [
        'task_id',
        'name',
        'description',
        'price',
        'quantity',
        'quantity_type'
    ];
}
