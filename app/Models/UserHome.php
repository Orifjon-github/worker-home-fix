<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHome extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'user_homes';
    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }
}
