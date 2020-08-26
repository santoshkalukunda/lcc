<?php

namespace App\Http\Controllers;

use App\Namechange;
use Illuminate\Http\Request;

class NamechangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namechange=Namechange::paginate(10);
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
    public function show(Namechange $namechange)
    {
        //
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
