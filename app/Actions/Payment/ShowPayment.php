<?php

namespace App\Actions\Payment;
use App\Http\Resources\Payment\ShowPaymentResource;
use App\Models\Payment;

class ShowPayment
{
    public function __invoke(Payment $payment)
    {
         return new ShowPaymentResource($this->handle($payment));
    }

    public function handle(Payment $payment): Payment
    {
        return $payment->load(['paymentOrder', 'processedBy']);
    }
}