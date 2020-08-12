<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;

class CompanyDocumentController extends Controller
{
    public function index(CompanyInfo $companyInfo)
    {
        $companyInfo->load('documents');
        // return $companyInfo;
        return view('document.index', compact('companyInfo'));
    }
}
