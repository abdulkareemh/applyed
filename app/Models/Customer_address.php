<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_address extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'street',
      'location',
      'building',
      'floor',
      'house_number',
      'customer_id'
  ];
}
