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

        return response()->json($data);
    }

}
