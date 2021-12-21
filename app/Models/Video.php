<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name','video'
    ];
    public function setVideoAttribute($value){
        if ($value){
            $this->attributes['video'] = FileHelper::save($value,'/video/');
        }
    }
    
    public function getVideoAttribute($value){
        return asset($value);
    }
}
