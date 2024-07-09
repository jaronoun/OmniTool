<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'user_id', 'type', 'is_done', 'periodic'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    protected function periodic(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
