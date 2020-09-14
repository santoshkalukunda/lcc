<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Custommail;
use App\Mail\CustomMail as MailCustomMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CustommailController extends Controller
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
    public function create()
    {
        return view('mail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
        $mail=Custommail::create($data); 
           Mail::to($request->to)
           ->send(new MailCustomMail($mail));
           return redirect()->back()->with('success',"Mail Sent");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custommail  $custommail
     * @return \Illuminate\Http\Response
     */
    public function show($custommail)
    {
        $comapany=CompanyInfo::where('id','=',"$custommail")->first();
        return view('company.mail')->with('company_id',$comapany);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custommail  $custommail
     * @return \Illuminate\Http\Response
     */
    public function edit(Custommail $custommail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custommail  $custommail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custommail $custommail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custommail  $custommail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custommail $custommail)
    {
        //
    }
}
