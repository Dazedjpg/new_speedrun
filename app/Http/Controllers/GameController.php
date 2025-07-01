<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function show($slug)
    {
        $json = Storage::get('json/games.json');
        $games = json_decode($json, true);

        $game = collect($games)->firstWhere('slug', $slug);

        if (!$game) {
            abort(404);
        }

        return view('games', compact('game'));
    }
}
