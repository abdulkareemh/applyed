<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
   public function index(){
      $data = RestaurantCategory::all();
      
      return view('content.restaurantCategories.index',['data'=>$data]);
    }

    public function form(){
      return view('content.restaurantCategories.create');
    }

    public function store(Request $request){
      $validated = $request->validate([
         'name'=>['required','Unique:restaurant_categories'],
      ]);
      RestaurantCategory::create($validated);
      
      return redirect()->route('dashboard.restaurant.Category')->with('success', 'done');
    }
    public function destroy($id)
    {
      $res = RestaurantCategory::findOrFail($id);
      $r = Restaurant::where('Category_id',$id)->count();
      if($r != 0){
         return redirect()->back()->with('error', 'there is restaurants related');

      }
      $res->delete();
      return redirect()->back()->with('success', 'success');
    }
}
