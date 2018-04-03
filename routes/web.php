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

//Parte movil

Route::get('/movil/app/newTravel/{idUsuario}','movilController@newTravel');

Route::get('/movil/app/travelPoints/{idViaje}','movilController@pointsTravel');

Route::get('/movil/app/InformacionContato/{idContacto}','movilController@InformacionContato');

Route::get('/movil/app/pointsContact/{idViaje}','movilController@pointsContact');

Route::get('/movil/app/login','movilController@login');

Route::put('/movil/app/signup','movilController@signup');

Route::get('/movil/app/addcontact/{idUsuario}','movilController@addContact');

Route::get('/movil/app/getContacts/{idUsuario}','movilController@getContacts');
