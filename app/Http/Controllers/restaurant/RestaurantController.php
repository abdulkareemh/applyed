<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Traits\SaveImagesTrait;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
   use SaveImagesTrait;

    public function index(){
      $resturant = Restaurant::simplepaginate(10);
      
      return view('content.restaurant.index',['resturant'=>$resturant]);
    }

    public function form(){
      $locations = Location::all();
      $category = RestaurantCategory::all();
      // dd($category);
      return view('content.restaurant.create',['loc'=>$locations,'categories'=>$category]);
    }

    public function store(Request $request){
       
       $validated = $request->validate([
          'name'=>['required'],
          'image'=>['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
          'location_id'=>['required','integer'],
          'category_id'=>['required','integer'],
         ]);
         
      $file_name = $this->saveImage($request->image, 'images/restaurants');
      // dd($request);
      
      Restaurant::create([
         'name' => $request->name,
         'location_id'=>$request->location_id,
         'category_id'=>$request->category_id,
         'image' => $file_name
      ]);
      return redirect()->route('dashboard.restaurant')->with('success', 'done');
    }
    public function destroy($id){
      $ob = Restaurant::findOrfail($id);
      $ob->delete();
      return redirect()->route('dashboard.restaurant')->with('success', 'success');
   }
   
}
