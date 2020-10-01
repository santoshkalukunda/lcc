<?php

namespace App\Http\Controllers;

use App\Http\Requests\changepasswordrequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('register-users'), 403, 'You do not have enough permissions');
        $user = User::where('role', '!=', "superadmin")->get();
        return view('auth.list')->with('user', $user);
    }
    public function destroy($id)
    {
        abort_unless(Gate::allows('register-users'), 403, 'You do not have enough permissions');
        $count = User::count();
        if ($count > 1) {
            User::where('id', '=', $id)->delete();
            return redirect()->back()->with('success', "User Deleted");
        } else {
            return redirect()->back()->with('success', "User Not Delete Due To This is User Last User");
        }
    }
    public function changepassword()
    {
        return view('auth.changepassword');
    }
    public function changepasswordid($user_id)
    {

        return view('auth.changepassword', compact('user_id'));
    }

    public function changepasswordupdate(changepasswordrequest $request)
    {

        if (Hash::check($request->currentpassword, Auth::user()->password)) {
            if ($request->user_id != null) {
                abort_unless(Gate::allows('register-users'), 403, 'You do not have enough permissions');
                User::where('id', '=', $request->user_id)->update(['password' => Hash::make($request->password)]);
            } else {
                User::where('id', '=', Auth::user()->id)->update(['password' => Hash::make($request->password)]);
            }
            return redirect()->back()->with('success', "Password change successfull");
        } else {
            return redirect()->back()->with('error', "Incorrect your current password");
        }
    }
    public function edit(User $user){
        abort_unless(Gate::allows('register-users'), 403, 'You do not have enough permissions');
        return view('auth.edit',compact('user'));
    }
    public function update(Request $request, User $user){
        abort_unless(Gate::allows('register-users'), 403, 'You do not have enough permissions');
        $user->fill($request->all());
        $user->save();
        return redirect()->route('list.index')->with('success',"User Updated");
    }
}
