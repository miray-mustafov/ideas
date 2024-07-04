<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');

Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');

