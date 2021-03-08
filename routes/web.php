<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'StaticPageController@homepage')->name('welcome');
Route::get('/success', 'StaticPageController@success')->name('success');
Route::get('/credits', 'StaticPageController@credits')->name('credits');



Route::resource('/restaurants', 'RestaurantController');

// Route::get('admin/dishes', 'Admin\DishController@showall')->name('admin.dishes.showall')->middleware('auth');
// Route::get('admin/orders', 'Admin\OrderController@showall')->name('admin.orders.showall')->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
->namespace('Admin')
->name('admin.')
->middleware('auth')
->group(function(){
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('dishes', 'DishController');
    Route::resource('orders', 'OrderController');
    Route::resource('restaurants', 'RestaurantController');
    Route::resource('stats', 'StatsController');

});




