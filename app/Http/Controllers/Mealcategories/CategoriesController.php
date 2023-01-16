<?php

namespace App\Http\Controllers\Mealcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
   public function index(){
      $data = Category::all();
      
      return view('content.MealsCategory.index',['data'=>$data]);
    }

    public function form(){
      
      return view('content.MealsCategory.create');
    }

    public function store(Request $request){
      $validated = $request->validate([
         'name'=>['required','Unique:categories'],
         
      ]);
      Category::create($validated);
      
      return redirect()->route('dashboard.category')->with('success', 'done');
    }
    public function destroy($id)
    {
      $object = Category::findOrfail($id);
      if($object->Meals->count() != 0){
         return redirect()->back()->with('error', 'there is meals related');
     }
     else{

         $object->delete();
         return redirect()->back()->with('success', 'success');
     }
    }
}
