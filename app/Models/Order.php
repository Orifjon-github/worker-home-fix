<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $create)
 * @method static find($id)
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dates(): HasMany
    {
        return $this->hasMany(OrderDate::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
