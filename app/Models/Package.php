<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','price','direct_income','direct_team_income','upline_income','down_line_income',
        'upline_placement_income','down_line_placement_income','trade_income',
        'company_income','max_limit','min_limit','image','withdraw_limit','fund_limit','product_limit'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
}
