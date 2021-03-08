<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Restaurant;
use Faker\Generator as Faker;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();
        foreach ($restaurants as $restaurant) {

            for( $i = 0; $i < 5; $i++){
                $newOrder = new Order();
    
                $newOrder->amount = $faker->randomFloat(2, 1, 999);
                $newOrder->phone = $faker->unique()->phoneNumber();
                $newOrder->address =  $faker->address();
                $newOrder->restaurant_id = $restaurant->id;  
    
                $newOrder->save();
            }
        }
    }
}
