<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'deadline',
        'description',
        'status_id',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function manager()
    {
        return $this->belongsTo('App\Models\Manager');
    }
}
