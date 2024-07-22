<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * @property mixed $id
 */
class BannerResource extends JsonResource
{
    use Helpers;
    public function toArray(Request $request): array
    {
        $language = App::getLocale();
//        $title = match ($language) {'ru' => $this->title, 'uz' => $this->title_uz ?? $this->title, 'en' => $this->title_en ?? $this->title};
        $image = match ($language) {'ru' => $this->image, 'uz' => $this->image_uz ?? $this->image, 'en' => $this->image_en ?? $this->image};
        return [
            'id' => $this->id,
            'title' => $this->getValue($this, 'title'),
            'image' => env('IMAGES_BASE_URL') . $image,
        ];
    }
}
