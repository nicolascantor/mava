<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegimenSimplificadoController;
use App\Http\Controllers\SedeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rutas para la creacion de sedes
Route::get('create-sede', [SedeController::class, 'create'])
->name('create-sede');
Route::post('create-sede', [SedeController::class, 'store']);
Route::get('sedes', [SedeController::class, 'index']);

//rutas para la creacion de remigenes simlificados
Route::get('/create-regimensimplificado', [RegimenSimplificadoController::class, 'create'])
->name('create-regimensimplificado');
Route::post('create-regimensimplificado', [RegimenSimplificadoController::class, 'store']);
Route::get('regimensimplificado', [RegimenSimplificadoController::class, 'index']);

require __DIR__.'/auth.php';
