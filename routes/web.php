<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Route for user management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Route for creating a user
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Route to store a new user
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Route for editing a user
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Route to update a user
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Route to delete a user
});
require __DIR__ . '/auth.php';
