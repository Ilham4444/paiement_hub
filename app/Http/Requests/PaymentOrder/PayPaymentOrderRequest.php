<?php

namespace App\Http\Requests\PaymentOrder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class PayPaymentOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'montant' => ['required', 'numeric', 'min:0.01'],
            'transaction_number' => ['required', 'string'],
            'transaction_reference' => ['required', 'string'],
            'justification' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ];
    }

  
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $paymentOrder = $this->route('paymentOrder');

            if (! $paymentOrder) {
                return;
            }

            if ($paymentOrder->status === 'Paye') {
                $validator->errors()->add('status', 'Cet ordre de paiement est déjà payé .');
                return;
            }

            $montant = (float) $this->input('montant');

            if ($montant > (float) $paymentOrder->montant_restant) {
                $validator->errors()->add(
                    'montant',
                    "Le montant dépasse le reste à payer ({$paymentOrder->montant_restant})."
                );
            }
        });
    }
}