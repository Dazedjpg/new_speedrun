<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameApiController;
use App\Http\Controllers\Api\RunApiController;

Route::get('/games', [GameApiController::class, 'index']);

Route::get('/runs/{game_id}', [RunApiController::class, 'byGame']);
