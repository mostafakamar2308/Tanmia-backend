<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->type == 'video') {
            return [
                'video' => $this->video_path,
                'type' => 'video'
            ];
        }
        return[
            'image' => $this->image_path,
            'type' => 'image'
        ];
    }
}
