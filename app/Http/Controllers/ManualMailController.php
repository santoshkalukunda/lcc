<?php

namespace App\Http\Controllers;

use App\Auditreport;
use App\CompanyInfo;
use App\Custommail;
use App\Documentreport;
use App\Namechange;
use App\Notifications\AllDocumentReportNotification;
use App\Notifications\AllNameChangeNotification;
use App\Notifications\AllShareholderNotification;
use App\Notifications\AuditNotification;
use App\Notifications\CompanyShareholderNotification;
use App\Notifications\DocumentNotification;
use App\Notifications\NameChangeNotification;
use App\Notifications\RenewNotification;
use App\Renewreport;
use App\Setdate;
use App\Shareholder;
use App\Thresholddate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ManualMailController extends Controller
{
  public function namechangemail(Request $request, $company_id)
  {
    $shareholders = Shareholder::where('company_id', '=', $company_id)->get();
    $namechange = Namechange::where('company_id', '=', $company_id)->latest()->firstOrFail();
    $date1 = date_create($namechange->change_date);
    $date2 = date_create(nepalicurrenntdate());
    $diff = date_diff($date1, $date2);
    $day = $diff->format('%a');
    $remaining = 30 - $day;
    $namechange['remaining'] = $remaining;
    Notification::send($shareholders, new NameChangeNotification($namechange));
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function allnamechangemail(Request $request)
  {
    $date=nepalicurrenntdate();
    $namechange = Namechange::where('status', '=', "incomplete")->get();
    foreach($namechange as $item){
      $date1 = date_create($item->change_date);
      $date2 = date_create($date);
      $diff = date_diff($date1, $date2);
      $day = $diff->format('%a');
      $remaining = 30 - $day;
      $shareholders = Shareholder::where('company_id', '=', $item->company_id)->get();
      Notification::send($shareholders, new AllNameChangeNotification($item,$remaining));
    }
    return redirect()->back()->with('success', "Mail Sent");
  }
 
  public function documentreportmail(Request $request, $company_id)
  {
    $shareholders = Shareholder::where('company_id', '=', $company_id)->get();
    $documentreport = Documentreport::where('company_id', '=', $company_id)->latest()->firstOrFail();
    $company=CompanyInfo::where('id', '=', $company_id)->latest()->firstOrFail();

    $date1 = date_create($company->reg_date);
    $date2 = date_create(nepalicurrenntdate());
    $diff = date_diff($date1, $date2);
    $day = $diff->format('%a');
    $remaining = 90 - $day;
    $documentreport['remaining'] = $remaining;
    Notification::send($shareholders, new DocumentNotification($documentreport));
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function alldocumentreportmail()
  {
    $documentreport = Documentreport::where('status', '=', "incomplete")->get();
     $date=nepalicurrenntdate();
    foreach($documentreport as $item){
      $shareholders = Shareholder::where('company_id', '=', $item->company_id)->get();
      $company=CompanyInfo::where('id', '=', $item->company_id)->latest()->firstOrFail();
      $date1 = date_create($company->reg_date);
      $date2 = date_create($date);
      $diff = date_diff($date1, $date2);
      $day = $diff->format('%a');
      $remaining = 90 - $day;
      Notification::send($shareholders, new AllDocumentReportNotification($item,$remaining));
    }
    
    return redirect()->back()->with('success', "Mail Sent");
  }

  public function auditreportmail(Request $request, $company_id)
  {
    $shareholders = Shareholder::where('company_id', '=', $company_id)->get();
    $thesholddate=Thresholddate::firstOrFail();
    if ($thesholddate == null) {
      return view('setting.thresholddate')->with('thresholddate',$thesholddate);
   }
    Notification::send($shareholders, new AuditNotification($thesholddate));
    
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function allauditreportmail()
  {
    $fiscal = Setdate::first();
    $thesholddate=Thresholddate::firstOrFail();
    if ($thesholddate == null) {
      return view('setting.thresholddate')->with('thresholddate',$thesholddate);
   }
    $auditreport=Auditreport::where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '!=', "$fiscal->fiscal")->get();
    foreach($auditreport as $item){
      $shareholders = Shareholder::where('company_id', '=', $item->company_id)->get();
      Notification::send($shareholders, new AuditNotification($thesholddate));
    }
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function renewreportmail(Request $request, $company_id)
  {
    $shareholders = Shareholder::where('company_id', '=', $company_id)->get();
    $thesholddate=Thresholddate::firstOrFail();
    if ($thesholddate == null) {
      return view('setting.thresholddate')->with('thresholddate',$thesholddate);
   }
    Notification::send($shareholders, new RenewNotification($thesholddate));
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function allrenewreportmail()
  {
    $fiscal = Setdate::first();
    $thesholddate=Thresholddate::firstOrFail();
    if ($thesholddate == null) {
      return view('setting.thresholddate')->with('thresholddate',$thesholddate);
   }
    $renewreport=Renewreport::where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('renewreport_fiscal', '!=', "$fiscal->fiscal")->get();
    foreach($renewreport as $item){
      $shareholders = Shareholder::where('company_id', '=', $item->company_id)->get();
      Notification::send($shareholders, new RenewNotification($thesholddate));
    }
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function comapanyshareholdermail(Request $request, $company_id)
  {
     $data=$request->all();
    $data['user_id']=Auth::user()->id;
    $data['to']=$company_id;
    $mail=Custommail::create($data); 
    $shareholders = Shareholder::where('company_id', '=', $company_id)->get();
    Notification::send($shareholders, new CompanyShareholderNotification($mail));
    return redirect()->back()->with('success', "Mail Sent");
  }
  public function allshareholdermail(Request $request)
  {
     $data=$request->all();
    $data['user_id']=Auth::user()->id;
    $mail=Custommail::create($data); 
    $shareholders = Shareholder::get();
    Notification::send($shareholders, new AllShareholderNotification($mail));
    return redirect()->back()->with('success', "Mail Sent");
  }
}
