<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $create)
 * @method static find($id)
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
}
