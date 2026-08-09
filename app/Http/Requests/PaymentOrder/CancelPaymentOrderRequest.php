<?php

namespace App\Http\Requests\PaymentOrder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CancelPaymentOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $paymentOrder = $this->route('paymentOrder');

            if ($paymentOrder && $paymentOrder->status !== 'Non_paye') {
                $validator->errors()->add(
                    'status',
                    "Impossible d'annuler un ordre déjà (partiellement) payé."
                );
            }
        });
    }
}