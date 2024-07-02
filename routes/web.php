<?php

/*
MVC - Model View Controller
Controller : Handle requests
Model : Handle data logic and interactions with database
View : what is shown to the user (HTML/CSS/BladeFiles)
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


//Whenever you get a request to this url pass it to index method controller
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.',], function () {

    Route::post('', [IdeaController::class, 'store'])->name('store');

    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    // ->middleware('auth') ensures that user is logged in for that action
    Route::group(['middleware' => ['auth']], function () { //nested route grouping
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::get('/terms', function () {
    return view('terms');
});
