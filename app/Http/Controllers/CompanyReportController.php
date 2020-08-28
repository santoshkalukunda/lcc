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

        if ($fshare != null and $lshare != null and $share == "between" and $reg_fdate != null and $reg_ldate != null) {
            $search = CompanyInfo::where('name', 'like', "$name%")
            ->Where('address', 'like', "$address%")
            ->Where('category', '=', "$category")
            ->whereBetween('share', [$fshare, $lshare])
            ->whereBetween('reg_date', [$reg_fdate, $reg_ldate])
            ->latest()
            ->paginate(6);
            return view('company.search')->with('search', $search);
        }
        if ($fshare != null and $share !=null and $reg_fdate != null and $reg_ldate != null) {
            $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->where('share', "$share", "$fshare")->whereBetween('reg_date', [$reg_fdate, $reg_ldate])->latest()->paginate(6);
            return view('company.search')->with('search', $search);
        }

        if ($reg_fdate != null and $reg_ldate != null) {
            $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->whereBetween('reg_date', [$reg_fdate, $reg_ldate])->Where('share', 'like', "$fshare%")->latest()->paginate(6);
            return view('company.search')->with('search', $search);
        }
        if ($fshare != null and $lshare != null and $share == "between") {
            $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->Where('reg_date', 'like', "$reg_fdate%")->whereBetween('share', [$fshare, $lshare])->latest()->paginate(6);
            return view('company.search')->with('search', $search);
        }
        if ($fshare != null and $share!=null) {
            $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->Where('reg_date', 'like', "$reg_fdate%")->where('share', "$share", "$fshare")->latest()->paginate(6);
            return view('company.search')->with('search', $search);
        }
        $search = CompanyInfo::where('name', 'like', "$name%")->Where('address', 'like', "$address%")->Where('category', 'like', "$category%")->Where('reg_date', 'like', "$reg_fdate%")->Where('share', 'like', "$fshare%")->latest()->paginate(6);
        return view('company.search')->with('search', $search);


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
