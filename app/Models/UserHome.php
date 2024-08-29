<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
class UserHome extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function equipments(): HasMany
    {
        return $this->hasMany(HomeEquipment::class, 'home_id');
    }
}
