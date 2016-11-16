<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

    
    return view('welcome');
});

// Event page
Route::get('event/{id}', 'EventController@show');
// List events page
Route::get('event', 'EventController@showEvents');


//Creation page
Route::get('create','EventController@showCreationPage');
Route::post('event','EventController@store');//Route pour après l'envoie du fomulaire


//Add order
Route::post('order','OrderController@userTakes');

Route::get('hello', 'EventController@test');