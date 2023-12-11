<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'short_name' => $this->short_name,
            'image' => $this->image_path,
            'status' => $this->status,
            'category' => $this->category->name,
            'created_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
