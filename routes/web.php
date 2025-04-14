<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Route for displaying all tasks, using GET request named tasks.index
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

//Route for creating a new task, using POST request named tasks.store
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

//Route for updating an existing task, using PUT request named tasks.update
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

//Route for deleting a task, using DELETE request named tasks.delete
Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');