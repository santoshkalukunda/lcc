<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Mail\CustomMail;
use App\Mail\NameChange;
use App\Mail\NameChangeMail;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManualMailController extends Controller
{
    public function namechangemail(Request $request, $company_id ){
       $data=$request->all();
       $email=Shareholder::where('company_id','=',$company_id)->get(['shareholder_name','shareholder_email']);
       foreach($email as $item){
         $data['name']=$item->shareholder_name;
       Mail::to($item->shareholder_email)
       ->send(new NameChangeMail($data));
       }
       return redirect()->back()->with('success',"Mail Sent");    
      
    }
}
