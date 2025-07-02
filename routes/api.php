<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameApiController;
use App\Http\Controllers\Api\RunApiController;

Route::get('/games', [GameApiController::class, 'index']);

Route::get('/games.json', [GameApiController::class, 'serve']);

Route::post('/runs', [RunApiController::class, 'store']);
Route::get('/runs', [RunApiController::class, 'index']);

Route::get('/runs/{game_id}', [RunApiController::class, 'byGame']);

