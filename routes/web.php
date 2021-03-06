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
    'middleware' => ['localization','auth']
], function(){

    Route::get('/',['uses' => 'EventController@store', 'as' => 'store_event']);
    // List events page
    Route::get('event', ['uses' => 'EventController@showEvents', 'as' => 'list_events']);


// Event page

    Route::get('create',['uses' => 'EventController@showCreationPage', 'as' => 'create_event']);


//Pour l'ajout des items

Route::get('item/{id}',['middleware' => 'auth', 'uses' => 'EventItemController@show', 'as' => 'list_event_items']);

Route::post('item',['uses' =>'EventItemController@store', 'as' => 'store_item']);


//Creation page

    Route::post('event',['uses' => 'EventController@store', 'as' => 'store_event']);//Route pour après l'envoie du fomulaire


//Add order

    Route::get('event/{id}', ['uses' => 'EventController@show', 'as' => 'show_event']);




    //This should be here, since it has no need to be translated
    //not with the autoredict ChackLang
    Route::post('order',['uses' =>'OrderController@userTakes', 'as' => 'store_orders']);
});



Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => '(fr|en)'],
    'middleware' => ['localization']
], function(){

    Route::get('login', 'Auth\AuthController@login');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('auth/token/{token}', 'Auth\AuthController@authenticate');
    Route::get('logout', ['uses' => 'Auth\AuthController@logout', 'as' => 'logout']);
});

Route::get('/', function () {
    return view('welcome');
});





