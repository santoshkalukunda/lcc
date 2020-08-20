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
        return redirect()->back()->with('success',"Shareholder Registed");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $shareholder=Shareholder::where('company_id','=',"$company_id")->latest()->paginate(6);
        $count=Shareholder::where('company_id','=',"$company_id")->count();
        return view('shareholder.show')->with('company_id', $company_id)->with('shareholder',$shareholder)->with('count',$count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function edit($shareholder)
    {
       
        $data=Shareholder::where('id','=',"$shareholder")->get();
        
        return view('shareholder.edit')->with('shareholder',$data);
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
      return redirect()->back()->with("success","Shareholder Record Updated");
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
