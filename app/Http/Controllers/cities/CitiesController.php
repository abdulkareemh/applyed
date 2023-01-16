<?php

namespace App\Http\Controllers\cities;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
   public function index(){
      $data = City::all();
      
      return view('content.cities.index',['data'=>$data]);
    }

    public function form(){
      return view('content.cities.create');
    }

    public function store(Request $request){
      $validated = $request->validate([
         'name'=>['required','Unique:cities'],
      ]);
      City::create($validated);
      
      return redirect()->route('dashboard.city')->with('success', 'done');
    }
    public function destroy($id)
    {
      $object = City::findOrfail($id);
      if($object->locations->count() != 0){
         return redirect()->back()->with('error', 'there locations related');
     }
     else{

         $object->delete();
         return redirect()->back()->with('success', trans('messages.delete_message'));
     }
    }
}
