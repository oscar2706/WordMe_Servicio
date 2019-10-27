<?php

use Illuminate\Http\Request;

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

// Palabra
Route::get('palabras', 'PalabraController@index');
Route::get('palabras/{palabra}', 'PalabraController@show');
Route::post('palabras', 'PalabraController@store');
Route::delete('palabras/{palabra}', 'PalabraController@delete');
