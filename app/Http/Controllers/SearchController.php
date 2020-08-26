<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Namechange;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $data=$request->search;
        
            $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->orWhere('category','like',"$data%")->latest()->paginate(6);
            return view('company.search')->with('search',$search);
        
    }
    
        public function changename(Request $request){
         $name=$request->name;
         $status=$request->status;
        if($request->operation!=null and $request->days!=null){
            $date=date_create(date('Y-m-d'));
            date_add($date,date_interval_create_from_date_string("-$request->days days"));
            $ago=date_format($date,"Y-m-d");
            $search =Namechange::where('new_name', 'like', "$name%")->Where('status', 'like', "$status%")->where('change_date',"$request->operation","$ago")->orderBy('change_date')->paginate(10);
            return view('report.namechange')->with('namechange',$search);
        }
        
          
          
        
         $search =Namechange::where('new_name', 'like', "$name%")->Where('status', 'like', "$status%")->orderBy('change_date')->paginate(10);
         return view('report.namechange')->with('namechange',$search);
        }
    
     function dash(){
         return view('dashboard');
     }
  
}
