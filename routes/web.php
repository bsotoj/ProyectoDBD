<?php

use Illuminate\Support\Facades\Route;

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

//rutas de Usuario
Route::get('/usuarios', 'UsuarioController@index');
Route::get('/usuarios/{id}', 'UsuarioController@show');
Route::post('/usuarios/create', 'UsuarioController@store');
Route::put('/usuarios/update/{id}', 'UsuarioController@update');
Route::put('/usuarios/delete/{id}', 'UsuarioController@destroy');
