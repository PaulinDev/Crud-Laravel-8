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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [CarrosController::class, 'index'])->name('car.get.view');
    Route::get('/get/{id}', [CarrosController::class, 'get'])->name('car.get.model');
    Route::get('/new/', function () {
        return view('car.car-new', ['usuarios' => user::all()]);
    })->name('car.new.view');
    Route::get('/edit/{id}', function ($id) {
        return view('car.car-edit', ['carro' => carro::with('relcarros')->find($id), 'usuarios' => user::all()]);
    })->name('car.edit.view');
    Route::put('/new', [CarrosController::class, 'new'])->name('car.new.model');
    Route::post('/edit/{id}', [CarrosController::class, 'edit'])->name('car.edit.model');
    Route::get('/delete/{id}', [CarrosController::class, 'delete'])->name('car.delete.model');
});

