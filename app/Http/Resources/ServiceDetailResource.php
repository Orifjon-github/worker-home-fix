<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $advantages
 * @property mixed $image
 * @property mixed $id
 * @property mixed $video_bg
 * @property mixed $icon
 */
class ServiceDetailResource extends JsonResource
{
    use Helpers;
    public function toArray(Request $request): array
    {
        $seo = Seo::where('type', 'service')->where('parent_id', $this->id)->get();
        return [
            'id' => $this->id,
            'title' => $this->getValue($this),
            'description' => $this->getValue($this, 'description'),
            'image' => env('IMAGES_BASE_URL') .$this->image,
            'icon' => env('IMAGES_BASE_URL') .$this->icon,
            'video_url' => $this->getValue($this, 'video_url'),
            'video_bg' => env('IMAGES_BASE_URL') .$this->video_bg,
            'advantages' => ServiceAdvantageResource::collection($this->advantages),
            'seo' => SeoResource::collection($seo)
        ];
    }
}
