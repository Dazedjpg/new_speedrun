<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'user_id',
        'category_id',
        'time_in_second',
        'video_url',
        'status',
        'submitted_at',
        'reviewed_by',
    ];
}

