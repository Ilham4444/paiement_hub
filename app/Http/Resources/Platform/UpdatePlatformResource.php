<?php

namespace App\Http\Resources\Platform;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePlatformResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'name' => $this->name,
            'description' => $this->description,
            'logo' => [
                'original' => $this->getFirstMediaUrl('logo') ?: null,
                'medium' => $this->getFirstMediaUrl('logo', 'medium') ?: null,
                'small' => $this->getFirstMediaUrl('logo', 'small') ?: null,
            ],
             ];
    }
}
