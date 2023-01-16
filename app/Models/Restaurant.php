<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable=['name','location_id','category_id','image'];
    protected $hidden=['created_at','updated_at'];
    public $timestamps=true;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function restaurantCaregory()
    {
        return $this->belongsTo(RestaurantCategory::class);
    }

    public function getLocationIdAttribute($val)
    {
      return Location::where('id',$val)->first() ->name;
    }

    public function getCategoryIdAttribute($val)
    {
      return RestaurantCategory::where('id',$val)->first() ->name;
    }

    public function getUserIdAttribute($val)
    {
      return $val == null ?' ' : User::where('id',$val)->first() ->name;
    }

    public function user()

    {

        return $this->hasOne(User::class);

    }
}
