<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name','value'
    ];
    
    public static function fundFee(){
        return (new static)::where('name','Fund Transfer Fee')->first()->value;
    }
}
