<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\apiRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function register(apiRequest $request)
   {

      $customer = Customer::where('number', $request->number)->first();
      if ($customer == null) {
         $customer = Customer::create([
            'number' => $request->number,
         ]);
      }
      // Auth::

      $token = $customer->createToken('apptoken')->plainTextToken;

      $responce = [
         'cutomer' => $customer,
         'token' => $token,
      ];
      return response($responce, 201);
   }

   public function logout(Request $request)
   {
      if ($request->user()) {
         $request->user()->tokens()->delete();
      }

      return response()->json(['message' => 'logged out'], 201);
   }
}
