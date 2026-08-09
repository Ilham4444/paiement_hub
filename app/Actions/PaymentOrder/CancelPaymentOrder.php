<?php

namespace App\Actions\PaymentOrder;

use App\Http\Requests\PaymentOrder\CancelPaymentOrderRequest;
use App\Models\PaymentOrder;

class CancelPaymentOrder
{
    public function __invoke(CancelPaymentOrderRequest $request, PaymentOrder $paymentOrder)
    {
        $this->handle($paymentOrder);

        return response()->json(['message' => 'Ordre de paiement annulé.']);
    }

    public function handle(PaymentOrder $paymentOrder): void
    {
        $paymentOrder->delete();
    }
}