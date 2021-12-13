<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'club_id',
        'spec_id',
        'level_id',
        'age_start',
        'age_end',
        'area_on_group',
        'available',
        'individual_training',
    ];

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function spec()
    {
        return $this->belongsTo('App\Models\Spec');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function trainings(){
        return $this->hasMany(Training::class);
    }
    public function abonements(){
        return $this->belongsToMany(Aboniment::class, 'aboniment_groups');
    }
}
