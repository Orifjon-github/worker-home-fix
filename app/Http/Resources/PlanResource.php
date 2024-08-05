<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $duration
 * @property mixed $amount
 * @property mixed $advantages
 * @property mixed $services
 */
class PlanResource extends JsonResource
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
            'duration' => $this->duration,
            'amount' => $this->amount,
            'services' => ServiceDetailResource::collection($this->services)
        ];
    }
}
