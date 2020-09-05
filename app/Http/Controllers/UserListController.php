<?php

namespace App\Http\Controllers;

use App\Http\Requests\changepasswordrequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function index(){
        $user=User::get();
        return view('auth.list')->with('user',$user);
    }
    public function destroy($id){
        $count=User::count();
        if($count>1){
            User::where('id','=',$id)->delete();
            return redirect()->back()->with('success',"User Deleted");
        }else{
            return redirect()->back()->with('success',"User Not Delete Due To This is User Last User");
        }
      
    }
    public function changepassword(){
        return view('auth.changepassword');
    }
    public function changepasswordupdate(changepasswordrequest $request){
     if(Hash::check($request->currentpassword,Auth::user()->password)){
         User::where('id','=',Auth::user()->id)->update(['password'=>Hash::make($request->password)]);
         return redirect()->back()->with('success',"Password Change Successfull");
        }else{
        return redirect()->back()->with('success',"Incorrect Current Password");
     }
       

        
    }
}
