<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditreport extends Model
{
    protected $guarded=['id'];
    public function company()
    {
        return $this->belongsTo('App\CompanyInfo');
    }
}
