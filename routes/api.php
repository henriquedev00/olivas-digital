<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/ver-clientes', [ClienteController::class, 'index'])->name('api.cliente.index');
    Route::get('/ver-cliente/{id}', [ClienteController::class, 'show'])->name('api.cliente.show');
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
}); 
