<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShareholderSearchController extends Controller
{
    public function show()
    {
        return view('shareholder.search');
    }
    public function view($id){
        $shareholder=Shareholder::where('id','=',"$id")->get();
        return view('shareholder.view')->with('shareholder',$shareholder);
        
        
    }
    public function search(Request $request){
        $data=$request->search;
     //$search=DB::table('shareholders')->join('company_infos','shareholders.company_id','=','company_infos.id')->select('shareholders.*','company_infos.*')->where('shareholder_name','like',"$data%")->orwhere('shareholder_address','like',"$data%")->orwhere('shareholder_email','like',"$data%")->orwhere('shareholder_contact','=',"$data")->latest()->paginate(6);
     $search =Shareholder::with(['company'])->where('shareholder_name', 'LIKE', '%'. $request->search .'%')->orwhere('shareholder_address', 'LIKE', $data .'%')->orwhere('shareholder_email', 'LIKE', $data .'%')->orwhere('shareholder_contact', '=', $data)->paginate(6);
       // foreach($shareholders as $shareholder)
     //  {
        //   echo $shareholder->shareholder_name . ' belongs to ' . $shareholder->company->name . ' company' . "<br>";
       //}
      // return 'done';
       //$count=DB::table('shareholders')->join('company_infos','shareholders.company_id','=','company_infos.id')->select('shareholders.*','company_infos.name')->count();
         return view('shareholder.searchresult')->with('search',$search);
    }
 
}
