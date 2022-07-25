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
    public static function productFee(){
        return (new static)::where('name','Product Fee')->first()->value;
    }
    public static function siteName(){
        return (new static)::where('name','Site Name')->first()->value;
    }
    public static function siteEmail(){
        return (new static)::where('name','Site Email Slug')->first()->value;
    }
    public static function facebook(){
        return (new static)::where('name','Facebook')->first()->value;
    }
    public static function twitter(){
        return (new static)::where('name','Twitter')->first()->value;
    }
    public static function linkedin(){
        return (new static)::where('name','Linkedin')->first()->value;
    }
    public static function youtube(){
        return (new static)::where('name','Youtube')->first()->value;
    }
    public static function instagram(){
        return (new static)::where('name','Instagram')->first()->value;
    }
    public static function companyReferralLink(){
        return (new static)::where('name','Company Referral Link')->first()->value;
    }
}
