<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentOrderResource extends JsonResource
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
            'reference' => $this->reference,
            'title' => $this->title,
            'montant' => (float) $this->montant,
            'montant_restant' => (float) $this->montant_restant,
            'status' => $this->status,
            'article' => $this->whenLoaded('article', fn () => [
                'id' => $this->article->id,
                'name' => $this->article->name,
            ]),

        ];
    }
}
