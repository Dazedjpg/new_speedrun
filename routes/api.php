<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameApiController;

Route::get('/games', [GameApiController::class, 'index']);
