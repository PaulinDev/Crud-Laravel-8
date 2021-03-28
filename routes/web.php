<?php

use App\Http\Controllers\CarrosController;
use App\Models\Carro;
use App\Models\User;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [CarrosController::class, 'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/ver/{id}', [CarrosController::class, 'visualizar'])->name('visualizar');
Route::middleware(['auth:sanctum', 'verified'])->get('/criar/', function () {
    return view('editar-criar', ['usuarios' => user::all()]);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/editar/{id}', function ($id) {
    return view('editar-criar', ['carro' => carro::with('relcarros')->find($id)]);
})->name('editar');

Route::middleware(['auth:sanctum', 'verified'])->put('/cria', [CarrosController::class, 'criar'])->name('cria');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit/{id}', [CarrosController::class, 'editar'])->name('edit');
Route::middleware(['auth:sanctum', 'verified'])->get('/deletar/{id}', [CarrosController::class, 'deletar'])->name('deletar');
