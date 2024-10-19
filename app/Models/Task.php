<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tasks';
    use HasFactory;
    protected $fillable = [
        'order_id',
        'home_equipment_id',
        'type',
        'service_type',
        'name',
        'description',
        'start_time',
        'end_time',
        'status',
        'duration'
    ];
    public function materials()
    {
        return $this->hasMany(TaskMaterials::class , 'task_id');
    }
    public function  images()
    {
        return $this->hasMany(TaskImages::class , 'task_id');
    }
    public function works(){
        return $this->hasMany(TaskWorks::class , 'task_id');
    }
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'task_equipment', 'task_id', 'equipment_id');
    }

}
