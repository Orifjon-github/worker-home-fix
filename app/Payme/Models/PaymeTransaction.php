<?php

namespace App\Payme\Models;

use App\Models\UserWallet;
use App\Payme\Enums\PaymeState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

/**
 * @method static where(string $string, mixed $id)
 * @method static create(array $array)
 */
class PaymeTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'state' => PaymeState::class,
        'create_time' => 'integer',
        'perform_time' => 'integer',
        'cancel_time' => 'integer',
        'reason' => 'integer',
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(UserWallet::class, 'wallet_id', 'id');
    }
}
