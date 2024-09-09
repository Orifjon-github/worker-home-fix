<?php

namespace App\Http\Resources;

use App\Models\Plan;
use App\Models\ServiceAdvantage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $plan_id
 * @property mixed $services
 * @property mixed $id
 * @property mixed $created_at
 */
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $plan = Plan::find($this->plan_id);
        if ($plan->type == 'individual') {
            $title = 'Individual Plan Service';
                $services = explode(',', $this->services);
                foreach ($services as $service_id) {
                    $service = ServiceAdvantage::find($service_id);
                    $title = $service->service->title;
                    break;
                }
        } else {
            $title = 'Corporate Service';
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'created_at' => date('Y-m-d H:i', strtotime($this->created_at))
        ];
    }
}
