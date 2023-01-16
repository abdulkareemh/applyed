<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
   
    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    protected $fillable = [
      'name',
      
  ];
}
