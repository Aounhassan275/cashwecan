<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageHistory extends Model
{
    protected $fillable = [
        'package_id','user_id','deposit_id'
    ];
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function deposit()
    {
        return $this->belongsTo('App\Models\Deposit');
    }
}
