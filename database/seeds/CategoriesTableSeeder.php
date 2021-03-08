<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'italiano',
            'thailandese',
            'greco',
            'vegetariano',
            'vegano',
            'americano',
            'hamburgher',
            'pizzeria',
            'messicano',
            'giapponese',
            'indiano',
            'cinese',
        ];

        foreach ($categories as $category) {
            
            $newCategory = new Category();
          
            $newCategory->name = $category;

            $newCategory->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae turpis aliquam nibh sodales tristique. Ut sapien lacus, volutpat vel pulvinar non, tristique eu felis. Aliquam id condimentum dolor, quis dapibus justo. Donec nec est porta, ultricies mauris et, mattis felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean non risus vel nisi rhoncus finibus sed a ante. Donec blandit metus non leo molestie interdum. Ut purus lacus, aliquet sed nulla eu, blandit iaculis ipsum. Fusce tempus, felis et accumsan feugiat, metus quam maximus ex, nec auctor quam nulla vel eros.';

            $newCategory->save();
        }


    }
}
