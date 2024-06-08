<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'task_id', 'deadline_id', 'data'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function task()
    {
        return $this->belongsTo(Task::class);
    }

    function deadline()
    {
        return $this->belongsTo(Deadline::class);
    }

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

}
