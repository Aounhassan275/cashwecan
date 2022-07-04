<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
    protected $fillable = [
        'name','image','user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/profile/');
    }
}
