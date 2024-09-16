<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $image
 * @property mixed $email
 * @property mixed $phone
 * @property mixed $name
 * @property mixed $username
 * @property mixed $wallet
 * @property mixed $provider
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'image' => env('APP_URL') . $this->image,
            'wallet_id' => $this->wallet->wallet_id,
            'balance' => $this->wallet->balance / 100,
            'social_login' => (bool)$this->provider
        ];
    }
}
