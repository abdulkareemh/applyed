<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class iteamsController extends Controller
{
    public function cancel(){
         $order = Order::find(Auth::user()->id);
         $order->is_canceled = 1;
         $order->save();
         return redirect('/dashboard/owner');

    }
    public function aprove(){

         $order = Order::find(Auth::user()->id);
         $order->is_aproved = 1;
         $order->accepted_at = now();
         $order->save();
         return redirect('/dashboard/owner');
    }
}
