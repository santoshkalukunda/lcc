<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renewreport extends Model
{
    protected $guarded=['id'];
    public function company()
    {
        return $this->belongsTo('App\CompanyInfo');
    }
    
}
