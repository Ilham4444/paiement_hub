<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPaymentResource extends JsonResource
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
            'montant' => (float) $this->montant,
            'status' => $this->status,
            'date_paiement' => $this->date_paiement?->toDateTimeString(),
            'number_transaction' => $this->number_transaction,
            'reference_transaction' => $this->reference_transaction,
            'processed_by' => $this->processed_by,
        ];
    }
}
