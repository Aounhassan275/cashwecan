<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id','price','address','user_id','status','owner_id','image'
    ];
    
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/profile/');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
