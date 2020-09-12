<?php

namespace App\Http\Controllers;

use App\Capital;
use App\Document;
use Illuminate\Http\Request;

class CapitalController extends Controller
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
    public function create (Request $companyInfo)
    {
       
        return view('capital.create')->with('companyInfo', $companyInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Capital::where('company_id','=',"$request->company_id")->count();
        if($count<1){
            $item=Capital::create($request->all());
            return redirect(route('shareholder.show',$item->company_id))->with('success', 'Capital Added successfully.');
        }else{
            return redirect()->back()->with('success', 'Capital Already Added.');

        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $data =Capital::where('company_id','=',"$company_id")->get();
        return view('capital.create')->with('company_id', $company_id)->with('capital', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function edit(Capital $capital)
    {
        return view('capital.edit')->with(['capital'=>$capital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capital $capital)
    {
        $capital->fill($request->all());
        $capital->save();
      return redirect(route('capital.show', $capital->company_id))->with('success', 'Capital Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capital $capital)
    {
        $capital->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
