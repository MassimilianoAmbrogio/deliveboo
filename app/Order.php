<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'amount',
        'phone',
        'address',
        'restaurant_id',
    ];

    public function dishes(){
        return $this->belongsToMany('App\Dish');
    }
}
