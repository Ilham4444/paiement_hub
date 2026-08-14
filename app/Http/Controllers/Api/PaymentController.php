<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Payment\ListPayments;
use App\Actions\Payment\ShowPayment;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function index(ListPayments $action){
        return $action();
    }

    public function show(ShowPayment $action, Payment $payment){
        return $action ($payment);
    }

}
