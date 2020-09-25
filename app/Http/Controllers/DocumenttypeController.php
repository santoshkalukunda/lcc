<?php

namespace App\Http\Controllers;

use App\Documenttype;
use Illuminate\Http\Request;

class DocumenttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documenttype=Documenttype::get();
        return view('documenttype.index')->with('documenttype',$documenttype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Documenttype::create($request->all());
        return redirect()->back()->with('success',"Document Type Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documenttype  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function show(Documenttype $documenttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documenttype  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Documenttype $documenttype)
    {
        return view('documenttype.edit')->with(['documenttype'=>$documenttype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documenttype  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documenttype $documenttype)
    {
        $documenttype->fill($request->all());
        $documenttype->save();
        return redirect('documenttype')->with('success',"Document type updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documenttype  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documenttype $documenttype)
    {
        $documenttype->delete();
       return redirect()->back()->with('success',"Document Type Deleted");
    }
}
