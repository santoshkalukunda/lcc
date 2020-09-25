<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Http\Requests\ShareholderRequest;
use App\Shareholder;
use Illuminate\Http\Request;

class ShareholderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $companyInfo)
    {
        
        return view('shareholder.create')->with('companyInfo', $companyInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShareholderRequest $request)
    {
        Shareholder::create($request->all()); 
        $count=Shareholder::where('company_id','=',"$request->company_id")->count();
      return redirect(route('shareholder.show', $request->company_id))->with('success', 'Shareholder Registed')->with('count',$count);
       
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $shareholder=Shareholder::where('company_id','=',"$company_id")->latest()->paginate(12);
        $count=Shareholder::where('company_id','=',"$company_id")->count();
        return view('shareholder.show')->with('company_id', $company_id)->with('shareholder',$shareholder)->with('count',$count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Shareholder $shareholder)
    {
        return view('shareholder.edit')->with(['shareholder'=>$shareholder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function update(ShareholderRequest $request, Shareholder $shareholder)
    {
      
      $shareholder->fill($request->all());
      $shareholder->save();
      return redirect(route('shareholder.show', $shareholder->company_id))->with('success', 'Shareholder Record Updated');
      //return view('shareholder.show')->with("success","Shareholder Record Updated")->with('company_id',$shareholder->company_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shareholder $shareholder)
    {
        $shareholder->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
