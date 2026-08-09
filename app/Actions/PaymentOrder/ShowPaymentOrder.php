<?php

namespace App\Actions\PaymentOrder;

use App\Models\PaymentOrder;

class ShowPaymentOrder
{
    public function __invoke(PaymentOrder $paymentOrder)
    {
       return new PaymentOrderResource($this->handle($paymentOrder));
    }

    public function handle(PaymentOrder $paymentOrder): PaymentOrder
    {
        return $paymentOrder->load(['article', 'beneficiary', 'payments']);
    }
}