<?php

namespace App\Http\Controllers;

use App\Renew;
use Illuminate\Http\Request;

class RenewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $search =Renew::with(['company'])->paginate(10);
    
        //$search=Renew::paginate(10);
        return view('report.renew')->with('renew',$search);
       
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
    Renew::create($request->all());
    return redirect()->back()->with('success',"Company Renewed");
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
        //
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
