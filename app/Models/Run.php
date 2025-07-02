<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    protected $fillable = [
    'user_id',
    'game_id',
    'category_id',
    'time_in_second',
    'video_url',
    'status',
    'submitted_at',
    'reviewed_by'
    ];

}
