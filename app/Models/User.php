<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static create($all)
 * @method static where(string $type, mixed $username)
 * @method static updateOrCreate(array $array, array $create)
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getTasks(): \Illuminate\Support\Collection
    {
        $tasks = s_db()->table('task_worker_user')->where('worker_user_id', $this->id)->pluck('task_id');

        return Task::whereIn('id', $tasks)->get();
    }

    public function tokensFCM(): HasMany
    {
        return $this->hasMany(UserFcmToken::class, 'user_id');
    }

    public function home(): HasMany
    {
        return $this->hasMany(UserHome::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(UserQuestion::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function plans(): HasMany
    {
        return $this->hasMany(UserPlan::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(UserWallet::class);
    }

    public function sms_code(): HasOne
    {
        return $this->hasOne(SmsCode::class);
    }

    public function fcm_tokens(): HasMany
    {
        return $this->hasMany(UserFcmToken::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(UserPayment::class);
    }
}
