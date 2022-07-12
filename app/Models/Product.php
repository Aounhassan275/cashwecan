<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','category_id','brand_id','user_id','price','phone','description','city_id','country_id',
        'display_order','like','dislike','stock'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
