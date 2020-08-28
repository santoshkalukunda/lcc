<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Documentreport;
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
    function searchlist(Request $request)
    {
        $data=$request->search;
            $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->orWhere('category','like',"$data%")->latest()->paginate(6);
            return view('company.index')->with('company_data', $search);
            //return view('company.search')->with('search',$search);
        
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
         $search =Namechange::where('new_name', 'like', "$name%")->Where('status', 'like', "$status%")->orderBy('change_date','desc')->paginate(10);
         return view('report.namechange')->with('namechange',$search);
        }

        public function documentreport(Request $request){
        
            $name=$request->name;
            $status=$request->status;
           if($request->operation!=null and $request->days!=null){
               $date=date_create($request->current_date);
               date_add($date,date_interval_create_from_date_string("-$request->days days"));
               $ago=date_format($date,"Y-m-d");
           $documentreport=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.*')->Where('documentreports.status', 'like', "$status%")->where('company_infos.name','like',"$request->name%")->where('company_infos.reg_date',"$request->operation","$ago")->orderBy('company_infos.reg_date')->paginate(6);    
           // $documentreport=Documentreport::Where('status', 'like', "$status%")->paginate(10);
                 return view('report.document')->with('documentreport',$documentreport)->with('current_date',$request->current_date);
           }else{
            $documentreport=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.*')->Where('documentreports.status', 'like', "$status%")->where('company_infos.name','like',"$request->name%")->orderBy('company_infos.reg_date')->paginate(6);
            //$documentreport=Documentreport::with(['company'])->Where('status', 'like', "$status%")->paginate(10);
            return view('report.document')->with('documentreport',$documentreport)->with('current_date',$request->current_date);
           
           }
          
           }

    
     function dash(){
         return view('dashboard');
     }
     
  
}
