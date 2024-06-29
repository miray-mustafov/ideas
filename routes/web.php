<?php
/*
MVC - Model View Controller
Controller : Handle requests
Controller : Handle data logic and interactions with database
View : what is shown to the user (HTML/CSS/BladeFiles)
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/profile', function () {
    return view('users.profile');
});
