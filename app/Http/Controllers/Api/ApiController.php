<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Dish;
use App\Order;

class ApiController extends Controller
{
    // filtro ristoranti
    public function filter_restaurant(Request $request) {
        $data = $request->all();
        $name = !empty($data['name']) ? $data['name'] : '';

        // niente filtri, invio tutti i ristoranti
        if ( empty($data['name']) && empty($data['categories']) ) {
            $restaurants = DB::table('restaurants')
                ->select('restaurants.id', 'restaurants.name','restaurants.image_logo', 'restaurants.slug', 'restaurants.phone', 'restaurants.address')
                ->get();
        }
        // filtro con solo nome
        elseif ( ! empty($data['name']) && empty($data['categories'])) {
            $restaurants = Restaurant::where('name', 'like', "%$name%")
                ->select('restaurants.id', 'restaurants.name','restaurants.image_logo', 'restaurants.slug', 'restaurants.phone', 'restaurants.address')
                ->get();
        }
        // filtro con sole categorie
        elseif ( empty($data['name']) && ! empty($data['categories'])) {
            $restaurants = [];

            // ciclo sulle categorie inviate, query a db per ogni categoria
            foreach ($data['categories'] as $category) {
                $results = DB::table('restaurants')
                    ->select('restaurants.id', 'restaurants.name','restaurants.image_logo', 'restaurants.slug', 'restaurants.phone', 'restaurants.address')
                    ->join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
                    ->join('categories', 'categories.id', '=', 'category_restaurant.category_id')
                    ->where('categories.name', $category)
                    ->get();

                // ciclo sui risultati della query
                foreach ($results as $result) {
                    $verify = true;
                    
                    // ciclo su array ristoranti per controllo unicità (l'elemento da pushare è già presente nell'array ristoranti?)
                    foreach ($restaurants as $restaurant) {
                        // se già inserito, setto $verify = false per controllo successivo
                        if ($restaurant->id == $result->id) {
                            $verify = false;
                        }
                    }
                    // push elemento nell'array ristoranti se supera il controllo unicità
                    if ($verify) {
                        $restaurants[] = $result;
                    }
                }
            }
        }
        // filtro completo, sia nome che categorie
        else {
            $restaurants = [];

            foreach ($data['categories'] as $category) {
                $results = DB::table('restaurants')
                    ->select('restaurants.id', 'restaurants.name','restaurants.image_logo', 'restaurants.slug', 'restaurants.phone', 'restaurants.address')
                    ->join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
                    ->join('categories', 'categories.id', '=', 'category_restaurant.category_id')
                    ->where('categories.name', $category)
                    ->where('restaurants.name', 'like', "%$name%")  // controllo aggiuntivo sul nome, rispetto alla query precedente
                    ->get();

                foreach ($results as $result) {
                    $verify = true;
                    foreach ($restaurants as $restaurant) {
                        if ($restaurant->id == $result->id) {
                            $verify = false;
                        }
                    }
                    if ($verify) {
                        $restaurants[] = $result;
                    }

                }
            }
        }

        // return JSON
        return response()->json($restaurants);
    }

    // piatti da mostrare nel menu' al cliente
    public function get_dishes(Request $request) {

      $data = $request->all();
      $dishes= Dish::where('restaurant_id', $data['id'])->get();

      return response()->json($dishes);
    }

    // dati da mostrare per le statistiche
    public function get_statistics(Request $request){
        $data = $request->all();
        $idRest = $data['id'];
        $orders = Order::where('restaurant_id', $idRest)->get();

        return response()->json($orders);
    }
}
