<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatusHistoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', [TaskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create',[TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks/store',[TaskController::class,'store'])->name('tasks.store');
Route::delete('/tasks/{task}',[TaskController::class,'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit',[TaskController::class,'edit'])->name('tasks.edit');
Route::put('/tasks/{task}',[TaskController::class,'update'])->name('tasks.update');

Route::get('/statuses/{id}',[StatusHistoryController::class,'show'])->name('statusHistory.show');
Route::get('/status/create/{id}',[StatusHistoryController::class,'create'])->name('statusHistory.create');
Route::post('/status/store',[StatusHistoryController::class,'store'])->name('statusHistory.store');


