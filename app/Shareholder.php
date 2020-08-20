<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    protected $guarded=['id'];

    /**
     * Get the Company the shareholder belongs to
     * 
     * @return relationship
     */
    public function company()
    {
        return $this->belongsTo('App\CompanyInfo');
    }
    
}
