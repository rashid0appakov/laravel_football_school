<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentChild extends Model
{
    use HasFactory;

    protected $table = 'parent_children';

    protected $fillable = [
        'user_id',
        'phone',
        'channel_id',
        'lead_type_id',
        'entry_point_id',
        'who_create',
        'offer',
        'address',
        'request',
        'comment',
        'refusal_reason',
        'lead_status_id',
        'whatsapp',
        'telegram',
        'start_date',
        'next_day_time_call',
        'patronymic',
        'surname',
        'tel',
        'own',
        'ch',
        'url',
        'pl',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status(){
        return $this->belongsTo(LeadStatus::class, 'lead_status_id');
    }

    public function channel(){
        return $this->belongsTo(Channel::class);
    }

    public function lead_type(){
        return $this->belongsTo(LeadType::class, 'lead_type_id');
    }

    public function entry_point(){
        return $this->belongsTo(EntryPoint::class, 'entry_point_id');
    }

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function manager()
    {
        return $this->belongsTo('App\Models\Manager', 'who_create');
    }

    public function children()
    {
        return $this->belongsToMany('App\Models\Child');
    }
}
