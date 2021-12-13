<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadNew extends Model
{
    use HasFactory;

    protected $fillable = [
      'name1',
      'phone1',
      'name2',
      'phone2',
      'email',
      'status_id',
      'club_id',
      'manager_id',
      'child_name',
      'birthday',
      'level_id',
      'request_id',
      'request_text',
      'offer_id',
      'offer_text',
      'tel',
      'own',
      'ch',
      'url',
      'pl',
    ];

    public function status(){
        return $this->belongsTo(LeadStatus::class, 'status_id');
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function comments(){
        return $this->hasMany(LeadComment::class, 'lead_id');
    }

    public function manager(){
        return $this->belongsTo(Manager::class);
    }

    public function request(){
        return $this->belongsTo(RequestDictionary::class);
    }

    public function offer(){
        return $this->belongsTo(OfferDictionary::class);
    }

    public function club(){
        return $this->belongsTo(Club::class);
    }
}
