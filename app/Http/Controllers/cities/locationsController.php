<?php

namespace App\Http\Controllers\cities;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;

class locationsController extends Controller
{
   public function index(){
      $data = Location::all();
      
      return view('content.locations.index',['data'=>$data]);
    }

    public function form(){
      $cities = City::all();
      return view('content.locations.create',['data'=>$cities]);
    }

    public function store(Request $request){
      $validated = $request->validate([
         'name'=>['required','Unique:locations'],
         'city_id'=>['required'],
      ]);
      Location::create($validated);
      
      return redirect()->route('dashboard.location')->with('success', 'done');
    }
    public function destroy($id)
    {
      $object = Location::findOrfail($id);
      if($object->Restaurants->count() != 0){
         return redirect()->back()->with('error', 'there restaurant related');
     }
     else{

         $object->delete();
         return redirect()->back()->with('success', trans('messages.delete_message'));
     }
    }
}
