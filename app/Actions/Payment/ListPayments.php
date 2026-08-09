<?php

namespace App\Actions\Payment;

use App\Models\Payment;

class ListPayments
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return Payment::query()
            ->with(['paymentOrder', 'processedBy'])
            ->paginate(10);
    }
}