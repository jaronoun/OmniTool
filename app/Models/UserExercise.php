<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExercise extends Model
{
    use HasFactory;
    protected $fillable = ['exercise_id','training_id', 'sets'];

    function training()
    {
        return $this->belongsTo(Training::class , 'training_id');
    }

    function exercise()
    {
        return $this->hasOne(Exercise::class, 'id', 'exercise_id');
    }

    function exerciseExecuted()
    {
        return $this->hasMany(ExerciseExecuted::class, 'user_exercise_id');
    }

    protected function sets(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

}