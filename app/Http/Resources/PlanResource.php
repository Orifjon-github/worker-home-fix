<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $duration
 * @property mixed $amount
 * @property mixed $advantages
 * @property mixed $services
 * @property mixed $type
 */
class PlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $arr = [
            'id' => $this->id,
            'duration' => $this->duration,
            'amount' => $this->amount,
        ];

        if ($this->type == 'corporate') {
            $arr = array_merge($arr, ['services' => PlanAdvantageResource::collection($this->advantages)]);
        }

        return $arr;
    }
}
