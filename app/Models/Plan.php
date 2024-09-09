<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, string $string1)
 * @method static find(mixed $plan_id)
 */
class Plan extends Model
{
    use HasFactory;

    public function advantages(): HasMany
    {
        return $this->hasMany(PlanAdvantage::class);
    }
}
