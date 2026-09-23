<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');

Route::post('/tasks/update', [TaskController::class, 'update'])->name('tasks.update');

Route::post('/tasks/delete', [TaskController::class, 'destroy']);

Route::get('/tasks/show/{id}', [TaskController::class, 'show'])->name('tasks.show');

Route::get('/tasks/date/{fecha}', [TaskController::class, 'date']);

Route::get('/tasks/dates', [TaskController::class, 'dates']);