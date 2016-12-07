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

Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => '(fr|en)'],
    'middleware' => ['localization']
], function(){
    // List events page
    Route::get('event', 'EventController@showEvents');

    Route::get('/', function () {


        return view('welcome');
    });

// Event page
    Route::get('event/{id}', 'EventController@show');
    Route::get('create','EventController@showCreationPage');


//Pour l'ajout des items

Route::get('item/{id}',['middleware' => 'auth', 'uses' => 'EventItemController@show']);

Route::post('item','EventItemController@store');


//Creation page

    Route::post('event','EventController@store');//Route pour après l'envoie du fomulaire


//Add order
    Route::post('order','OrderController@userTakes');

    Route::get('hello', 'EventController@test');


});


Route::get('/', function () {
    return view('welcome');
});


Route::get('login', 'Auth\AuthController@login');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('auth/token/{token}', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout');


