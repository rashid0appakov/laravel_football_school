<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadComment extends Model
{
    use HasFactory;

    protected $table = "lead_comments";

    protected $fillable = [
        'lead_id',
        'comment'
    ];
}
