<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PinUsed extends Model
{
    protected $fillable = [
        'pin_id','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function pin()
    {
        return $this->belongsTo('App\Models\Pin','pin_id');
    }
}
