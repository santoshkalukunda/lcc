<?php

namespace App\Http\Controllers;

use App\Documentreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentreportController extends Controller
{
    public function index()
    {
        return view('report.document');
    }
    public function edit(Request $request){
     
        $previouscomment=Documentreport::where('id','=',$request->id)->select('comments')->first();
       Documentreport::where('id','=',$request->id)->update(['comments'=>$request->comments." ".'('.Auth::user()->name.')'."  ".date("Y-m-d h:i:sa")."    >>>".$previouscomment->comments,'status'=>$request->status]);
       return redirect()->back();
    }
}
