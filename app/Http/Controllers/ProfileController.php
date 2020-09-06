<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=Profile::get();
        return view('profile.index')->with('profile',$profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Profile::count();
        $data=$request->all();
        if($count<1){
        $baseDir = 'upload/logo/' . date('Y') . '/' . date('M');
        $imgPath = Storage::putFile($baseDir, $request->file('logo'));
        $data['logo']= $imgPath; 
        Profile::create($data); 
        return redirect('profile')->with('success', 'Company Profile Created successfully.');
    }else{
        return redirect('profile')->with('success', 'Company Profile Already Created');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
       return view('profile.edit')->with(['profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $data=$request->all();
   
        if($request->logo== null){
            $profile->fill($data);
            $profile->save();
        }else{
            Storage::delete($profile->logo);
            $baseDir = 'upload/logo/' . date('Y') . '/' . date('M');
            $imgPath = Storage::putFile($baseDir, $request->file('logo'));
            $data['logo']= $imgPath; 
            $profile->fill($data);
            $profile->save();
        }
        return redirect('profile')->with('success', 'Company Profile updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        Storage::delete($profile->logo);
        $profile->delete();
        return redirect()->back()->with('success', 'Record Deleted');
    }
}
