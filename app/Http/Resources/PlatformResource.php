<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatformResource extends JsonResource
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
            'name' => $this->name,
            'baseUrl' => $this->baseUrl,
            'description' => $this->description,
            'logo' => [
                'original' => $this->getFirstMediaUrl('logo') ?: null,
                'medium' => $this->getFirstMediaUrl('logo', 'medium') ?: null,
                'small' => $this->getFirstMediaUrl('logo', 'small') ?: null,
            ],
            'services_count' => $this->whenCounted('services'),
         ];
    }
}
