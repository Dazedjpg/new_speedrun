<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Run;

class ExportRunsJson extends Command
{
    protected $signature = 'runs:export-json';
    protected $description = 'Export all run data to runs.json file';

    public function handle()
    {
        $runs = Run::all();

        $data = [
            'runs' => $runs->toArray()
        ];

        Storage::disk('public')->put('json/runs.json', json_encode($data, JSON_PRETTY_PRINT));

        $this->info('runs.json berhasil diperbarui!');
    }
}
