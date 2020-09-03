<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class CompanyInfo extends Model
{
    protected $guarded = ['id'];

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
    public function renew()
    {
        return $this->hasMany('App\Renew', 'company_id');
    }
    public function namechange()
    {
        return $this->hasMany('App\Namechange', 'company_id');
    }
    public function documentreport()
    {
        return $this->hasOne('App\Documentreport', 'company_id');
    }
    public function renewreport()
    {
        return $this->hasOne('App\Renewreport', 'company_id') /* ->withDefault(
            [
                'renewreport_fiscal' => null,
                'renewreport_comments' => null,
                'renew_id' => null,
            ]
        )*/;
    }
    public function audit()
    {
        return $this->hasMany('App\Audit', 'company_id');
    }
    public function auditreport()
    {
        return $this->hasOne('App\Auditreport', 'company_id');
    }
}
