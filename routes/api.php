<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Palabras
Route::get('palabras', 'PalabraController@index');
Route::get('palabras/{palabra}', 'PalabraController@show');
Route::post('palabras', 'PalabraController@store');
Route::delete('palabras/{palabra}', 'PalabraController@delete');

// Usuarios
//Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios', 'UsuarioController@login');
Route::get('usuarios/{usuario}', 'UsuarioController@show');
Route::post('usuarios', 'UsuarioController@store');
Route::put('usuarios/{usuario}', 'UsuarioController@update');

// Historial
Route::post('historial/{usuario}/{palabra}', 'PalabraController@storeHistory');
Route::get('historial/{usuario}', 'PalabraController@userhistory');

// Listas
Route::get('listas', 'ListaController@index');
Route::get('listas/{lista}', 'ListaController@show');
Route::get('usuarios/{usuario}/listas', 'ListaController@fromUser');
Route::post('listas', 'ListaController@store');
Route::post('listas/{lista}', 'ListaController@duplicate');
Route::put('listas/{lista}', 'ListaController@update');
Route::delete('listas/{lista}', 'ListaController@delete');

// ListaPalabra
Route::post('listas/{lista}/{palabra}', 'ListaController@storeListaPalabra');
Route::post('listasPalabras/{lista}/{palabra}/move', 'ListaController@moveListaPalabra');
Route::post('listasPalabras/{lista}/{palabra}/copy', 'ListaController@copyListaPalabra');
Route::delete('listasPalabras/{lista}/{palabra}', 'ListaController@deleteListaPalabra');
