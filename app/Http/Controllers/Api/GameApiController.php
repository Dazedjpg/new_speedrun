<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class GameApiController extends Controller
{
    public function index()
    {
        $jsonPath = public_path('json/games.json');

        if (!file_exists($jsonPath)) {
            return response()->json(['error' => 'Data file not found'], 500);
        }

        $json = file_get_contents($jsonPath);
        $data = json_decode($json, true);

        return response()->json([
        ['game_id' => 1001, 'game_title' => 'Pacman'],
        ['game_id' => 1002, 'game_title' => 'Tetris'],
        ]);


    }
}   