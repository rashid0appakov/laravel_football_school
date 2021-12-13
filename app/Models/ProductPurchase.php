<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_id',
      'parent_id',
      'uuid',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\ParentChild');
    }
}
