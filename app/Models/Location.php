<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable=['name','city_id'];
    public $timestamps = false;
    public function Restaurants(){
      return $this-> hasMany(Restaurant::class);
    }
    public function getCityIdAttribute($val){
      return $val == null ?' ' : City::where('id',$val)->first() ->name;
    }
    
}
