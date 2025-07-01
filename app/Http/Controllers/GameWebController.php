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
        $runsPath = public_path('json/runs.json');

        if (!file_exists($jsonPath) || !file_exists($runsPath)) {
            abort(500, 'Data file not found');
        }

        $gamesData = json_decode(file_get_contents($jsonPath), true);
        $runsData = json_decode(file_get_contents($runsPath), true);

        $game = collect($gamesData['games'])->firstWhere('game_id', (int)$id);
        if (!$game) {
            abort(404, 'Game not found');
        }

        // Filter runs for this game
        $runs = collect($runsData['runs'])->where('game_id', (int)$id)->values();

        // Styling per game
        $style = match($game['game_title']) {
            'Donkey Kong' => ['bg' => 'bg-yellow-800', 'nav' => 'bg-yellow-900'],
            'Pacman' => ['bg' => 'bg-yellow-700', 'nav' => 'bg-yellow-800'],
            default => ['bg' => 'bg-gray-900', 'nav' => 'bg-gray-800'],
        };

        return view('games.show', compact('game', 'style', 'runs'));
    }


}
