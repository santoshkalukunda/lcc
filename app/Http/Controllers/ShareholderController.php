<?php

namespace App\Http\Controllers;

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
        return view('shareholder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shareholder.create');
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
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function show(Shareholder $shareholder)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function edit($shareholder)
    {
        return view('shareholder.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shareholder $shareholder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shareholder $shareholder)
    {
        //
    }
}
