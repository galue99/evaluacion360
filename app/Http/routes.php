<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::Resource('/', 'AuthController');

Route::Resource('/login', 'AuthController');

Route::group(['middleware' => ['auth', 'administrador'], 'prefix'=>'admin'], function () {

    Route::Resource('/persons', 'PersonController');
    Route::Resource('/evaluadores', 'EvaluadoresController');
    Route::Resource('/', 'EncuestaController');


    Route::get('logout', 'AuthController@logout');
    //Route::Resource('/', 'EncuestaController');

});

Route::group( ['middleware' => ['auth', 'encuestado'], 'prefix'=>'encuestado'], function() {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('logout', 'AuthController@logout');

});

Route::group( ['middleware' => ['auth', 'encuestador'], 'prefix'=>'encuestador'], function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('logout', 'AuthController@logout');
});

