<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Home Route
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Public Subject Routes
Route::get('/subjects', [SubjectController::class, 'index'])
    ->name('subjects.index');

// Protected Subject Routes
Route::middleware('auth')->group(function () {

    Route::get('/subjects/create', [SubjectController::class, 'create'])
        ->name('subjects.create');

    Route::post('/subjects', [SubjectController::class, 'store'])
        ->name('subjects.store');

    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])
        ->name('subjects.edit');

    Route::put('/subjects/{subject}', [SubjectController::class, 'update'])
        ->name('subjects.update');

    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])
        ->name('subjects.destroy');

});

// Public Show Route (keep after create)
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])
    ->name('subjects.show');

// Registration Routes
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Login and Logout Routes
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');
