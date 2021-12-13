<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableDayTrainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'trainer_id',
        'available_day_id',
    ];

    public function trainer()
    {
        return $this->belongsTo('App\Models\Trainer');
    }

    public function available_day()
    {
        return $this->belongsTo('App\Models\AvailableDay');
    }
}
