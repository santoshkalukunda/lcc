<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $guarded=['id'];
    public function company()
    {
        return $this->belongsTo('App\CompanyInfo');
    }
}
