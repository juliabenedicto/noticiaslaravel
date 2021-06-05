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

Route::get('/noticias', 'App\Http\Controllers\NoticiaController@index')->name('noticias.index');
Route::get('/noticias/create', 'App\Http\Controllers\NoticiaController@create' )->name('noticias.create');
Route::post('/noticias', 'App\Http\Controllers\NoticiaController@store' )->name('noticias.store');



//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
