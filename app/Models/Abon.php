<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abon extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'name',
        'secondName',
        'number',
        'email'
    ];
}

