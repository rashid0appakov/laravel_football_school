<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    protected $fillable = ['name', 'lead_id', 'training_id'];
    public function training(){
        return $this->belongsTo(Training::class);
    }
    public function lead(){
        return $this->belongsTo(Lead::class);
    }
}
