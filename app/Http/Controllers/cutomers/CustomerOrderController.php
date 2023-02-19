<?php

namespace App\Http\Controllers\cutomers;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function orders(Request $request)
    {
      $id = $request->user()->id;

      $orders = Order::where('customer_id',$id)->get();
      return $orders;
    }

    public function order(Request $request)
    {
      $validated = $request->validate([
         
         
         'location_id'=>['required','integer'],
         'restaurant_id' => ['required','integer'],
         'customer_id' => ['required','integer'],
         'meals_id'=>['required','array'],
         
      ]);
      $price = 0;
      foreach($request->meals_id as $meal){
            $m=  Meal::select('price')->where('id',$meal)->first();
           $price = $price + (int)$m->price;
         }
      $order = Order::create([
         'customer_id' => $request->customer_id,
         'restaurant_id' => $request->restaurant_id,
         'total'=>$price,
         'location_id'=>$request->location_id,
      ]);
      
      $order ->meals()->attach($request->meals_id);

      return response()->json(['message' => 'success'], 201);
    }

    public function rate($id,Request $request)
    {
        $validated = $request->validate([
            'rating'=>['required','integer','min:0','max:5'],
         ]);
      $res = Restaurant::findOrfail($id);
      $res->rating=$res->rating+$request->rating;
      $res->number_of_rating+=1;
      $res->save();
      return response()->json(['message' => 'success'], 201);
    }
}
