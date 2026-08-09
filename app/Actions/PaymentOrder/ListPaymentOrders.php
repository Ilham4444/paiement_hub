<?php

namespace App\Actions\PaymentOrder;

use App\Models\PaymentOrder;

class ListPaymentOrders
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return PaymentOrder::query()
            ->with(['article', 'beneficiary'])
            ->withCount('payments')
            ->paginate(10);
    }
}