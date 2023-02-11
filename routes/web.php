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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ruta Actividades
Route::get('/actividades', [App\Http\Controllers\ActividadesController::class, 'index'])->name('index');
//
Route::get('/actividades/crear', [App\Http\Controllers\ActividadesController::class, 'crear'])->name('crear');

Route::get('/actividades/{actividad}/editar', [App\Http\Controllers\ActividadesController::class, 'editar']);

Route::post('/actividades', [App\Http\Controllers\ActividadesController::class, 'enviar'])->name('enviar');

Route::put('/actividades/{actividad}', [App\Http\Controllers\ActividadesController::class, 'actualizar']);

Route::delete('/actividades/{actividad}', [App\Http\Controllers\ActividadesController::class, 'eliminar']);




