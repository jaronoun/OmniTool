<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = 'training';
    protected $fillable = ['name', 'description', 'schedule_id'];

    function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
