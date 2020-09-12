<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Mail\CustomMail;
use App\Mail\NameChange;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManualMailController extends Controller
{
    public function sendmanualmail(Request $request, $company_id ){
        $data=$request->all();
        $shareholder=Shareholder::where('company_id','=',$company_id)->get();
        foreach($shareholder as $item){
            $name=Shareholder::where('company_id','=',$company_id)->get();
            Mail::to($item->shareholder_email)
            ->send(new NameChange($name));
            
        }
        return redirect()->back();
    }
}
