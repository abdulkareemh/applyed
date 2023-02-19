<?php

use App\Http\Controllers\authentications\AuthController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\cities\CitiesController;
use App\Http\Controllers\cities\locationsController;
use App\Http\Controllers\cutomers\CutomerController;
use App\Http\Controllers\dashboard\Index;
use App\Http\Controllers\destroy\destroyController;
use App\Http\Controllers\Mealcategories\CategoriesController;
use App\Http\Controllers\owner\accountController;
use App\Http\Controllers\owner\iteamsController;
use App\Http\Controllers\restaurant\RestaurantCategoryController;
use App\Http\Controllers\restaurant\RestaurantController;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;


Route::group(['middleware' => ['auth']],function(){
   
   Route::get('/',[Index::class,'index']);
   
   Route::post('/logout',[AuthController::class,'logout']);
   
});
Route::get('/login',function(){
   return view('content.authentications.auth-login-basic');

});
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware('auth')->get('/hi',function(){
   return 'hiillooo';
});

Route::get('/customers', [CutomerController::class,'index'])->name('dashboard.cutomers');
Route::get('/addcutomer', [CutomerController::class,'form']);
Route::post('/addcutomer', [CutomerController::class,'store'])->name('dashboard.addcutomer');
Route::post('/delcutomer/{id}', [CutomerController::class,'destroy']);
Route::get('/editcutomer/{id}', [CutomerController::class,'edit']);
Route::post('/editcutomer/{id}', [CutomerController::class,'update']);

Route::get('/restaurant', [RestaurantController::class,'index'])->name('dashboard.restaurant');
Route::get('/createRestaurant', [RestaurantController::class,'form']);
Route::post('/createRestaurant', [RestaurantController::class,'store'])->name('dashboard.createrestaurant');
Route::post('/delRestaurant/{id}', [RestaurantController::class,'destroy']);


Route::get('/restaurantCategory', [RestaurantCategoryController::class,'index'])->name('dashboard.restaurant.Category');
Route::get('/createRestaurantCategory', [RestaurantCategoryController::class,'form']);
Route::post('/createRestaurantCategory', [RestaurantCategoryController::class,'store'])->name('dashboard.createrestaurant.Category');
Route::post('/delRestaurantCategory/{id}', [RestaurantCategoryController::class,'destroy']);

Route::get('/cities',         [CitiesController::class,'index'])->name('dashboard.city');
Route::get('/createcities',   [CitiesController::class,'form']);
Route::post('/createcities',  [CitiesController::class,'store'])->name('dashboard.city.create');
Route::post('/delcreatecities/{id}', [CitiesController::class,'destroy']);

Route::get('/locations',         [locationsController::class,'index'])->name('dashboard.location');
Route::get('/createlocations',   [locationsController::class,'form']);
Route::post('/createlocations',  [locationsController::class,'store'])->name('dashboard.createlocarion');
Route::post('/dellocations/{id}', [locationsController::class,'destroy']);

Route::get('/mealCategories',         [CategoriesController::class,'index'])->name('dashboard.category');
Route::get('/createmealCategories',   [CategoriesController::class,'form']);
Route::post('/createmealCategories',  [CategoriesController::class,'store'])->name('dashboard.createcategory');
Route::post('/delmealCategories/{id}', [CategoriesController::class,'destroy']);


Route::group(['middleware'=> ['owner']],function()
{
   Route::get('/owner',[accountController::class,'index'])->name('dashboard.name');

   Route::get('/owner/meals',[accountController::class,'meals'])->name('dashboard.Meals');
   Route::get('/owner/createmeal',   [accountController::class,'form']);
   Route::post('/owner/createmeal',  [accountController::class,'store'])->name('dashboard.createmeal');
    Route::post('/owner/delmeal/{id}',[iteamsController::class,'delMeal']);
    // Route::get('/owner/edit',[iteamsController::class,'edit']);

   Route::get('/owner/items/{id}',   [accountController::class,'items']);
   Route::post('/owner/items/cancel/{id}',   [iteamsController::class,'cancel']);
   Route::post('/owner/items/aprove/{id}',   [iteamsController::class,'aprove']);
});

