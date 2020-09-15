<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShareholderSearchController extends Controller
{
    public function view($id){
        $shareholder=Shareholder::where('id','=',"$id")->get();
        return view('shareholder.view')->with('shareholder',$shareholder);
    }
    public function search(Request $request){
        $data=$request->search;
         $search =Shareholder::with(['company'])->where('shareholder_name', 'LIKE', '%'. $request->search .'%')->orwhere('shareholder_address', 'LIKE', $data .'%')->orwhere('shareholder_email', 'LIKE', $data .'%')->orwhere('shareholder_contact', '=', $data)->paginate(6);
     return view('shareholder.searchresult')->with('search',$search);
    }
    public function searchlist(Request $request){
        $shareholder=Shareholder::where('company_id','=',"$request->company_id")->where('shareholder_name', 'LIKE', '%'. $request->search .'%')->paginate(6);
        $count=Shareholder::where('company_id','=',"$request->company_id")->where('shareholder_name', 'LIKE', '%'. $request->search .'%')->count();
        return view('shareholder.show')->with('company_id', $request->company_id)->with('shareholder',$shareholder)->with('count',$count);
    }
}
