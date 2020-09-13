<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Http\Requests\RenewRequest;
use App\Renew;
use App\Renewreport;
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
        $fiscal = Setdate::first();
        if ($fiscal == null) {
       
        return view('setting.setdate')->with('setdate',$fiscal);
        }
        //$search = DB::table('company_infos')->leftJoin('renews', 'company_infos.id', '=', 'renews.company_id')->get();
        $search = Renewreport::Join('company_infos','renewreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','renewreports.*')->where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('renewreport_fiscal', '!=', "$fiscal->fiscal")->paginate(9);
       $count=$search->total();
        return view('report.renew')->with('renew', $search)->with('date', $fiscal)->with('count',$count);
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
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renew  $renew
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $fiscal = Setdate::first();
        if ($fiscal == null) {
            return view('setting.setdate')->with('setdate',$fiscal);
        }
        $renew=Renewreport::where('company_id','=',$company_id)->where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->get(); 
       return view('company.renew')->with('company_id', $company_id)->with('renew',$renew)->with('currentdate',$fiscal->fiscal);
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
    public function update(Request $request, $renewreport)
    {
        $fiscal=Setdate::first();
        $previouscomments = Renewreport::where('id', '=', $renewreport)->first();
        if($request->renewreport_status=="notrenewed"){
            $data['renewreport_comments'] = $request->renew_comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $previouscomments->renewreport_comments;
            $data['renewreport_fiscal']="-";
            Renewreport::where('id', '=', $renewreport)->update($data);
            return redirect()->back();
        }else{
          
            $data['renewreport_comments'] = $request->renew_comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $previouscomments->renewreport_comments;
            $data['renewreport_fiscal']=$fiscal->fiscal;
            Renewreport::where('id', '=', $renewreport)->update($data);
            return redirect()->back();
        }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renew  $renew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renew $renew)
    {
    
    }
}
