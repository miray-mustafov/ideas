<?php

/*
MVC - Model View Controller
Controller : Handle requests
Controller : Handle data logic and interactions with database
View : what is shown to the user (HTML/CSS/BladeFiles)
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Whenever you get a request to this url pass it to index method controller
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');

Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

// - comments
Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');

// - users
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);


Route::get('/terms', function () {
    return view('terms');
});
