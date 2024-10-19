<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'equipments';
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_damaged'
    ];
}
