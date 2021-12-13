<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $casts = [
        'birthday'  => 'datetime'
    ];
    protected $fillable = [
        'id',
        'name',
        'patronymic',
        'surname',
        'workout_balance',
        'game_role',
        'level_id',
        'parent_id',
        'birthday',
        'image',
        'club_id',
        'group_id',
        'gender',
        'age'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\ParentChild');
    }

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function spec()
    {
        return $this->belongsTo('App\Models\Spec', 'game_role');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function abonements(){
        return $this->belongsToMany(Aboniment::class);
    }
}
