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
Route::get('/usuarios','UsuarioController@index');

Route::post('/usuarios/create','UsuarioController@store');
Route::get('/usuarios/{id}','UsuarioController@show');
Route::get('/usuarios/update/{id}','UsuarioController@update');
Route::delete('/usuarios/delete/{id}','UsuarioController@destroy');
//rutas de Cartera

Route::get('/carteras','CarteraController@index');
Route::post('/carteras/create','CarteraController@store');
Route::get('/carteras/{id}','CarteraController@show');
Route::get('/carteras/update/{id}','CarteraController@update');
Route::delete('/carteras/delete/{id}','CarteraController@destroy');

//rutas de juegos
Route::get('/juegos','JuegoController@index');
Route::get('/juegos/{id}','JuegoController@show');

//rutas de Permiso

Route::get('/permisos','PermisoController@index');
Route::post('/permisos/create','PermisoController@store');
Route::get('/permisos/{id}','PermisoController@show');
Route::get('/permisos/update/{id}','PermisoController@update');
Route::delete('/permisos/delete/{id}','PermisoController@destroy');
