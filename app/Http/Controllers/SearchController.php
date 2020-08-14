<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function index()
    {
        return view('dashboard');
    }

    function action(Request $request)
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
