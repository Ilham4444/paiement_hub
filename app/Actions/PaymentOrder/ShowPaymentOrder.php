<?php

namespace App\Actions\PaymentOrder;
use App\Http\Resources\PaymentOrder\ShowPaymentOrderResource;
use App\Models\PaymentOrder;

class ShowPaymentOrder
{
    public function __invoke(PaymentOrder $paymentOrder)
    {
       return new ShowPaymentOrderResource($this->handle($paymentOrder));
    }

    public function handle(PaymentOrder $paymentOrder): PaymentOrder
    {
        return $paymentOrder->load(['article', 'beneficiary', 'payments']);
    }
}