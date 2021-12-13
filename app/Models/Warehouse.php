<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'count',
        'price_one',
        'manufacturer',
        'comment',
        'color',
        'link',
        'full_price',
        'club_id'
    ];

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }
}
