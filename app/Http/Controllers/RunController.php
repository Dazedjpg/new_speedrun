<?php

namespace App\Http\Controllers;

use App\Models\Run;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RunController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'game_id' => 'required|integer',
            'category_id' => 'required|integer',
            'time_in_second' => 'required|integer',
            'video_url' => 'required|string',
            'status' => 'required|string',
            'submitted_at' => 'required|date',
            'reviewed_by' => 'required|integer',
        ]);

        $run = Run::create($validated);

        // Call this function to update the JSON file
        $this->updateJsonFromDatabase();

        return response()->json([
            'message' => 'Run stored and JSON updated!',
            'data' => $run
        ]);
    }

    // This is the JSON sync logic
    protected function updateJsonFromDatabase()
    {
        $runs = Run::all();

        $data = [
            'runs' => $runs->toArray()
        ];

        Storage::disk('public')->put('json/runs.json', json_encode($data, JSON_PRETTY_PRINT));
    }
}