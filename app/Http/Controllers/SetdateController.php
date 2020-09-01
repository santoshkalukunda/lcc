<?php

namespace App\Http\Controllers;

use App\Setdate;
use Illuminate\Http\Request;

class SetdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setdate=Setdate::get();
        return view('setting.setdate')->with('setdate',$setdate);
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
             $setdate=Setdate::count();
            
            if($setdate<1){
                Setdate::create($request->all());
                return redirect()->back()->with('success',"Set Date Done");
            }else{
                return redirect()->back()->with('success',"Date Already Set");
            }
                
           
           
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setdate  $setdate
     * @return \Illuminate\Http\Response
     */
    public function show(Setdate $setdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setdate  $setdate
     * @return \Illuminate\Http\Response
     */
    public function edit(Setdate $setdate)
    {
    return view('setting.setdateedit')->with(['setdate'=>$setdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setdate  $setdate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setdate $setdate)
    {
        $setdate->fill($request->all());
        $setdate->save();
        return redirect('setdate')->with("success","Set Date Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setdate  $setdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setdate $setdate)
    {
        //
    }
}
