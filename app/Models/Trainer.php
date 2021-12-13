<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'surname',
        'patronymic',
        'gender',
        'birthday',
        'show_on_main',
        'image',
        'phone',
        'address',
        'facebook',
        'vk',
        'instagram',
        'education',
        'license',
        'clothing_size',
        'experience',
        'family_status',
        'children',
        'career',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function availableDay()
    {
        return $this->belongsToMany('App\Models\AvailableDay', "available_day_trainers");
    }
    public function trainings(){
        return $this->hasMany(Training::class);
    }
}
