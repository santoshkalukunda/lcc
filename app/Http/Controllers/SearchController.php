<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $data=$request->search;
        $search=CompanyInfo::where('name','like',"$data%")->latest()->paginate(6);
        return view('company.search')->with('search',$search);
    }
     function dash(){
         return view('dashboard');
     }
  
}