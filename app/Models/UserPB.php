<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPB extends Model
{
    use HasFactory;
    protected $table = 'user_pb';
    protected $fillable = [
        'user_id',
        'exercise_id',
        'weight',
        'reps',
        'time',
    ];
}
