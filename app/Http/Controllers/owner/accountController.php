<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use App\Traits\SaveImagesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class accountController extends Controller
{
   use SaveImagesTrait;
   
   public function index(){
      $user_id = Auth::user()->getRawOriginal('restaurant_id');
      $restaurant = Restaurant::find($user_id);
      $order = Order::where('restaurant_id',$user_id)->get();

      return view('content.owner.index',['orders'=>$order,'restaurant'=>$restaurant]);
   }

   public function meals(){
      $user_id = Auth::user()->getRawOriginal('restaurant_id');
      // dd($user_id);
      $meals = Meal::where('restaurant_id',$user_id)->get();
   //   ddd($meals);
      return view('content.owner.meals',['meals'=>$meals]);
   }

   public function form(){
      $data = Category::all();
      return view('content.owner.createmeal',['data'=>$data]);
   }

   public function store(Request $request){
      
      $validated = $request->validate([
         'name'=>['required'],
         'image'=>['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
         'price'=>['required','numeric'],
         'category_id'=>['required','integer'],
         'description'=>['required'],
        ]);
        
        $res_id = Auth::user()->getRawOriginal('restaurant_id');
      //   dd($request);
     $file_name = $this->saveImage($request->image, 'images/meals');
     
     Meal::create([
        'name' => $request->name,
        'price'=>$request->price,
        'category_id'=>$request->category_id,
        'image' => $file_name,
        'description'=>$request->description,
        'restaurant_id'=>$res_id,

     ]);
     return redirect()->route('dashboard.Meals')->with('success', 'done');
   }

   public function items($id){
      $order = Order::where('id',$id)->first();
      $items = $order->meals;

      return view('content.owner.items.index',['meals'=>$items]);
   }
}
