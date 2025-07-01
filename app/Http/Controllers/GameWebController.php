<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameWebController extends Controller
{
    public function index()
    {
        $jsonPath = public_path('json/games.json');

        if (!file_exists($jsonPath)) {
            abort(500, 'Data file not found');
        }

        $json = file_get_contents($jsonPath);
        $data = json_decode($json, true);

        $games = $data['games'] ?? []; // amanin kalau kosong

        return view('games', compact('games'));
    }

    public function show($id)
    {
        $jsonPath = public_path('json/games.json');

        if (!file_exists($jsonPath)) {
            abort(500, 'Data file not found');
        }

        $json = file_get_contents($jsonPath);
        $data = json_decode($json, true);

        $game = collect($data['games'])->firstWhere('game_id', (int)$id);

        if (!$game) {
            abort(404, 'Game not found');
        }

        // Manual mapping warna per game
        $styles = [
            1001 => ['bg' => 'bg-yellow-700', 'nav' => 'bg-yellow-900'], // Pacman
            1002 => ['bg' => 'bg-blue-800',   'nav' => 'bg-blue-900'],   // Tetris
            1003 => ['bg' => 'bg-amber-900',  'nav' => 'bg-yellow-950'],    // Donkey Kong
            1004 => ['bg' => 'bg-red-800',  'nav' => 'bg-red-900'],  // Mario 64
        ];

        $style = $styles[$game['game_id']] ?? ['bg' => 'bg-black', 'nav' => 'bg-maroon'];

        return view('games.show', compact('game', 'style'));
    }


}
