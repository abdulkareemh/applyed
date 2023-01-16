<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class meals extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
    
   public function run()
   {
      DB::table('meals')->delete();
      DB::table('restaurants')->delete();
      DB::table('locations')->delete();
      DB::table('restaurant_categories')->delete();
      DB::table('cities')->delete();
      DB::table('categories')->delete();

      for ($i = 0; $i < 10; $i++) {
         DB::table('categories')->insert([
            'name'=>Str::random(6),
         ]);
      }
      $cities = array("damascus", "homs", "hama","alppo","daraa");
      for ($i = 0; $i < 5; $i++) {
         DB::table('cities')->insert([
            'name'=>$cities[$i],
         ]);
      }
      $damasId = DB::table('cities')->where('name', 'damascus')->value('id');
      $loc = array("maza", "abu", "malky","fahamy","midan","kfr");
      for ($i = 0; $i < 6; $i++) {
         DB::table('locations')->insert([
            'name'=>$loc[$i],
            'city_id'=>$damasId,
         ]);
      }
      $cat = array("arab", "west", "pizza","burger","dessert","drinks","india","russia","masry","breakfast");
      for ($i = 0; $i < sizeof($cat); $i++) {
         DB::table('restaurant_categories')->insert([
            'name'=>$cat[$i],
         ]);
      }
      for ($i = 0; $i < 30; $i++) {
         DB::table('restaurants')->insert([
            'name' => Str::random(10),
            'location_id'=> DB::table('locations')->inRandomOrder()->limit(1)->value('id'),
            'category_id'=> DB::table('restaurant_categories')->inRandomOrder()->limit(1)->value('id'),
            
         ]);
      }

      for ($i = 0; $i < 150; $i++) {
         $price=rand(1000,80000);
         DB::table('meals')->insert([
            'name' => 'meal',
            'restaurant_id'=> DB::table('restaurants')->inRandomOrder()->limit(1)->value('id'),
            'category_id'=> DB::table('categories')->inRandomOrder()->limit(1)->value('id'),
            'price'=>$price,
            
            'image'=>'im.png',
            'description'=> str::random(50),
         ]);
      }
   }
}
