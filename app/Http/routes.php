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
    Route::Resource('/niveles', 'NivelesController');
    Route::get('/all_companys', 'CompanyController@allCompanys');
    Route::get('/assing_users', 'EncuestaController@assing_user');
    Route::get('/encuesta_users/{id}', 'EncuestaController@encuesta_users');
    Route::get('/encuestas/other_questions/{id}', 'OtherQuestionController@other_questions');
    Route::Resource('/encuestas/other_question', 'OtherQuestionController');
    Route::get('/allusers', 'UserController@allUser');
    Route::Resource('/users_encuestas', 'UserController@users_encuesta');
    Route::get('/users_encuesta/{id}', 'UserController@users_encuestas');
    Route::get('/diferents_user/{id}', 'UserController@users_id_diferent');
});

Route::group( ['middleware' => ['auth', 'encuestado'], 'prefix'=>'encuestado'], function() {

    Route::Resource('/', 'EncuestadoController');
    Route::Resource('/encuesta', 'EncuestaController');
    Route::Resource('/encuestas/other_question', 'OtherQuestionController');

});


