<?php

/*
MVC - Model View Controller
Controller : Handle requests
Controller : Handle data logic and interactions with database
View : what is shown to the user (HTML/CSS/BladeFiles)
*/

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Whenever you get a request to this url pass it to index method controller
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');

Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

Route::get('/terms', function(){
    return view('terms');
});
