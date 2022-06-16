<?php

use App\Http\Controllers\Web\TelefoneController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/cadastrar-cliente', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cadastrar-cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/ver-clientes', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/ver-cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/editar-cliente/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/editar-cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/deletar-cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    Route::get('/telefones/{clienteId}', [TelefoneController::class, 'showTelefones'])->name('telefones.index');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Route::fallback(function () {
//     //
// });
