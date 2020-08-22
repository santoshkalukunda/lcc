<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Http\Requests\companyrequest;
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
        // $companies = Auth::user()->companies()->latest()->paginate(5);
        return view('company.index')->with('company_data', $companies);
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
        if ($status) {
            $request->session()->flash('success', 'Register Successfully');
        } else {
            $request->session()->flash('error', 'While Rigistering Company');
        }
        // $currentUser = Auth::user();
        // $currentUser->companies()->create($request->all());

        return redirect()->back();
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
