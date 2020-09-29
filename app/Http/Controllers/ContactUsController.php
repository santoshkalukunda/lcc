<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(ContactUsRequest $request){
       ContactUs::create($request->all());
       return redirect()->back()->with('success',"Message Sent");
    }
    public function index(){
        $contactus=ContactUs::latest()->paginate(10);
        return view('setting.contactus')->with('contactus',$contactus);
    }
    public function destroy($id){
        ContactUs::where('id','=',$id)->delete();
        return redirect()->back()->with('success',"Record Deleted");
    }
}
