<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyUserCount extends Model
{
    protected $table = 'daily_user_counts';

    protected $fillable = [
        'date',
        'count',
    ];
}
