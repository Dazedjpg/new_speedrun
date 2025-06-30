<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameWebController;
use App\Http\Controllers\Api\GameApiController;

Route::get('/', function () {
    return view('home');
});
Route::get('/games', [GameWebController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameWebController::class, 'show'])->name('games.show');

Route::get('/games', [GameApiController::class, 'index']);
