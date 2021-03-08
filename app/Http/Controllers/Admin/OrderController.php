<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Dish;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();
        $id = $restaurant->id;
        $orders = Order::where('restaurant_id', $id)->orderBy('id', 'desc')->paginate(5);

        return view('admin.orders.index', compact('orders', 'id'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $dishes = $order->dishes;
        

        foreach($dishes as $dish) {
            $quantity = DB::table('dish_order')
            ->select('dish_order.quantity')
            ->where("dish_order.order_id", $id)
            ->where("dish_order.dish_id", $dish->id)
            ->first();

            $dish['quantity'] = $quantity->quantity;
        }
        // $dishes = [];
        // foreach ($order->dishes as $dish) {
        //     $dishes[] = $dish->pivot->order_id;
        // }

        return view('admin.orders.show', compact('dishes', 'order',));

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
