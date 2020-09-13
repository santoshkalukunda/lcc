<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Auditreport;
use App\Setdate;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///for current set date and fiscal year first
        $fiscal = Setdate::first();
        if ($fiscal == null) {
           return view('setting.setdate')->with('setdate',$fiscal);
        }
        ///////////////end///////////
        $search = Auditreport::Join('company_infos', 'auditreports.company_id', '=', 'company_infos.id')->select('company_infos.name', 'company_infos.contact_no', 'auditreports.*')->where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '!=', "$fiscal->fiscal")->paginate(9);
        $count = $search->total();
        return view('report.audit')->with('audit', $search)->with('date', $fiscal)->with('count',$count);
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
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function show($audit)
    {
        $fiscal = Setdate::first();
        if ($fiscal == null) {
            return view('setting.setdate')->with('setdate',$fiscal);
        }
        $data = Auditreport::where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('company_id', '=', "$audit")->get();
        return view('company.audit')->with('company_id', $audit)->with('audit', $data)->with('currentdate',$fiscal->fiscal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function edit(Audit $audit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $audit)
    {
        $previouscomments = Auditreport::where('id', '=', $audit)->first();
        $fiscal=Setdate::first();
        
        if($request->auditreport_status=="notaudited"){
            $data['auditreport_comments'] = $request->audit_comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $previouscomments->auditreport_comments;
            $data['auditreport_fiscal']="-";
            Auditreport::where('id', '=', $audit)->update($data);
            return redirect()->back();
        }else{
            $data['auditreport_comments'] = $request->audit_comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $previouscomments->auditreport_comments;
            $data['auditreport_fiscal']=$fiscal->fiscal;
            Auditreport::where('id', '=', $audit)->update($data);
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        //
    }
}
