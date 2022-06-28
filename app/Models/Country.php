<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
