<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'description',
        'image',
        'size',
        'coating',
        'capacity',
        'rent_price',
        'manager_id',
        'phone'
    ];

    public function manager()
    {
        return $this->belongsTo('App\Models\Manager');
    }
}
