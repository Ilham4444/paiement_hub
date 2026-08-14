<?php

namespace App\Actions\PaymentOrder;
use App\Http\Resources\PaymentOrder\ListPaymentOrdersResource;
use App\Models\PaymentOrder;

class ListPaymentOrders
{
    public function __invoke()
    {
       return ListPaymentOrdersResource::collection($this->handle());
    }

    public function handle()
    {
        return PaymentOrder::query()
            ->with(['article', 'beneficiary'])
            ->withCount('payments')
            ->paginate(10);
    }
}