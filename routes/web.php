<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ejercicio\EjercicioController;
use App\Http\Controllers\RutinaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('ejercicio',EjercicioController::class);
Route::get('/ejercicio', [EjercicioController::class, 'index'])->name('ejercicio.index');
Route::post('/ejercicio', [EjercicioController::class, 'store'])->name('ejercicio.store');
Route::get('/ejercicio/eliminar/{id}',[EjercicioController::class, 'destroy'])->name('ejercicio.destroy');
Route::get('/ejercicio/editar/{id}',[EjercicioController::class, 'edit'])->name('ejercicio.edit');
Route::post('/ejercicio/actualizar',[EjercicioController::class, 'update'])->name('ejercicio.update');

Route::get('/rutina', [RutinaController::class, 'index'])->name('rutina.index');


