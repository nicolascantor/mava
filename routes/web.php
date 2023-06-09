<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegimenSimplificadoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ElementoController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rutas para la creacion de sedes
Route::get('create-sede', [SedeController::class, 'create'])->name('create-sede');
Route::post('create-sede', [SedeController::class, 'store']);
Route::get('sedes', [SedeController::class, 'index'])->name('sedes');
Route::get('sedes/{id}/edit', [SedeController::class, 'edit']);
Route::put('sedes/{id}/update', [SedeController::class, 'update']);

//rutas para la creacion de remigenes simlificados
Route::get('/create-regimensimplificado', [RegimenSimplificadoController::class, 'create'])->name('create-regimensimplificado');
Route::post('create-regimensimplificado', [RegimenSimplificadoController::class, 'store']);
Route::get('regimensimplificado', [RegimenSimplificadoController::class, 'index'])->name('regimensimplificado');
Route::get('regimensimplificado/{id}/edit', [RegimenSimplificadoController::class, 'edit']);
Route::put('regimensimplificado/{id}/update', [RegimenSimplificadoController::class, 'update']);

//rutas para la creacion de elementos
Route::get('/create-element', [ElementoController::class, 'create'])->name('create-element');
Route::post('create-element', [ElementoController::class, 'store']);
Route::get('elements', [ElementoController::class, 'index']);

require __DIR__.'/auth.php';
