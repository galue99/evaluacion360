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
Route::get('/details', 'PdfController@index1');
Route::Resource('/login', 'AuthController');
Route::Resource('/users', 'UserController');
Route::get('/details_answers/{id}', 'EncuestaController@encuestas_respuesta');


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
    Route::Resource('/comportamientos', 'ComportamientoController');
    Route::get('/competencias_comportamientos', 'CompetenciasController@competencias_comportamientos');
    Route::Resource('/competencias', 'CompetenciasController');
    Route::get('/all_companys', 'CompanyController@allCompanys');
    Route::get('/assing_users', 'EncuestaController@assing_user');
    Route::get('/details_answers/{id}', 'EncuestaController@encuestas_respuesta');
    Route::get('/encuestas_ready', 'EncuestaController@encuestas_ready');
    Route::get('/encuestas/details/{id}', 'EncuestaController@encuestas_details');
    Route::get('/encuesta_users/{id}', 'EncuestaController@encuesta_users');
    Route::get('/encuestas/other_questions/{id}', 'OtherQuestionController@other_questions');
    #Api nueva
    Route::get('/user_encuesta', 'UserController@userEncuesta');
    ###

    Route::Resource('/encuestas/other_question', 'OtherQuestionController');
    Route::get('/allusers', 'UserController@allUser');
    Route::get('/all_users_assign/{id}', 'UserController@allUserAssign');
    Route::Resource('/users_encuestas', 'UserController@users_encuesta');
    Route::get('/users_encuesta/{id}', 'UserController@users_encuestas');
    Route::get('/evaluados/{id}', 'UserController@evaluados');
    Route::post('/user_encuestas_delete', 'UserController@users_encuestas_delete');
    Route::get('/diferents_user/{id}', 'UserController@users_id_diferent');
    Route::get('/printReport/{encuesta_id}/{evaluador_id}', 'PdfController@index');
    Route::get('/pdf/github', 'PdfController@github');
    Route::get('/pdf/encuestas_ready', 'PdfController@encuestas_ready');
    Route::get('/email/{id}', 'UserController@sendEmail');
    Route::post('/emails/{id}', 'UserController@sendEmail');

    Route::Resource('prueba', 'PruebaController');
});

Route::group( ['middleware' => ['auth', 'encuestado'], 'prefix'=>'encuestado'], function() {

    Route::Resource('/', 'EncuestadoController');
    Route::Resource('/encuesta', 'EncuestaController');
    Route::Resource('/encuestas/other_question', 'OtherQuestionController');

});


