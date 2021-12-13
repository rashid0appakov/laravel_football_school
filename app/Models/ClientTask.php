<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'status_id',
        'deadline',
        'description',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\ParentChild', 'parent_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\TaskTag', 'tag_in_tasks', 'task_id', 'tag_id');
    }

    public function tag_in_task()
    {
        return $this->hasOne('App\Models\TagInTask', 'task_id');
    }
}
