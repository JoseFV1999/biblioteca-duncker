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

//
// RUTAS PARA ASIGNATURAS
//

//Ruta para ver la tabla de Asignaturas
Route::get('/asignaturas', [AsignaturaController::class,'index'])->name('Asignaturas');

//Ruta para dirigirse a la pestaña de creacion de asignaturas
Route::get('/asignaturas/create', [AsignaturaController::class,'create'])->name('viewCreateAsignatura');

//Crear nueva Asignatura
Route::post('/asignaturas/storeAsignatura', [AsignaturaController::class, 'store'])->name('createAsignatura');

//Ruta para dirigirse a la vista de la Asignatura seleccionada
Route::get('/asignaturas/{asignatura_id}', [AsignaturaController::class, 'view'])->name('viewEditAsignatura');

//Actualozar Asignatura
Route::post('/asignaturas/updateAsignatura', [AsignaturaController::class, 'update'])->name('updateAsignatura');

//
// RUTAS PARA LIBROS
//

//Ruta para ver la tabla de Libros
Route::get('/libros', [LibroController::class,'index'])->name('Libros');

//Ruta para dirigirse a la pestaña de creacion de asignaturas
Route::get('/libros/create', [LibroController::class,'create'])->name('viewCreateLibro');

//Crear nuevo Libro
Route::post('/libros/storeLibro', [LibroController::class, 'store'])->name('createLibro');