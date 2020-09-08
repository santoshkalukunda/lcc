<?php

namespace App\Http\Controllers;

use App\Documentreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentreportController extends Controller
{
    public function index()
    {
        $currentdate=nepalicurrenntdate();
        $documentreport=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.name','company_infos.contact_no','company_infos.reg_date')->Where('documentreports.status', 'like', "incomplete")->orderBy('company_infos.reg_date')->paginate(10);
        $count=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.name','company_infos.contact_no','company_infos.reg_date')->Where('documentreports.status', 'like', "incomplete")->count();
        return view('report.document')->with('documentreport',$documentreport)->with('current_date',$currentdate)->with('count',$count);
     
    }
    public function edit(Request $request){
     
        $previouscomment=Documentreport::where('id','=',$request->id)->select('comments')->first();
       Documentreport::where('id','=',$request->id)->update(['comments'=>$request->comments."<br><b>".'('.Auth::user()->name.')'."</b><br>".date("Y-m-d h:i:sa")."<hr>".$previouscomment->comments,'status'=>$request->status]);
       return redirect()->back();
    }
}
