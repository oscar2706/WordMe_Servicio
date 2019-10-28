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
Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios/{email}', 'UsuarioController@login');
Route::post('usuarios', 'UsuarioController@store');

// Listas
Route::get('listas', 'ListaController@index');
Route::get('listas/{lista}', 'ListaController@show');
Route::get('usuarios/{usuario}/listas', 'ListaController@fromUser');
Route::post('listas', 'ListaController@store');
Route::delete('listas/{lista}', 'ListaController@delete');
