<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RunApiController extends Controller
{
    protected $jsonPath;

    public function __construct()
    {
        $this->jsonPath = storage_path('app/public/json/runs.json');

    }

    public function index()
    {
        if (!file_exists($this->jsonPath)) {
            return response()->json(['runs' => []]);
        }

        $json = file_get_contents($this->jsonPath);
        $data = json_decode($json, true);
        return response()->json($data['runs'] ?? []);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'run_id' => 'required|integer',
            'game_id' => 'required|integer',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'time_in_second' => 'required|integer',
            'video_url' => 'required|string',
            'status' => 'required|string',
            'submitted_at' => 'required|date',
            'reviewed_by' => 'required|integer',
        ]);

        // Load existing data
        $runs = [];
        if (file_exists($this->jsonPath)) {
            $json = file_get_contents($this->jsonPath);
            $runs = json_decode($json, true);
        }

        // Append new run
        $runs['runs'][] = $validated;

        // Save updated data
        file_put_contents($this->jsonPath, json_encode($runs, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Run saved successfully', 'run' => $validated], 201);
    }
}
