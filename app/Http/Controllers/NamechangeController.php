<?php

namespace App\Http\Controllers;

use App\Namechange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NamechangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namechange=Namechange::with('company')->paginate(10);
        return view('report.namechange')->with('namechange',$namechange);
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
     * @param  \App\Namechange  $namechange
     * @return \Illuminate\Http\Response
     */
    public function show($namechange)
    {
        $data=Namechange::where('company_id','=',"$namechange")->paginate(10);
        return view('company.namechange')->with('company_id',$namechange)->with('namechange',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Namechange  $namechange
     * @return \Illuminate\Http\Response
     */
    public function edit(Namechange $namechange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Namechange  $namechange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Namechange $namechange)
    {
        
        $request['comments']=$request->comments . "</br> <b>" . '(' . Auth::user()->name . ')' . "</b></br>" . date("Y-m-d h:i:sa") . "<hr>" . $namechange->comments;
        $namechange->fill($request->all());
        $namechange->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Namechange  $namechange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Namechange $namechange)
    {
        //
    }
}
