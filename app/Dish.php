<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'restaurant_id',
        'name',
        'price',
        'image',
        'description',
        'vegan',
        'available',
        'typology',
    ];

    public function restaurants(){
        return $this->belongsTo('App\Restaurant');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}
