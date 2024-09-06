<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $create_time
 * @property mixed $transaction
 * @property mixed $id
 * @property mixed $cancel_time
 * @property mixed $perform_time
 * @property mixed $amount
 * @property mixed $state
 */
class UserPaymentResource extends JsonResource
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
            'external_id' => $this->transaction,
            'create_time' => $this->create_time ? date('Y-m-d H:i', $this->create_time) : null,
            'perform_time' => $this->perform_time ? date('Y-m-d H:i', $this->perform_time) : null,
            'cancel_time' => $this->cancel_time ? date('Y-m-d H:i', $this->cancel_time) : null,
            'state' => $this->state,
            'amount' => $this->amount / 100,
            'type' => 'payme'
        ];
    }
}
