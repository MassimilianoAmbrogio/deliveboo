<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->middleware('web')->group(function() {
    Route::get('/filter-restaurant', 'ApiController@filter_restaurant');
    Route::get('/get-dishes', 'ApiController@get_dishes');
  });
  
  Route::post('/payment', 'Api\PayController@pay')->name('pay');

  Route::namespace('Api')->group(function() {
     Route::get('/get-statistics', 'ApiController@get_statistics');
  });