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
Route::get('event/{id}', ['middleware' => 'auth', 'uses' => 'EventController@show']);
// List events page
Route::get('event', ['middleware' => 'auth', 'uses' => 'EventController@showEvents']);

//Pour l'ajout des items


Route::get('item/{id}',['middleware' => 'auth', 'uses' => 'EventItemController@show']);

Route::post('item','EventItemController@store');

//Creation page
Route::get('create',['middleware' => 'auth', 'uses' =>'EventController@showCreationPage']);
Route::post('event',['middleware' => 'auth', 'uses' =>'EventController@store']);//Route pour après l'envoie du fomulaire


//Add order
Route::post('order',['middleware' => 'auth', 'uses' =>'OrderController@userTakes']);


Route::get('login', 'Auth\AuthController@login');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('auth/token/{token}', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout');