<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Http\Requests\RenewRequest;
use App\Renew;
use App\Setdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RenewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    $fiscal=Setdate::first();
   
    if($fiscal==null){
        return view('setting.setdate');
    }
        //$search = DB::table('company_infos')->leftJoin('renews', 'company_infos.id', '=', 'renews.company_id')->get();
         $search =CompanyInfo::with(['renew'])->where('fiscal_year','!=',"$fiscal->fiscal")->paginate(10);
        //$search=Renew::paginate(10);
     
        $date=Setdate::first();
        return view('report.renew')->with('renew',$search)->with('date',$date);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RenewRequest $request)
    {
        $count=Renew::where('company_id','=',$request->company_id)->where('renew_fiscal','like',"$request->renew_fiscal")->count();
        if($count<1){
            Renew::create($request->all());
            return redirect()->back()->with('success',"Company Renewed");
        }else{
            return redirect()->back()->with('success',"This $request->renew_fiscal Fiscal Year Already Renewed");
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renew  $renew
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $renew=Renew::where('company_id','=',"$company_id")->orderBy('renew_date', 'desc')->paginate(10);
        return view('company.renew')->with('company_id',$company_id)->with('renew',$renew);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renew  $renew
     * @return \Illuminate\Http\Response
     */
    public function edit(Renew $renew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renew  $renew
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renew $renew)
    {
        $data['renew_comments']=$request->renew_comments."  ".'('.Auth::user()->name.')'."  ".date("Y-m-d h:i:sa")."   >>>".$renew->renew_comments;
        $renew->fill($data);
        $renew->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renew  $renew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renew $renew)
    {
        $renew->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
