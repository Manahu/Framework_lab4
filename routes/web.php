<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('tasks', TaskController::class);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


