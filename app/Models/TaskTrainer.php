<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTrainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'title',
        'deadline',
        'description',
        'status_id',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }
}
