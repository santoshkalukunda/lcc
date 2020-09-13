<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
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
        $currentdate=nepalicurrenntdate();
        $search =Namechange::Where('status', '=', "incomplete")->orderBy('change_date')->paginate(9);
        $count=$search->total();
        return view('report.namechange')->with('namechange',$search)->with('currentdate',$currentdate)->with('count',$count);
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
        $company_name=CompanyInfo::where('id','=',$request->company_id)->first();
            $change = array("change_date"=>$request->change_date, "old_name"=>"$company_name->name", "new_name"=>"$request->new_name","status"=>"incomplete","company_id"=>"$request->company_id");
            Namechange::create($change);
            $data['name'] = $request->new_name;
            CompanyInfo::where('id', '=', $request->company_id)->update($data);
            return redirect()->back()->with('success', "Company  Name Changed");
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
        $namechange->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
