<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/subjects', [SubjectController::class, 'index'])
    ->name('subjects.index');

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

Route::get('/subjects/{subject}', [SubjectController::class, 'show'])
    ->name('subjects.show');
