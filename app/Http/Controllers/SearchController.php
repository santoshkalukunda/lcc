<?php

namespace App\Http\Controllers;

use App\Auditreport;
use App\CompanyInfo;
use App\Documentreport;
use App\Namechange;
use App\Renew;
use App\Renewreport;
use App\Setdate;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use index;
use Index as GlobalIndex;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $data=$request->search;
            $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->orWhere('category','like',"$data%")->latest()->paginate(8);
            $count=$search->total();
            return view('company.search')->with('search',$search)->with('count',$count);
        
    }
    function searchlist(Request $request)
    {
        $data=$request->search;
        $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->orWhere('category','like',"$data%")->latest()->paginate(10);
        $count=$search->total();
            return view('company.index')->with('company_data', $search)->with('count',$count);
            //return view('company.search')->with('search',$search);
        
    }
    public function sherepurchasesele(){
        $search=CompanyInfo::latest()->paginate(8);
        $count=$search->total();
        return view('report.sharepurchasesale')->with('search',$search)->with('count',$count);
    }
    public function sherepurchaseselesearch(Request $request){
        $data=$request->search;
        $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->orWhere('category','like',"$data%")->latest()->paginate(8);
        $count=$search->total();
        return view('report.sharepurchasesale')->with('search',$search)->with('count',$count);
    }
    public function capitalincrease(){
        $search=CompanyInfo::latest()->paginate(8);
        $count=$search->total();
        return view('report.capitalincrease')->with('search',$search)->with('count',$count);
    }
    public function capitalincreasesearch(Request $request){
        $data=$request->search;
        $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->orWhere('category','like',"$data%")->latest()->paginate(8);
        $count=$search->total();
        return view('report.capitalincrease')->with('search',$search)->with('count',$count);
    }
    
        public function changename(Request $request){
         $name=$request->name;
         $status=$request->status;
         $currentdate=nepalicurrenntdate();
         $last=30;
         $day=$last-$request->days;
        if($request->operation!=null and $request->days!=null){
            $date=date_create($currentdate);
            date_add($date,date_interval_create_from_date_string("-$day days"));
            $ago=date_format($date,"Y-m-d");
            $search =Namechange::where('new_name', 'like', "$name%")->Where('status', 'like', "$status%")->where('change_date',"$request->operation","$ago")->orderBy('change_date')->paginate(9);
            $count=$search->total();
            return view('report.namechange')->with('namechange',$search)->with('count',$count)->with('currentdate',$currentdate);
        }
        $search =Namechange::where('new_name', 'like', "$name%")->Where('status', 'like', "$status%")->orderBy('change_date')->paginate(9);
        $count=$search->total();
         return view('report.namechange')->with('namechange',$search)->with('count',$count)->with('currentdate',$currentdate);
        }

        public function documentreport(Request $request){
          $currentdate=nepalicurrenntdate();
            $status=$request->status;
            $last=90;
            $day=$last-$request->days;
           if($request->operation!=null and $request->days!=null){
               $date=date_create($currentdate);
               $date=date_add($date,date_interval_create_from_date_string("-$day days"));
               $date=date_format($date,"Y-m-d");
           $documentreport=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.*')->Where('documentreports.status', 'like', "$status%")->where('company_infos.name','like',"$request->name%")->where('company_infos.reg_date',$request->operation,"$date")->orderBy('company_infos.reg_date')->paginate(9);    
           $count=$documentreport->total();
                 return view('report.document')->with('documentreport',$documentreport)->with('current_date',$currentdate)->with('count',$count);;
           }else{
            $documentreport=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.name','company_infos.contact_no','company_infos.reg_date')->Where('documentreports.status', 'like', "$status%")->where('company_infos.name','like',"$request->name%")->orderBy('company_infos.reg_date')->paginate(9);
            $count=$documentreport->total();
            return view('report.document')->with('documentreport',$documentreport)->with('current_date',$currentdate)->with('count',$count);;
           }
           }
           public function audit(Request $request){
            $data=Setdate::first();
            if($data==null){
                return view('setting.setdate');
            }
            if($request->status=="audited"){
                $search = Auditreport::Join('company_infos','auditreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','auditreports.*')->where('auditreport_fiscal', '=', "$data->fiscal")->where('auditreport_reg_fiscal', '!=', "$data->fiscal")->where('company_infos.name','like',"$request->name%")->paginate(9);
                $count = $search->total();
               return view('report.audit')->with('audit',$search)->with('date',$data)->with('count',$count);
            }
            if($request->status=="not_audited"){
                $search = Auditreport::Join('company_infos','auditreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','auditreports.*')->where('auditreport_fiscal', '!=', "$data->fiscal")->where('auditreport_reg_fiscal', '!=', "$data->fiscal")->where('company_infos.name','like',"$request->name%")->paginate(9);
                $count = $search->total();
                return view('report.audit')->with('audit',$search)->with('date',$data)->with('count',$count);
          
            }
                //$search = DB::table('company_infos')->leftJoin('renews', 'company_infos.id', '=', 'renews.company_id')->get();
                $search = Auditreport::Join('company_infos','auditreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','auditreports.*')->where('auditreport_reg_fiscal', '!=', "$data->fiscal")->where('company_infos.name','like',"$request->name%")->paginate(9);
                $count = $search->total();
                 //$search =CompanyInfo::with(['renew'])->where('fiscal_year','!=',"$data->fiscal")->where('name','like',"$request->name%")->paginate(10);
                //$search=Renew::paginate(10);
                return view('report.audit')->with('audit',$search)->with('date',$data)->with('count',$count);
           }
           public function renew(Request $request){
            $data=Setdate::first();
            if($data==null){
                return view('setting.setdate');
            }
            if($request->status=="renewed"){
                //$search =CompanyInfo::with(['renew'])->where('fiscal_year','!=',"$fiscal->fiscal")->where('name','like',"$request->name%")->paginate(10);
                $search = Renewreport::Join('company_infos','renewreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','renewreports.*')->where('renewreport_fiscal', '=', "$data->fiscal")->where('renewreport_reg_fiscal', '!=', "$data->fiscal")->where('company_infos.name','like',"$request->name%")->paginate(9);
                $count = $search->total();
                //$search = Renew::Join('company_infos','renews.company_id','=','company_infos.id')->select('company_infos.*','renews.*')->where('company_infos.name','like',"$request->name%")->where('renew_fiscal','=',$data->fiscal)->paginate(10);
                return view('report.renew')->with('renew',$search)->with('date',$data)->with('count',$count);;
            }
            if($request->status=="not_renew"){
                $search = Renewreport::Join('company_infos','renewreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','renewreports.*')->where('renewreport_fiscal', '!=', "$data->fiscal")->where('renewreport_reg_fiscal', '!=', "$data->fiscal")->where('company_infos.name','like',"$request->name%")->paginate(9);
                $count = $search->total();
              //$search =CompanyInfo::with(['renew'])->where('fiscal_year','!=',"$data->fiscal")->where('name','like',"$request->name%")->paginate(10);
                //$search = Renew::leftJoin('company_infos','renews.company_id','=','company_infos.id')->select('company_infos.*','renews.*')->where('company_infos.fiscal_year','!=',"$data->fiscal")->where('renew_fiscal','!=',$data->fiscal)->where('company_infos.name','like',"$request->name%")->paginate(10);
                return view('report.renew')->with('renew',$search)->with('date',$data)->with('count',$count);
          
            }
                //$search = DB::table('company_infos')->leftJoin('renews', 'company_infos.id', '=', 'renews.company_id')->get();
                $search = Renewreport::Join('company_infos','renewreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','renewreports.*')->where('renewreport_reg_fiscal', '!=', "$data->fiscal")->where('company_infos.name','like',"$request->name%")->paginate(9);
                $count = $search->total();
                 //$search =CompanyInfo::with(['renew'])->where('fiscal_year','!=',"$data->fiscal")->where('name','like',"$request->name%")->paginate(10);
                //$search=Renew::paginate(10);
                return view('report.renew')->with('renew',$search)->with('date',$data)->with('count',$count);
                
           }

            

     
  
}
