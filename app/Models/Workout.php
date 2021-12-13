<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $table = "abonement_workouts";

    protected $fillable = [
        'id',
        'abonement_id',
        'number_workouts',
        'price_workouts',
        'number_freezing',
    ];

//    public function ab_groups()
//    {
//        return $this->belongsToMany('App\Models\Group', 'aboniment_groups');
//    }
}
