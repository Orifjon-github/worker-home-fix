<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeEquipments extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'home_equipment';

    public function home()
    {
        return $this->belongsTo(UserHome::class, 'home_id');
    }
}
