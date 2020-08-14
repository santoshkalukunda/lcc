<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
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
    
        return view('home');
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
