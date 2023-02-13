<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Exception;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function popular()
    {
        try {
            $meals = Meal::take(10)->get();
            return $meals;
        } catch (Exception $e) {
            return 'try again later';
        }
    }

    public function RE()
    {
        try {
            $meals = Meal::inRandomOrder()
                ->limit(5)
                ->get();
            return $meals;
        } catch (Exception $e) {
            return 'try again later';
        }
    }
}
