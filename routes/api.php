<?php

use Illuminate\Http\Request;
use App\User;
use App\Product;


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

Route::get('v/{id}', function ($id =null) {
    return $id;
});

Route::post('login', 'UserController@login');

Route::post('poc', 'UserController@login');


//One To One 
  Route::get('relationships/{id}', 'PocController@One_To_One');


// belongsTo

  Route::get('belongsto/{id}', 'PocController@belongsTo');

  Route::post('store', 'PocController@store');

  Route::get('show/{id}', 'PocController@show');



Route::middleware('auth:api')->group(function () {

    //ProductController

    Route::post('products', 'ProductController@store');
    Route::get('products', 'ProductController@index');
    Route::get('products/{id}', 'ProductController@show');
    Route::put('products/{id}', 'ProductController@update');
    Route::delete('products/{id}', 'ProductController@destroy');
    Route::patch('products', 'ProductController@search');

    //BookingController

    Route::post('bookings', 'BookingController@store');
    Route::get('bookings', 'BookingController@index');
    Route::get('carts', 'BookingController@cart');
    Route::get('payment', 'BookingController@payment');

  
    

    
});