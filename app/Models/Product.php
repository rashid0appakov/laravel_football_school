<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group_product_id',
        'price',
        'cost_price',
        'description',
        'image',
        'uuid',
    ];

    public function group_product()
    {
        return $this->belongsTo('App\Models\GroupProduct');
    }
}
