<?php

namespace App\Http\Controllers;

use App\Auditreport;
use App\CompanyInfo;
use App\Documentreport;
use App\Http\Requests\companyrequest;
use App\Namechange;
use App\Renewreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = CompanyInfo::latest()->Paginate(10);
        // $count = CompanyInfo::count();
        $count= $companies->total();
        // $companies = Auth::user()->companies()->latest()->paginate(5);
        return view('company.index')->with('company_data', $companies)->with('count',$count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(companyrequest $request)
    {
        $request['added_by'] = Auth::user()->id;
        $status = CompanyInfo::create($request->all());
        $documentreport = array("status"=>"incomplete", "comments"=>"New company registed","company_id"=>"$status->id");
       //for document report create
        Documentreport::create( $documentreport);
        ///end document report end
        ///renew report create
        $renew_report = array("company_id"=>"$status->id","renewreport_reg_fiscal"=>"$request->fiscal_year","renewreport_comments"=>"New Created Account","renewreport_fiscal"=>"0000","renewreport_status"=>"incomplete");
        Renewreport::create($renew_report);
        ///////end document create
        ///audit report create
        $audit_report = array("company_id"=>"$status->id","auditreport_reg_fiscal"=>"$request->fiscal_year","auditreport_comments"=>"New Created Account","auditreport_fiscal"=>"0000","auditreport_status"=>"incomplete");
        Auditreport::create($audit_report);
        ///audit report end
        if ($status) {
            $request->session()->flash('success', 'Register Successfully');
        } 
        // $currentUser = Auth::user();
        // $currentUser->companies()->create($request->all());

        return redirect(route('capital.show', $status->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInfo $company)
    {
        return view('company.show')->with([
            'companyInfo' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInfo $company)
    {
        return view('company.edit')->with([
            'companyInfo' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(companyrequest $request, $companyInfo)
    {
        $company_data = CompanyInfo::findOrFail($companyInfo);
        $data = $request->all();
        $data['added_by'] = $request->user()->id;
        $company_data->fill($data);
        $status = $company_data->save();
        if ($status) {
            $request->session()->flash('success', 'Update successfully');
        } 
        return redirect()->route('company.show',$companyInfo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyInfo)
    {
        $company_data = CompanyInfo::findOrFail($companyInfo);
        $company_data->delete();
        return redirect("home");
    }
}
