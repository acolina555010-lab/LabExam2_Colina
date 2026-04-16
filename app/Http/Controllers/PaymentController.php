<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    public function paymentindex()
    {

      $orders = Order::all();
      

return view('payments.payment', [
    'orders' => $orders
]);
    }
}
