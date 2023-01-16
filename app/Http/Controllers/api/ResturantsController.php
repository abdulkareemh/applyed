<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Exception;
use Illuminate\Cache\TagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResturantsController extends Controller
{
    public function get(){

      try{
         $resturants = Restaurant::orderBy('location_id')->get();
         // $res=array();
         // for($i =0;$i<sizeof($resturants) ;$i++  ){
         //    $new_input = array(
         //       'name' => $resturants[$i]->name, 
         //       'category' => $resturants[$i]->category_id, 
         //       'location' => $resturants[$i]->location_id, 
         //       'id' => $resturants[$i]->id
         //   );
         //    array_push($res,$new_input); 
         // }
               
           
         return response()->json($resturants);
         }
      catch(Exception $e){
            return response()->json(['Erorr' => 'try again later']);
         }
      }

    public function meals($id)
    {
         try{
            $meals = Meal::where('restaurant_id',$id)->get();
            return $meals;
         }
         catch(Exception $e){
            return response()->json(['Erorr' => 'try again later']);
         }
    }

    public function test()
    {
      // $order = Meal::find(1);
      // return $order -> orders;
      
      return Auth::user()->is_admin == 0;
    }
    public function getWithPaginate()
    {
      try{
         $resturants = Restaurant::orderBy('location_id')->paginate(10);
         // $res=array();
         // for($i =0;$i<sizeof($resturants) ;$i++  ){
         //    $new_input = array(
         //       'name' => $resturants[$i]->name, 
         //       'category' => $resturants[$i]->category_id, 
         //       'location' => $resturants[$i]->location_id, 
         //       'id' => $resturants[$i]->id
         //   );
         //    array_push($res,$new_input); 
         // }
               
           
         return response()->json($resturants);
         }
      catch(Exception $e){
            return response()->json(['Erorr' => 'try again later']);
         }
    }
}
