<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    protected $fillable = [
      
      'is_aproved',
      'is_canceled',
      'restaurant_id',
      'accepted_at',
      'customer_id',
      'location_id',
      'total',

  ];

  public function meals(){
   return $this -> belongsToMany(Meal::class , 'order_meal','order_id','meal_id');
  }
  public function getLocationIdAttribute($val){
   return Customer_address::select('location')->where('id' , $val)->first()->location;
  }
}
