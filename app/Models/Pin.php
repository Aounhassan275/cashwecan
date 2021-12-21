<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $fillable = [
        'name','amount','limit','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function pins()
    {
        return $this->hasMany(PinUsed::class,'pin_id');
    }
}
