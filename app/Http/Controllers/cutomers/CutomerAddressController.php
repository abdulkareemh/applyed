<?php

namespace App\Http\Controllers\cutomers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Customer_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Expectation;

class CutomerAddressController extends Controller
{
    public function create_address(Request $request)
    {


        $validated = $request->validate([
            'name' => ['required'],
            'street' => ['required'],
            'location' => ['required'],
            'building' => ['required'],
            'floor' => ['required'],


        ]);
        try {
            $address =  Customer_address::create([
                'name' => $validated['name'],
                'street' => $validated['street'],
                'location' => $validated['location'],
                'building' => $validated['building'],
                'customer_id' => $request->user()->id,
                'floor' => $validated['floor'],
                'house_number' => $request->house_number,
            ]);

            return $address;
        } catch (Expectation $e) {
            return "try again later";
        }
    }
    public function get_addresses(Request $request)
    {
        $addresses = Customer_address::where('customer_id', $request->user()->id)->get();
        return $addresses;
    }
}
