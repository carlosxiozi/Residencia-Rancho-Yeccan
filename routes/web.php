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
    return view('principal');
});
Route::get('/tareas', 'EventosController@tareas_Trabajador');

Route::get('/pdf/{id}','AnimalesController@PDF');

Route::get("control_productivo/{id}", 'Control_productivoController@create');
Route::resource('controles_reproductivos','Control_reproductivoController');
Route::resource('animales','AnimalesController');
Route::resource('eventos','EventosController');
Route::resource('controles_productivos','Control_productivoController');

