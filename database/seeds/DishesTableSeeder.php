<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\Restaurant;
use Faker\Generator as Faker;

class DishesTableSeeder extends Seeder
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
            
            for ($i=0; $i < 5; $i++) { 
                
                $newDish = new Dish();

                $newDish->restaurant_id = $restaurant->id;
                $newDish->name = $faker->words(2, true);
                $newDish->price = $faker->randomFloat(2, 1, 999);
                $newDish->image = $faker->imageUrl(640, 480);
                $newDish->description = $faker->paragraph(2, true);
                $newDish->vegan = $faker->boolean();
                $newDish->available = $faker->boolean();
                $newDish->typology = $faker->word();

                $newDish->save();
            }
        }
    }
}
