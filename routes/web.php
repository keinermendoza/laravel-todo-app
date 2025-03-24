<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('todos', [TodoController::class, 'index'])
    ->name('todos.index');
    
    Route::post('todos', [TodoController::class, 'store'])
    ->name('todos.store');
    
    Route::get('todos/{todo}/edit', [TodoController::class, 'edit'])
    ->can('update', 'todo')
    ->name('todos.edit');
    
    Route::patch('todos/{todo}', [TodoController::class, 'update'])
    ->can('update', 'todo')
    ->name('todos.update');
    
    Route::delete('todos/{todo}', [TodoController::class, 'destroy'])
    ->can('delete', 'todo')
    ->name('todos.destroy');
    
    Route::get('users', [UserController::class, 'index'])
    ->can('view_users')
    ->name('users.index');
    
    Route::post('users', [UserController::class, 'store'])
    ->can('create_users')
    ->name('users.store');

    Route::patch('todos/{todo}/toogle-state', [TodoController::class, "toogle"])
    ->can('update', 'todo')
    ->name("todos.toogle");
});

require __DIR__.'/auth.php';
