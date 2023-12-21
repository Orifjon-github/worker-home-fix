<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $language = App::getLocale();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'job' => ($language == "ru") ? $this->job : (($language == "uz") ? ($this->job_uz ?? $this->job) : ($this->job_en ?? $this->job)),
            'image' => env('IMAGES_BASE_URL') . $this->image
        ];
    }
}
