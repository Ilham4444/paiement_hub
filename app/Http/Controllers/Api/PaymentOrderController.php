<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\PaymentOrder\ListPaymentOrders;
use App\Actions\PaymentOrder\ShowPaymentOrder;
use App\Actions\PaymentOrder\CreatePaymentOrder;
use App\Actions\PaymentOrder\PayPaymentOrder;
use App\Actions\PaymentOrder\CancelPaymentOrder;
use App\Http\Requests\PaymentOrder\StorePaymentOrderRequest;
use App\Http\Requests\PaymentOrder\PayPaymentOrderRequest;
use App\Http\Requests\PaymentOrder\CancelPaymentOrderRequest;
use Illuminate\Http\Request;
use App\Models\PaymentOrder;

class PaymentOrderController extends Controller
{
    public function index(ListPaymentOrders $action){
              return $action();

    }

    public function show(ShowPaymentOrder $action, PaymentOrder $paymentOrder){
           return $action($paymentOrder);

    }
    public function store(StorePaymentOrderRequest $request, CreatePaymentOrder $action){
          return $action($request);
    }

    
     public function pay(PayPaymentOrderRequest $request, PayPaymentOrder $action, PaymentOrder $paymentOrder){
          return $action($request, $paymentOrder);

     }
      
     public function cancel(CancelPaymentOrderRequest $request, CancelPaymentOrder $action, PaymentOrder $paymentOrder){
          return $action($request, $paymentOrder);
     }

     }

