<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'patronymic',
        'image',
        'phone',
        'whatsapp',
        'telegramm',
        'city_number',
        'position_id',
        'club_id',
        'info',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
