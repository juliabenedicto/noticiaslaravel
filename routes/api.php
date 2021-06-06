<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Ruta para obtener todas las noticias
Route::get('/noticias', 'App\Http\Controllers\APIController@noticias')->name('noticias');
// Ruta para mostrar una noticia en específico (con su id)
Route::get('/noticia/{noticia}', 'App\Http\Controllers\APIController@show')->name('noticia.show');
// Ruta para obtener todas las categorías
Route::get('/categorias', 'App\Http\Controllers\APIController@categorias')->name('categorias');
// Ruta para obtener las noticias de una categoría
Route::get('/categoria/{categoria}', 'App\Http\Controllers\APIController@categoria')->name('categoria');
// Ruta para obtener las noticias de un autor/a
Route::get('/autor/{autor}', 'App\Http\Controllers\APIController@autor')->name('autor');



