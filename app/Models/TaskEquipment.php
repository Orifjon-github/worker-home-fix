<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskEquipment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'task_equipment';
    use HasFactory;
    protected $fillable = [
        'task_id',
        'equipment_id',
    ];
}
