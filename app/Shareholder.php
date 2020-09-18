<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shareholder extends Model
{
    use Notifiable;
    protected $guarded = ['id'];

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
