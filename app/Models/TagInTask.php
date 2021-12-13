<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagInTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'who',
        'task_id',
        'tag_id',
    ];

}
