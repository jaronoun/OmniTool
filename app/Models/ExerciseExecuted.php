<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseExecuted extends Model
{
    use HasFactory;
    protected $table = 'exercise_executed';
    protected $fillable = ['user_id', 'user_exercise_id', 'exercise_id', 'sets'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function userExcercise()
    {
        return $this->belongsTo(UserExercise::class);
    }

    function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    protected function sets(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}

