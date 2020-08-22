<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $data=$request->search;
        $search_by=$request->search_by;
     
            $search=CompanyInfo::where('name','like',"$data%")->orWhere('address','like',"$data%")->orWhere('contact_no','like',"$data%")->orWhere('reg_no','like',"$data%")->orWhere('fiscal_year','like',"$data%")->orWhere('reg_date','like',"$data%")->latest()->paginate(6);
            return view('company.search')->with('search',$search);
        
    }
     function dash(){
         return view('dashboard');
     }
  
}
