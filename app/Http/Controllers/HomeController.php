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
        $company=CompanyInfo::latest()->paginate(5);
        $currentdate=nepalicurrenntdate();
        $documentincomplete=DB::table('documentreports')->join('company_infos','documentreports.company_id','=','company_infos.id')->select('documentreports.*','company_infos.name','company_infos.contact_no','company_infos.reg_date')->Where('documentreports.status', 'like', "incomplete")->orderBy('company_infos.reg_date')->paginate(5);
         $documentcomplete=Documentreport::Where('documentreports.status', 'like', "complete")->count();
        
         $namechangeincomplete =Namechange::Where('status', '=', "incomplete")->orderBy('change_date')->paginate(9);
          $namechangecomplete =Namechange::Where('status', '=', "complete")->count();

        $notaudited = Auditreport::Join('company_infos', 'auditreports.company_id', '=', 'company_infos.id')->select('company_infos.name', 'company_infos.contact_no', 'auditreports.*')->where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '!=', "$fiscal->fiscal")->paginate(5);
        $audited = Auditreport::where('auditreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('auditreport_fiscal', '=', "$fiscal->fiscal")->count();
       
        $notrenewed = Renewreport::Join('company_infos','renewreports.company_id','=','company_infos.id')->select('company_infos.name','company_infos.contact_no','renewreports.*')->where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('renewreport_fiscal', '!=', "$fiscal->fiscal")->paginate(9);
        $renewed = Renewreport::where('renewreport_reg_fiscal', '!=', "$fiscal->fiscal")->where('renewreport_fiscal', '=', "$fiscal->fiscal")->count();

        return view('home')
        ->with(['company'=>$company,
        'documentincomplete'=>$documentincomplete,
        'documentcomplete'=>$documentcomplete,
        'namechangeincomplete'=>$namechangeincomplete,
        'namechangecomplete'=>$namechangecomplete,
        'notaudited'=>$notaudited,
        'audited'=>$audited,
        'notrenewed'=>$notrenewed,
        'renewed'=>$renewed,
        'currentdate'=>$currentdate
        ]);
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
