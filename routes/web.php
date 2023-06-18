<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\AsignaturaController;
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

Route::get('/index', function () {
    return view('index');
});

//Ruta para ver la tabla de asignaturas
Route::get('/asignaturas', [AsignaturaController::class,'index'])->name('Asignaturas');

//Ruta para dirigirse a la pestaña de creacion de asignaturas
Route::get('/asignaturas/create', [AsignaturaController::class,'create']);

//Crear nueva asignatura
Route::post('/asignaturas/storeAsignatura', [AsignaturaController::class, 'store'])->name('createAsignatura');

Route::get('/libros', [LibroController::class,'index']);