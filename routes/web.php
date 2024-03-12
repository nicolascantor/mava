<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegimenSimplificadoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ElementoController;
use App\Http\Controllers\pedidosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    Route::get('/elementos', [ElementoController::class, 'index'])->name('elementos');
    Route::get('/elemento/{id}/edit', [ElementoController::class, 'edit']);
    Route::put('/elemento/{id}/update', [ElementoController::class, 'update']);

    Route::get('/elementos-masivo', [ElementoController::class, 'create_masivo'])->name('elementos-masivo');
    Route::post('/cargue-masivo', [ElementoController::class, 'store_masivo'])->name('cargue-masivo');

    //rutas para la creacion de pedidos
    Route::get('pedidos', [pedidosController::class, 'index'])->name('pedidos');
    Route::get('create-order', [pedidosController::class, 'create'])->name('create-order');

    //rutas para la creacion de usuarios
    Route::get('users', [RegisteredUserController::class, 'index'])
    ->name('users');
    Route::get('user/{id}/edit', [ProfileController::class, 'editar'])
    ->name('editar');
    Route::put('user/{id}/actualizar', [ProfileController::class, 'actualizar'])
    ->name('actualizar');
});



require __DIR__.'/auth.php';
