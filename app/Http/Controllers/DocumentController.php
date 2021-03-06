<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use App\Document;
use App\Documenttype;
use App\Http\Requests\documentrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(documentrequest $request)
    {
        $request->all();
        $baseDir = 'upload/documents/' . date('Y') . '/' . date('M');
        //$baseDir = 'upload/documents';
        $imgPath = Storage::putFile($baseDir, $request->file('file'));

        //     $path=public_path().'/upload/doc';
        //     if(File::exists($path)){
        //         File::makeDirectory($path,0777,true,true);
        //     }
        //     $file_name="doc-".date("Ymdhis").rand(0,9999).".".$request->file->getClientOriginalExtension();
        //    $request->file->move($path,$file_name);
        //   $data['file']=$file_name;

        $document = new Document([
            'file' => $imgPath,
            'type' => $request->type,
            'company_id' => $request->company_id
        ]);

        $document->save();

        return redirect()->back()->with('success', 'Document has been uploaded successfully.');

        // $status = Document::create($data);
        // if($status){
        //  $request->session()->flash('success','Upload Successfully');
        //}else{
        //    $request->session()->flash('error','While Uploading');
        // }

        //  return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($document)
    {
        $documenttype=Documenttype::get();
        $company_id = $document;
        $data = Document::where('company_id','=',"$document")->get();
        return view('document.index')->with('company_id', $company_id)->with('document', $data)->with('documenttype',$documenttype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        // $document = Document::findOrFail($document);
        // dd($document);
        Storage::delete($document->file);
        $document->delete();


        return redirect()->back()->with('success', 'Record Deleted');
    }
}
