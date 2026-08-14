<?php

namespace App\Http\Resources\Association;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateAssociationResource extends JsonResource
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
            'date_depot' => $this->date_depot,
           
        ];
    }
}
