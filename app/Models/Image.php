<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
class Image extends Model
{
    protected $fillable = ['src'];

    public function imageable(){
    	return $this->morphTo();
    }
    public function delete(){
    	Storage::delete($this->src);
    	parent::delete();
    }
}
