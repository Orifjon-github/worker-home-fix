<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find(string $service_id)
 * @method static whereIn(string $string, string[] $services)
 */
class ServiceAdvantage extends Model
{
    use HasFactory;

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public static function services($servicesString)
    {
        $services = explode(',', $servicesString);
        return self::whereIn('id', $services)->get();

    }
}
