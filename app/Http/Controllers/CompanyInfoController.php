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
        $company_data = CompanyInfo::orderBy('id', 'DESC')->Paginate(5);
        return view('company.index')->with('company_data', $company_data);
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
        $status=CompanyInfo::create($request->all());
        if ($status){
            $request->session()->flash('success','Register Successfully');
        }else{
            $request->session()->flash('error','While Rigistering Company');
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
    public function show(CompanyInfo $companyInfo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($companyInfo)
    {
    $company_data=CompanyInfo::findOrFail($companyInfo);
        return view('company.edit')->with('company_data',$company_data);
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
        $company_data=CompanyInfo::findOrFail($companyInfo);
        $data=$request->all();
        $data['added_by']=$request->user()->id;
        $company_data->fill($data);
        $status=$company_data->save();
        if ($status){
            $request->session()->flash('success','Update successfully');
        }else{
            $request->session()->flash('error','while updating Banner');
        }
        return redirect()->route('company.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyInfo)
    {
        $company_data=CompanyInfo::findOrFail($companyInfo);
        $company_data->delete();
        return redirect()->back()->with('success','Record Deleted');
    }
}
