<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GameWebController extends Controller
{
    protected function updateGamesJsonFromDatabase()
        {
        $games = Game::all();

        $data = [
            'games' => $games->toArray()
        ];

        Storage::disk('public')->put('json/games.json', json_encode($data, JSON_PRETTY_PRINT));
        }


    public function index()
    {
        $jsonPath = public_path('app/public/json/games.json');

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
        $jsonPath = public_path('app/public/json/games.json');
        $runsPath = public_path('app/public/json/runs.json');

        if (!file_exists($jsonPath) || !file_exists($runsPath)) {
            abort(500, 'Data file not found');
        }

        $gamesData = json_decode(file_get_contents($jsonPath), true);
        $runsData = json_decode(file_get_contents($runsPath), true);

        $game = collect($gamesData['games'])->firstWhere('game_id', (int)$id);
        if (!$game) {
            abort(404, 'Game not found');
        }
        // Add after fetching $game
        // $categories = $data['categories'] ?? [];
        // $versions = collect($data['game_versions'] ?? [])
        //             ->where('game_id', $game['game_id'])
        //             ->values();


        // Filter runs untuk game ini
        $runs = collect($runsData['runs'])->where('game_id', (int)$id)->values();

        // Filter versi game untuk game ini
        $versions = collect($gamesData['game_versions'] ?? [])->where('game_id', (int)$id)->values();

        // Styling per game
        $style = match($game['game_title']){
        'Donkey Kong' => ['bg' => 'bg-amber-900',  'nav' => 'bg-yellow-950'],
        'Pacman' => ['bg' => 'bg-yellow-600', 'nav' => 'bg-yellow-700'],
        'Tetris' => ['bg' => 'bg-blue-900', 'nav' => 'bg-blue-800'],
        'Mario 64' => ['bg' => 'bg-red-800', 'nav' => 'bg-red-900'],
        default => ['bg' => 'bg-gray-900', 'nav' => 'bg-gray-800']        
        };

        
        return view('games.show', compact('game', 'style', 'categories', 'runs', 'versions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_title' => 'required|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        Game::create($validated);

        $this->updateGamesJsonFromDatabase();

        return redirect()->route('games.index')->with('success', 'Game created and JSON updated!');
    }


}
