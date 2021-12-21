<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    protected $fillable = [
        'sender_id','receiver_id','amount','detail','admin_id'
    ];
    public function sender()
    {
        return $this->belongsTo('App\Models\User','sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\Models\User','receiver_id');
    }
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin','admin_id');
    }
}
