<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RunApiController extends Controller
{
    public function byGame($game_id)
    {
        $jsonPath = public_path('json/games.json'); // atau json/runs.json jika kamu pisahkan

        if (!file_exists($jsonPath)) {
            return response()->json(['error' => 'File not found'], 500);
        }

        $json = file_get_contents($jsonPath);
        $data = json_decode($json, true);

        $runs = collect($data['runs'] ?? [])->where('game_id', (int)$game_id)->values();

        return response()->json($runs);
    }
}
