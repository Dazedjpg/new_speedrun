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

        return view('games.show', compact('game'));
    }

}
