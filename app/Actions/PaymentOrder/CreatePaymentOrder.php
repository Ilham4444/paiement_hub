<?php

namespace App\Actions\PaymentOrder;

use App\Http\Requests\PaymentOrder\StorePaymentOrderRequest;
use App\Models\PaymentOrder;

class CreatePaymentOrder
{
    public function __invoke(StorePaymentOrderRequest $request)
    {
        $paymentOrder = $this->handle($request->validated());

        return (new PaymentOrderResource($paymentOrder))
            ->response()
            ->setStatusCode(201);
    }

    public function handle(array $data): PaymentOrder
    {
        $data['montant_restant'] = $data['montant'];
        $data['status'] = 'Non_paye';

        return PaymentOrder::create($data);
    }
}