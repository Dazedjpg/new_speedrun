<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class RunController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            if (!Storage::exists('runs.json')) {
                return response()->json([
                    'error' => 'Runs data file not found'
                ], 404);
            }

            $jsonContent = Storage::get('runs.json');
            $data = json_decode($jsonContent, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json([
                    'error' => 'Invalid JSON format'
                ], 500);
            }

            return response()->json($data);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to load runs data',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $data = $request->all();
            
            Storage::put('runs.json', json_encode($data, JSON_PRETTY_PRINT));
            
            return response()->json([
                'message' => 'Runs data updated successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update runs data',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}