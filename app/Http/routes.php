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

Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', 'AuthController@logout');
});

Route::group(['middleware' => ['auth', 'administrador'], 'prefix'=>'admin'], function () {

    Route::Resource('/', 'AdminController');
    Route::Resource('/encuesta', 'EncuestaController');
    Route::Resource('/users', 'UserController');
    Route::Resource('/roles', 'RolesController');
    Route::Resource('/img', 'CompanyController');
    Route::get('/assing_user', 'EncuestaController@assing_user');
    Route::get('/allusers', 'UserController@allUser');

});

Route::group( ['middleware' => ['auth', 'encuestado'], 'prefix'=>'encuestado'], function() {

    Route::Resource('/', 'EncuestadoController');
    Route::Resource('/encuesta', 'EncuestaController');

});


