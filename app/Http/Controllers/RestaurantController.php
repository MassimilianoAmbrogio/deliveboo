<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway as Gateway;
use App\Restaurant;
use App\Category;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
         return view('restaurants.advanced_search', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (str_contains ( $slug , '=' )) {
            $ArraySlug = explode('=', $slug);
            $slug = $ArraySlug[0];
            $error = $ArraySlug[1];
        } else {
            $error = '';
        }

        $restaurant = Restaurant::where('slug' , $slug)->first();


        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'xyg6km7tjcfh5hkh',
            'publicKey' => 'qghn6r3vsw6tqbbp',
            'privateKey' => '7b394a59ad46848440f8dc4171434f52'
        ]);
        
        $clientToken = $gateway->clientToken()->generate();

        return view('restaurants.show', compact('restaurant', 'clientToken', 'error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
