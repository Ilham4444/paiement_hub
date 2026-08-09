<?php

namespace App\Actions\PaymentOrder;

use App\Models\PaymentOrder;

class ShowPaymentOrder
{
    public function __invoke(PaymentOrder $paymentOrder)
    {
        return response()->json($this->handle($paymentOrder));
    }

    public function handle(PaymentOrder $paymentOrder): PaymentOrder
    {
        return $paymentOrder->load(['article', 'beneficiary', 'payments']);
    }
}