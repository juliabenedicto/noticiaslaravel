<?php

use App\Http\Controllers\InicioController;
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

Route::get('/', 'App\Http\Controllers\InicioController@index')->name('inicio.index');


Route::get('/noticias', 'App\Http\Controllers\NoticiaController@index')->name('noticias.index');
Route::get('/noticias/create', 'App\Http\Controllers\NoticiaController@create' )->name('noticias.create');
Route::post('/noticias', 'App\Http\Controllers\NoticiaController@store' )->name('noticias.store');
Route::get('/noticias/{noticia}', 'App\Http\Controllers\NoticiaController@show' )->name('noticias.show');



//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
