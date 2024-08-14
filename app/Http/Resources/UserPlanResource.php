<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $is_complete
 * @property mixed $date
 * @property mixed $name
 * @property mixed $id
 */
class UserPlanResource extends JsonResource
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
            'date' => date('d-m-Y', strtotime($this->date)),
            'is_complete' => (bool)$this->is_complete
        ];
    }
}
