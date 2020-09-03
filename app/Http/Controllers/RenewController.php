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
            return view('setting.setdate');
        }
        //$search = DB::table('company_infos')->leftJoin('renews', 'company_infos.id', '=', 'renews.company_id')->get();
        $search = Renewreport::Join('company_infos','renewreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','renewreports.*')->where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->paginate(10);
        //$search = CompanyInfo::with(['renewreport'])->where('fiscal_year', '!=', "$fiscal->fiscal")->paginate(10);
        //$search=Renew::paginate(10);

        // return $search;

        return view('report.renew')->with('renew', $search)->with('date', $fiscal);
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
        $count = Renew::where('company_id', '=', $request->company_id)->where('renew_fiscal', 'like', "$request->renew_fiscal")->count();
        if ($count < 1) {
            $renew_id = Renew::create($request->all());
            ///for renewreport /////
            $companycount = Renewreport::where('company_id', '=', $request->company_id)->count();
            if ($companycount < 1) {
                $renew_report = array("renewreport_fiscal" => "$request->renew_fiscal", "company_id" => "$request->company_id", "renew_id" => "$renew_id->id");
                Renewreport::create($renew_report);
            } else {
                $renew_report = array("renewreport_fiscal" => "$request->renew_fiscal", "renew_id" => "$renew_id->id");
                Renewreport::where('company_id', '=', $request->company_id)->update($renew_report);
            }
            //////renew report end///////
            return redirect()->back()->with('success', "Company Renewed");
        } else {
            return redirect()->back()->with('success', "This $request->renew_fiscal Fiscal Year Already Renewed");
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
        $renew = Renew::where('company_id', '=', "$company_id")->orderBy('renew_date', 'desc')->paginate(10);
        return view('company.renew')->with('company_id', $company_id)->with('renew', $renew);
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
        $previouscomments = Renewreport::where('company_id', '=', $renewreport)->first();
        $data['renewreport_comments'] = $request->renew_comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $previouscomments->renewreport_comments;
        Renewreport::where('company_id', '=', $renewreport)->update($data);
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
        $count=Renewreport::where('renew_id', '=', $renew->id)->count();
        if($count>0){
            $renew_report = array("renewreport_fiscal" => "0000", "renew_id" => null);
            Renewreport::where('renew_id', '=', $renew->id)->update($renew_report);
        }
        $renew->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
