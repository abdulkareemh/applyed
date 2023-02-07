<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function popular(){
        $meals = Meal::take(10)->get();
        return $meals;
    }
}
