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

//rutas de Region
Route::get('/regions','RegionController@index');
Route::post('/regions/create','RegionController@store');
Route::get('/regions/{id}','RegionController@show');
Route::put('/regions/update/{id}','RegionController@update');
Route::delete('/regions/delete/{id}','RegionController@destroy');

//rutas de Ventas
Route::get('/ventas','VentaController@index');
Route::post('/ventas/create','VentaController@store');
Route::get('/ventas/{id}','VentaController@show');
Route::put('/ventas/update/{id}','VentaController@update');
Route::delete('/ventas/delete/{id}','VentaController@destroy');

//rutas de Comunidad
Route::get('/comunidads','ComunidadController@index');
Route::post('/comunidads/create','ComunidadController@store');
Route::get('/comunidads/{id}','ComunidadController@show');
Route::put('/comunidads/update/{id}','ComunidadController@update');
Route::delete('/comunidads/delete/{id}','ComunidadController@destroy');

//rutas de Biblioteca
Route::get('/bibliotecas','BibliotecaController@index');
Route::post('/bibliotecas/create','BibliotecaController@store');
Route::get('/bibliotecas/{id}','BibliotecaController@show');
Route::put('/bibliotecas/update/{id}','BibliotecaController@update');
Route::delete('/bibliotecas/delete/{id}','BibliotecaController@destroy');

//rutas de Comentario
Route::get('/comentarios','ComentarioController@index');
Route::post('/comentarios/create','ComentarioController@store');
Route::get('/comentarios/{id}','ComentarioController@show');
Route::put('/comentarios/update/{id}','ComentarioController@update');
Route::delete('/comentarios/delete/{id}','ComentarioController@destroy');

//rutas de LogroJuego
Route::get('/logro_juegos','LogroJuegoController@index');
Route::post('/logro_juegos/create','LogroJuegoController@store');
Route::get('/logro_juegos/{id}','LogroJuegoController@show');
Route::put('/logro_juegos/update/{id}','LogroJuegoController@update');
Route::delete('/logro_juegos/delete/{id}','LogroJuegoController@destroy');

//rutas de Comunidad Usuarios
Route::get('/comunidad_usuarios','ComunidadUsuarioController@index');
Route::post('/comunidad_usuarios/create','ComunidadUsuarioController@store');
Route::get('/comunidad_usuarios/{id}','ComunidadUsuarioController@show');
Route::put('/comunidad_usuarios/update/{id}','ComunidadUsuarioController@update');
Route::delete('/comunidad_usuarios/delete/{id}','ComunidadUsuarioController@destroy');

//rutas de ListaDeseoJuego
Route::get('/lista_deseos_juegos','ListaDeseosJuegosController@index');
Route::post('/lista_deseos_juegos/create','ListaDeseosJuegosController@store');
Route::get('/lista_deseos_juegos/{id}','ListaDeseosJuegosController@show');
Route::put('/lista_deseos_juegos/update/{id}','ListaDeseosJuegosController@update');
Route::delete('/lista_deseos_juegos/delete/{id}','ListaDeseosJuegosController@destroy');
