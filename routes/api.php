<?php

use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\MealsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ResturantsController;
use App\Http\Controllers\cutomers\CustomerOrderController;
use App\Http\Controllers\cutomers\CutomerAddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/refresh', [AuthController::class, 'refresh']);

    // BC 
    Route::get('/addresses', [CutomerAddressController::class, 'get_addresses']);

    Route::post('/create-address', [CutomerAddressController::class, 'create_address']);

    Route::get('/orders', [CustomerOrderController::class, 'orders']);

    Route::post('/order', [CustomerOrderController::class, 'order']);

    Route::post('/submitRate/{id}', [CustomerOrderController::class, 'rate']);
});


// get all resturant 
Route::get('/resturantsAll', [ResturantsController::class, 'get2']);
Route::get('/resturants', [ResturantsController::class, 'get']);
Route::get('/resturantsPaginate', [ResturantsController::class, 'getWithPaginate']);

Route::get('/resturant/{id}', [ResturantsController::class, 'meals']);

Route::get('/test/{id}', [ResturantsController::class, 'test']);

Route::get('/popularMeals',[MealsController::class,'popular']);