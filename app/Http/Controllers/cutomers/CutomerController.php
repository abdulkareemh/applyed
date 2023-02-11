<?php

namespace App\Http\Controllers\cutomers;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Symfony\Component\VarDumper\Caster\CutStub;

class CutomerController extends Controller
{
    public function index(){
      $Cutomers = User::where('is_admin', '0')->get();
      // $Cutomers2= User::restaurant()->get();
      $resturant = DB::table('restaurants')->get();
      // dd($Cutomers);
      return view('content.customers.show',['Cutomers'=>$Cutomers,'res'=>$resturant]);
    }

    public function form(){
      $resturant = Restaurant::whereDoesntHave('user')->get();

      // ddd($resturant);

      return view('content.customers.add',['res' => $resturant ]);
    }

    public function store(Request $request){
      $validated = $request->validate([
         'name'=>['required'],
         'expired_date'=>['required','date'],
         'restaurant_id'=>['required','integer'],
         'email' => ['required', 'email','Unique:users'],
         'password' => ['required'],
      ]);
      
      // dd($validated);
      $user = User::create([
        'name'=> $validated['name'],
        'expired_date'=> $validated['expired_date'],
        'restaurant_id'=> $validated['restaurant_id'],
        'email'=> $validated['email'],
        'is_admin'=> 0,
        'password'=> Hash::make($validated['password']),

      ]);
      // dd($user);
     
      return redirect()->route('dashboard.cutomers')->with('success', 'done');
    }

    public function destroy($id){
      return redirect()->route('dashboard.cutomers')->with('error', 'you can not delete Customer');
   }
   public function edit($id){
      $data = User::findOrFail($id);
      return view('content.customers.edit',['data'=>$data]);
   }
   public function update(Request $request,$id){
 
      $validated = $request->validate([
         'name'=>['required'],
         'expired_date'=>['required','date'],
         'email' => ['required', 'email'],
         
      ]);
      $data = User::findOrFail($id);
      $data->update($validated);
      return redirect()->route('dashboard.cutomers')->with('success', 'done');
   }
}
