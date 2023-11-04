<?php

use App\Http\Controllers\DirectorioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/directorio', [DirectorioController::class, 'index'])->name('directorio.inicio');
Route::get('/directorio/crear', [DirectorioController::class, 'create'])->name('directorio.crear');
Route::post('/directorio/insertar', [DirectorioController::class, 'insert'])->name('directorio.insertar');
Route::get('/directorio/buscar', [DirectorioController::class, 'search'])->name('directorio.buscar');
Route::get('/directorio/ver', [DirectorioController::class, 'view'])->name('directorio.ver');
Route::get('/directorio/eliminacion/{id}', [DirectorioController::class, 'deletion'])->name('directorio.eliminacion');
Route::get('/directorio/eliminar/{id}', [DirectorioController::class, 'delete'])->name('directorio.eliminar');
