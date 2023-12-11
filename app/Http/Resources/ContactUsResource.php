<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'phone' => $this->phone,
            'Fax' => $this->Fax,
            'POBox' => $this->POBox,
            'Box_no' => $this->Box_no,
            'zip_code' => $this->zip_code,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d')
            ];
    }
}
