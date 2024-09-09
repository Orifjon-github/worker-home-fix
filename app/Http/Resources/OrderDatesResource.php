<?php

namespace App\Http\Resources;

use App\Models\UserHome;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $home_id
 * @property mixed $date
 */
class OrderDatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $home = UserHome::find($this->home_id);
        return [
            'home' => $home ? $home->title : "My Home",
            'date' => $this->date
        ];
    }
}
