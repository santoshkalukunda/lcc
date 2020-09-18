<?php

namespace App\Http\Controllers;

use App\Thresholddate;
use Illuminate\Http\Request;

class ThresholddateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thresholddate=Thresholddate::first();
        return view('setting.thresholddate')->with('thresholddate',$thresholddate);
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
        $count=Thresholddate::count();
        if($count<1){
       Thresholddate::create($request->all());
       return redirect()->back()->with('success','Threshold Date Seted');
        }else{
            return redirect()->back()->with('success','Threshold Date Already Seted');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thresholddate  $thresholddate
     * @return \Illuminate\Http\Response
     */
    public function show(Thresholddate $thresholddate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thresholddate  $thresholddate
     * @return \Illuminate\Http\Response
     */
    public function edit(Thresholddate $thresholddate)
    {
        return view('setting.thresholddateedit')->with(['thresholddate'=>$thresholddate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thresholddate  $thresholddate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thresholddate $thresholddate)
    {
        $thresholddate->fill($request->all());
        $thresholddate->save();
        return redirect('thresholddate')->with("success","Threshold Date Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thresholddate  $thresholddate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thresholddate $thresholddate)
    {
        //
    }
}
