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
Route::put('/usuarios/update/{id}','UsuarioController@update');
Route::delete('/usuarios/delete/{id}','UsuarioController@destroy');
//rutas de Cartera

Route::get('/carteras','CarteraController@index');
Route::post('/carteras/create','CarteraController@store');
Route::get('/carteras/{id}','CarteraController@show');
Route::put('/carteras/update/{id}','CarteraController@update');
Route::delete('/carteras/delete/{id}','CarteraController@destroy');

//rutas de juegos
Route::get('/juegos','JuegoController@index');
Route::post('/juegos/create','JuegoController@store');
Route::get('/juegos/{id}','JuegoController@show');
Route::put('/juegos/update/{id}','JuegoController@update');
Route::delete('/juegos/delete/{id}','JuegoController@destroy');

//rutas de Permiso

Route::get('/permisos','PermisoController@index');
Route::post('/permisos/create','PermisoController@store');
Route::get('/permisos/{id}','PermisoController@show');
Route::put('/permisos/update/{id}','PermisoController@update');
Route::delete('/permisos/delete/{id}','PermisoController@destroy');

//rutas de Rol

Route::get('/rols','RolController@index');
Route::post('/rols/create','RolController@store');
Route::get('/rols/{id}','RolController@show');
Route::put('/rols/update/{id}','RolController@update');
Route::delete('/rols/delete/{id}','RolController@destroy');

//rutas de RolPermiso

Route::get('/rol_permisos','RolPermisoController@index');
Route::post('/rol_permisos/create','RolPermisoController@store');
Route::get('/rol_permisos/{id}','RolPermisoController@show');
Route::put('/rol_permisos/update/{id}','RolPermisoController@update');
Route::delete('/rol_permisos/delete/{id}','RolPermisoController@destroy');

//rutas de Genero

Route::get('/generos','GeneroController@index');
Route::post('/generos/create','GeneroController@store');
Route::get('/generos/{id}','GeneroController@show');
Route::put('/generos/update/{id}','GeneroController@update');
Route::delete('/generos/delete/{id}','GeneroController@destroy');

//rutas de Pais

Route::get('/pais','PaisController@index');
Route::post('/pais/create','PaisController@store');
Route::get('/pais/{id}','PaisController@show');
Route::put('/pais/update/{id}','PaisController@update');
Route::delete('/pais/delete/{id}','PaisController@destroy');

//rutas de Lista Deseo
Route::get('/lista_deseos','ListaDeseoController@index');
Route::post('/lista_deseos/create','ListaDeseoController@store');
Route::get('/lista_deseos/{id}','ListaDeseoController@show');
Route::put('/lista_deseos/update/{id}','ListaDeseoController@update');
Route::delete('/lista_deseos/delete/{id}','ListaDeseoController@destroy');

//rutas de Logro
Route::get('/logros','LogroController@index');
Route::post('/logros/create','LogroController@store');
Route::get('/logros/{id}','LogroController@show');
Route::put('/logros/update/{id}','LogroController@update');
Route::delete('/logros/delete/{id}','LogroController@destroy');