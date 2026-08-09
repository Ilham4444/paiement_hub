<?php

namespace App\Actions\Payment;

use App\Models\Payment;

class ShowPayment
{
    public function __invoke(Payment $payment)
    {
        return response()->json($this->handle($payment));
    }

    public function handle(Payment $payment): Payment
    {
        return $payment->load(['paymentOrder', 'processedBy']);
    }
}