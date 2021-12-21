<?php

namespace App\Models;
use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name', 'p_name','amount','star','message','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveRImage($value,'/profile/');
    }
}
