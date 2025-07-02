<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('runs', function (Blueprint $table) {
            // database/migrations/xxxx_create_runs_table.php
            $table->id('run_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('game_id');
            $table->integer('time_in_second');
            $table->string('video_url');
            $table->string('status');
            $table->date('submitted_at');
            $table->unsignedBigInteger('reviewed_by');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runs');
    }
};
