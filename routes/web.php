<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameWebController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // arahkan kembali ke homepage 
    })->name('logout');
    



Route::get('/', function () {
    return view('home');
});

Route::get('/games', [GameWebController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameWebController::class, 'show'])->name('games.show');

use Illuminate\Support\Facades\DB;

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Connected to DB: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return '❌ Connection failed: ' . $e->getMessage();
    }
});


use App\Http\Controllers\RunController;

Route::get('/runs/create', [RunController::class, 'create']);
Route::post('/runs', [RunController::class, 'store'])->name('runs.store');


Route::get('/runs.json', function () {
    return response()->file(storage_path('app/public/json/runs.json'), [
        'Content-Type' => 'application/json'
    ]);
});


Route::get('/games.json', function () {
    return response()->file(storage_path('app/public/json/games.json'), [
        'Content-Type' => 'application/json'
    ]);
});

Route::get('/update-games-json', [GameWebController::class, 'updateGamesJsonFromDatabase']);

