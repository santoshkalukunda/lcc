<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function documents()
    {
        return $this->hasMany('App\Document', 'company_id');
    }
    
    public function shareholder()
    {
        return $this->hasMany('App\Shareholder', 'company_id');
    }
    public function renew(){
        return $this->hasMany('App\Renew', 'company_id');
    }
    public function namechange(){
        return $this->hasMany('App\Namechange', 'company_id');
    }
}
