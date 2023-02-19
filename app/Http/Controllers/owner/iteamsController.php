<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class iteamsController extends Controller
{
    public function cancel($id){
         $order = Order::findOrfail($id);
         $order->is_canceled = 1;
         $order->save();
         return redirect('/dashboard/owner');

    }
    public function aprove($id){

         $order = Order::findOrfail($id);
         $order->is_aproved = 1;
         $order->accepted_at = now();
         $order->save();
         return redirect('/dashboard/owner');
    }
    public function delMeal($id)
    {
        $meal = Meal::findOrfail($id);
        $meal->delete();
        $meal->save;
        return redirect()->route('dashboard.Meals')->with('success', 'done');
    }
    // public function edit(){
    //     $restaurant = Restaurant::findOrfail(Auth::user()->getRawOriginal('restaurant_id'));
    //     return view('content.owner.editRestaurant',['data'=>$restaurant]);
    // }
}
