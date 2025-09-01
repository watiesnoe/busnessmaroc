<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;

class PayPalController extends Controller
{
    protected $paypal;

    public function __construct(PayPalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function pay()
    {
        $order = $this->paypal->createOrder(10.00);
        return response()->json($order);
    }

    public function capture(Request $request)
    {
        $orderId = $request->orderID;
        $result = $this->paypal->captureOrder($orderId);
        return response()->json($result);
    }
}
