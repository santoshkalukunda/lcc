<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Auditreport;
use App\Setdate;
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
            return view('setting.setdate');
        }
        ///////////////end///////////
        $search = Auditreport::Join('company_infos', 'auditreports.company_id', '=', 'company_infos.id')->select('company_infos.name', 'company_infos.contact_no', 'auditreports.*')->where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '!=', "$fiscal->fiscal")->paginate(10);
        $count = Auditreport::Join('company_infos', 'auditreports.company_id', '=', 'company_infos.id')->select('company_infos.name', 'company_infos.contact_no', 'auditreports.*')->where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '!=', "$fiscal->fiscal")->count();
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
        $count = Audit::where('company_id', '=', $request->company_id)->where('audit_fiscal', 'like', "$request->audit_fiscal")->count();
        if ($count < 1) {
            $audit_id = Audit::create($request->all());
            ///for auditwreport /////
            $companycount = Auditreport::where('company_id', '=', $request->company_id)->count();
            if ($companycount < 1) {
                $audit_report = array("auditreport_fiscal" => "$request->audit_fiscal", "company_id" => "$request->company_id", "renew_id" => "$audit_id->id");
                Auditreport::create($audit_report);
            } else {
                $audit_report = array("auditreport_fiscal" => "$request->audit_fiscal", "audit_id" => "$audit_id->id");
                Auditreport::where('company_id', '=', $request->company_id)->update($audit_report);
            }
            //////renew report end///////




            return redirect()->back()->with('success', "Company Audited");
        } else {
            return redirect()->back()->with('success', "This $request->audit_fiscal Fiscal Year Already audited");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function show($audit)
    {
        $data = Audit::where('company_id', '=', "$audit")->paginate(10);
        return view('company.audit')->with('company_id', $audit)->with('audit', $data);
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
        $data['auditreport_comments'] = $request->audit_comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $previouscomments->auditreport_comments;
        Auditreport::where('id', '=', $audit)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        ////not delete for audit report relationshif with audit model 
        $count = Auditreport::where('audit_id', '=', $audit->id)->count();
        if ($count > 0) {
            $audit_report = array("auditreport_fiscal" => "0000", "audit_id" => null);
            Auditreport::where('audit_id', '=', $audit->id)->update($audit_report);
        }
        //end not delete for audit 

        $audit->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
