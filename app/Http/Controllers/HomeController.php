<?php

namespace App\Http\Controllers;

use App\Auditreport;
use App\CompanyInfo;
use App\Documentreport;
use App\Namechange;
use App\Renewreport;
use App\Setdate;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fiscal = Setdate::first();
        if ($fiscal == null) {
            return view('setting.setdate')->with('setdate',$fiscal);
        }
        $company=CompanyInfo::count();
        $documentincomplete=Documentreport::Where('documentreports.status', 'like', "incomplete")->count();
        $documentcomplete=Documentreport::Where('documentreports.status', 'like', "complete")->count();
        $namechangeincomplete =Namechange::Where('status', '=', "incomplete")->count();
        $namechangecomplete =Namechange::Where('status', '=', "complete")->count();
        $notaudited = Auditreport::where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '!=', "$fiscal->fiscal")->count();
        $audited = Auditreport::where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '=', "$fiscal->fiscal")->count();
        $notrenewed = Renewreport::where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('renewreport_fiscal', '!=', "$fiscal->fiscal")->count();
        $renewed = Renewreport::where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('renewreport_fiscal', '=', "$fiscal->fiscal")->count();

        return view('home')
        ->with('company', $company)
        ->with('documentincomplete',$documentincomplete)
        ->with('documentcomplete',$documentcomplete)
        ->with('namechangeincomplete',$namechangeincomplete)
        ->with('namechangecomplete',$namechangecomplete)
        ->with('notaudited',$notaudited)
        ->with('audited',$audited)
        ->with('notrenewed',$notrenewed)
        ->with('renewed',$renewed);
    }
    function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('company_infos')
                    ->where('name', 'like', '%' . $query . '%')
                    ->get();
            } else {
                $data = DB::table('company_infos')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        
         <option>' . $row->name . '</option>
      
        ';
                }
            }
            $data = array(
                'table_data'  => $output,
                //'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
