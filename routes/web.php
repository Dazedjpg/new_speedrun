<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameWebController;
use App\Http\Controllers\AuthController;

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('home');
});

Route::get('/games', [GameWebController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameWebController::class, 'show'])->name('games.show');
