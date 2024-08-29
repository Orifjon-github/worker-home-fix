<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $id)
 * @method static create(array $all)
 * @method static find($id)
 */
class HomeEquipment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function home(): BelongsTo
    {
        return $this->belongsTo(UserHome::class, 'home_id');
    }
}
