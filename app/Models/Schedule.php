<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function training()
    {
        return $this->hasMany(Training::class);
    }

}

