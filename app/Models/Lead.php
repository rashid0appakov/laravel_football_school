<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name', 'phone',
        'lead_type_id', 'lead_status_id',
        'email', 'channel_id', 'entry_point_id',
        'executor', 'manager_id', 'club_id',
        'tel',
        'own',
        'ch',
        'url',
        'pl',
        ];


    public function temp_user(){
        return $this->hasOne(TempUser::class);
    }
    public function status(){
        return $this->belongsTo(LeadStatus::class, 'lead_status_id');
    }

    public function manager(){
        return $this->belongsTo(Manager::class);
    }

    public function club(){
        return $this->belongsTo(Club::class);
    }

    public function channel(){
        return $this->belongsTo(Channel::class);
    }

    public function lead_type(){
        return $this->belongsTo(LeadType::class);
    }

    public function entry_point(){
        return $this->belongsTo(EntryPoint::class);
    }
}
