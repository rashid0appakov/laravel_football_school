<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'manager_id',
        'area_id',
        'display_main_page',
        'image',
        'title1',
        'textarea1',
        'title2',
        'textarea2',        
        'title3',
        'textarea3',
        'linkYoutube',
        'questions',
        'answer',
        'lat',
        'lng',

    ];
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
    public function manager()
    {
        return $this->belongsTo('App\Models\Manager');
    }

    public function trainers()
    {
        return $this->belongsToMany('App\Models\Trainer', 'club_trainers');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
