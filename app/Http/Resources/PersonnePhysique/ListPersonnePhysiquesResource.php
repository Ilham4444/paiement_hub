<?php

namespace App\Http\Resources\PersonnePhysique;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListPersonnePhysiquesResource extends JsonResource
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
            'cin' => $this->cin,
            'name' => $this->name,
        ];
    }
}
