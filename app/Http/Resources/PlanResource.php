<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $duration
 * @property mixed $amount
 * @property mixed $advantages
 * @property mixed $services
 * @property mixed $type
 * @property mixed $name
 * @property mixed $date
 * @property mixed $is_complete
 */
class PlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => date('d-m-Y', strtotime($this->date)),
            'is_complete' => $this->is_complete
        ];
    }
}
