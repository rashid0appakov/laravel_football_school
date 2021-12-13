<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['date', 'start', 'end', 'group_id', 'club_id', 'trainer_id', 'text', 'video', 'closed', 'conspect', 'stavka1', 'stavka2', 'report'];
    protected $casts = [
        'date' => 'date:Y-m-d'
    ];
    public function children(){
        return $this->belongsToMany(Child::class, 'children_training', 'id', 'children_id')->withPivot('was');
    }
    public function trainer(){
        return $this->belongsTo(Trainer::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function temp_users(){
        return $this->hasMany(TempUser::class);
    }
}
