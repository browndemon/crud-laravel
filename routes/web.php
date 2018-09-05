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
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'web'], function () {

    
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/clientes', 'ClientesController@index');

    Route::get('/clientes/new', 'ClientesController@new_client');

    Route::post('/clientes/cadastro-cliente', 'ClientesController@addclient');

    Route::get('/clientes/{cliente}/editar', 'ClientesController@editar');

    Route::patch('/clientes/{cliente}', 'ClientesController@update');
    
    Route::delete('/clientes/{cliente}', 'ClientesController@delete');
    
});