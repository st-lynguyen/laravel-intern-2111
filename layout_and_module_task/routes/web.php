<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('admin', function () {
    return view('admin.layout');
});

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('', [TaskController::class, 'store'])->name('store');
    Route::get('/{id}', [TaskController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('destroy');
});

Route::get('/practice', [TaskController::class, 'practice']);
