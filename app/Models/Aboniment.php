<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboniment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'hide_for_new',
    ];

    public function ab_groups()
    {
        return $this->belongsToMany('App\Models\Group', 'aboniment_groups');
    }
    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }
    public function workout(){
        return $this->hasOne(Workout::class, 'abonement_id');
    }
}
