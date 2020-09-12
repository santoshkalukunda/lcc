<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Documentreport;
use Illuminate\Http\Request;

class CompanyReportController extends Controller
{
    public function index()
    {
        return view('company.report');
    }
    public function report(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $reg_fdate = $request->reg_fdate;
        $reg_ldate = $request->reg_ldate;
        $share = $request->share;
        $fshare = $request->fshare;
        $lshare = $request->lshare;
        $category = $request->category;
        if ($reg_fdate != null and $reg_ldate != null) {
            $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->whereBetween('reg_date', [$reg_fdate, $reg_ldate])->Where('share', 'like', "$fshare%")->latest()->paginate(6);
            $count = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->whereBetween('reg_date', [$reg_fdate, $reg_ldate])->Where('share', 'like', "$fshare%")->count();
            return view('company.search')->with('search', $search)->with('count',$count);
        }
        $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->Where('reg_date', 'like', "$reg_fdate%")->latest()->paginate(6);
        $count= CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->Where('reg_date', 'like', "$reg_fdate%")->Where('share', 'like', "$fshare%")->count();
        return view('company.search')->with('search', $search)->with('count',$count);
        /* if($request->name!=null){
        $search=CompanyInfo::where('name','like','%'.$request->name.'%')->paginate(6);
        return view('company.search')->with('search',$search);
   }elseif($request->address!=null){
    $search=CompanyInfo::where('address','like','%'.$request->address.'%')->paginate(6);
    return view('company.search')->with('search',$search);
   }
   else{
    $search=CompanyInfo::paginate(6);
    return view('company.search')->with('search',$search);
   }
   */
    }
  
}
