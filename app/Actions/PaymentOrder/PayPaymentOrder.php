<?php

namespace App\Actions\PaymentOrder;

use App\Http\Requests\PaymentOrder\PayPaymentOrderRequest;
use App\Http\Resources\PaymentOrderResource;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Models\PaymentOrder;
use Illuminate\Support\Str; 

class PayPaymentOrder
{
    public function __invoke(PayPaymentOrderRequest $request, PaymentOrder $paymentOrder)
    {

        $payment = $this->handle($paymentOrder, $request->validated());

         if($request->hasFile('justification')) {
            $payment->addMediaFromRequest('justification')->toMediaCollection('justification');
        }

       return response()->json([
            'payment' => new PaymentResource($payment),
            'payment_order' => new PaymentOrderResource($paymentOrder->fresh()),
        ], 201);
    }

    public function handle(PaymentOrder $paymentOrder, array $data ): Payment
    {
        
    
        $payment = $paymentOrder->payments()->create([
            'reference' => 'PAY-'.strtoupper(str_replace('-', '', (string) Str::uuid())),
            'montant' => $data['montant'],
            'status' => 'paid',
            'date_paiement' => now(),
            'transaction_number' => $data['transaction_number'] ?? null,
            'transaction_reference' => $data['transaction_reference'] ?? null,
            'processed_by' => auth()->id(),
        ]);
       

        $paymentOrder->montant_restant -= $data['montant'];

  
        $paymentOrder->status = $paymentOrder->montant_restant <= 0
            ? 'Paye'
            : 'Partiellement_paye';

        $paymentOrder->save();

        return $payment;
    }
}