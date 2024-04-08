<?php

namespace App\Http\Controllers\PayrollHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manning;

use App\Models\CompanyDoor;

use DB;

class PayrollHeadMagisListController extends Controller
{
    public function fetchData(Request $request)
    {     
       
    

        $data = CompanyDoor::where([
            ['company_id', '=' , 4],
            ['status', '=' , 'active'] , 
            ['id' , '<>' , 1]
            ])->get();

        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;
            //
   
            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">';
            //
            return $item;
        });

        return response()->json(['data' => $data]);
    }



    // new code added starts here 
    // payroll officer functions

    public function viewDoor()
    {
        $magisPayrollheadArray = ['None'];

        $magisPayrollheads = Payrollofficer::pluck(DB::raw("CONCAT(first_name, ' ', last_name) AS display_name"), 'id')->toArray();

        $magisPayrollheadArray += $magisPayrollheads;

        return view('payrollhead.view.magispayrollhead', compact('magisPayrollheadArray'));
    }

    public function view_magis_payrollhead(){

        

        $company_me =  session('user')['company_id'];

        $merchandiser_count = Merchandiser::
        where([
            'company_id'  => $company_me,
            'is_active' => '1' 
     ])
        ->count();

        $store_count = CompanyDoor::
        where([
            'company_id'  => $company_me,
            'status' => 'active' 
     ])
        ->count();

        $coordinator_count = Coordinator::
        where('company_id' , '='  , $company_me) 
        ->count();
    
       return view('accountsupervisor.dashboard', compact('merchandiser_count', 'store_count' , 'coordinator_count' ));

    }

    public function view_door(){

        $magispayrollhead_array = [0 => "None"];

        $company_me =  session('user')['company_id'];
      
        // $coordinators = Coordinator::where('first_name', '!=', 'none')
        // // ->select('name', 'id')
        // ->pluck('first_name' , 'id')
        // ->toArray();


        $rfmpayrollhead = Payrollofficer::
        select(DB::raw("CONCAT(first_name ,' ',  last_name) AS display_name"),'id')
        ->get()
        ->pluck('display_name','id')
        ->toArray();



         $magis_payrollhead_array += $coordinators;


        // dd($coordinator_array);
    
    
       return view('payrollhead.view.magispayrollhead' , compact('magis_payrollhead_array' ));

    }


}
