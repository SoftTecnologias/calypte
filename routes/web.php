<?php

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

// formularios
Route::get('/', function () {
    return view('index');
});

Route::get('/registro',[
   'uses' => 'formsController@getRegistroForm',
    'as' => 'registrar'
]);

// obtencion de datos
Route::get('/getEstados',[
   'uses' => 'formsController@getEstados'
]);

Route::get('/getCiudades/{id}',[
   'uses' => 'formsController@getMunicipios'
]);

Route::get('/getLocalidades/{id}',[
   'uses' => 'formsController@getColonias'
]);

Route::get('/getUsers',[
   'uses' => 'formsController@getUsers'
]);

// parte de los usuarios
Route::post('/user/new',[
   'uses' => 'UserController@newUser'
]);