<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {

            $newRestaurant = new Restaurant();

            $newRestaurant->user_id =  $user->id;
            $newRestaurant->name =  $faker->words(2, true);
            $newRestaurant->address =  $faker->address();
            $newRestaurant->vat_num =  $faker->unique()->regexify('[0-9]{11}');
            $newRestaurant->phone =  $faker->unique()->phoneNumber();
            $newRestaurant->slug =  Str::slug($newRestaurant->name, '-');
            $newRestaurant->image_logo =  $faker->imageUrl(640, 480);

            $newRestaurant->save();

        }
    }
}
