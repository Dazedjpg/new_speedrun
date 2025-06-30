<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameWebController extends Controller
{
    public function index()
    {
        $games = Game::paginate(12);
        return view('games.index', compact('games'));
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }
}
