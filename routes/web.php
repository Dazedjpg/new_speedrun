<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RunController;
use App\Http\Controllers\GameController;

// Halaman Utama (Home)
Route::get('/', [RunController::class, 'index'])->name('home');

// Halaman Detail Game berdasarkan slug
Route::get('/games/{slug}', [GameController::class, 'show'])->name('games.show');
