<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class RunController extends Controller
{
    public function index()
    {
        $games = [];

        if (Storage::exists('json/games.json')) {
            $json = Storage::get('json/games.json');
            $games = json_decode($json, true);
        }

        return view('home', compact('games'));
    }
}
