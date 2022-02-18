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

Route::get('/login',function(){
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login','autenticarController@login');
Route::get('/', function () {
    return view('principal');
})->middleware('auth');
Route::get('/encender', function() {
    
    try {
       
        Artisan::call('websockets:serve --port=6002');
        
      } catch (Exception $e) {
        echo 'Error';
        die();
      }
       
    
    
    return 'Done';
});

Route::get('/cambio','AnimalesController@cambio');
Route::get('/salir','autenticarController@salir');
Route::get('/tareas', 'EventosController@tareas_Trabajador')->middleware('auth');

Route::get('/pdf/{id}','AnimalesController@PDF');
Route::get('/notas','EventosController@notas');
Route::get('/calendar','EventosController@calendar');
Route::resource('evidencias','EvidenciaController')->middleware('auth');
Route::get("control_productivo/{id}", 'Control_productivoController@create')->middleware('auth');
Route::resource('controles_reproductivos','Control_reproductivoController')->middleware('auth');
Route::resource('animales','AnimalesController')->middleware('auth');
Route::resource('eventos','EventosController')->middleware('auth');
Route::resource('controles_productivos','Control_productivoController')->middleware('auth');
Route::resource('usuarios','trabajadoresController')->middleware('auth');

