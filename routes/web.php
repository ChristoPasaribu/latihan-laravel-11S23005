<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Jika kamu pakai Breeze, file auth.php disediakan oleh Breeze.
// Pastikan file routes/auth.php ada. Jika tidak, jalankan:
// php artisan breeze:install blade
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    // Dashboard (welcome user + link ke todos)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile (fix missing route error)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Todos (resource-like routes, explicit for clarity)
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

    // Update cover (optional separate endpoint)
    Route::post('/todos/{todo}/cover', [TodoController::class, 'updateCover'])->name('todos.updateCover');
});
