<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['posts' => \App\Models\Post::with('account')->get()]);
});

// Login Routes
Route::get('/login', [AuthController::class, 'login'])->name('login'); // Show login form
Route::post('/login', [AuthController::class, 'authenticate']); // Handle authentication

// CRUD Post Routes (Only accessible by Author and Admin)
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});

// CRUD Account Routes (Only accessible by Admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('accounts', AccountController::class);
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
