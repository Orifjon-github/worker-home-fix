<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use App\Models\Plan;
use App\Models\ServiceAdvantage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $plan_id
 * @property mixed $services
 * @property mixed $id
 * @property mixed $created_at
 * @property mixed $plan
 */
class OrderDetailResource extends JsonResource
{
    use Helpers;
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
                $title = $this->getValue($service->service);
                $image = $service->service->image;
                $description = $this->getValue($service->service, 'description');
                break;
            }
        } else {
            $title = 'Corporate Service';
            $image = 'corporate image soon';
            $description = 'corporate description soon';
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'type' => $plan->type,
            'service_image' => $image,
            'description' => $description,
            'services' => $plan->type == 'individual' ? ServiceAdvantageResource::collection(ServiceAdvantage::services($this->services)) : PlanAdvantageResource::collection($this->plan->advantages),
            'created_at' => date('Y-m-d H:i', strtotime($this->created_at))
        ];
    }
}
