<?php

namespace App\Http\Controllers\PayrollHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manning;

use App\Models\CompanyDoor;

use DB;

class PayrollHeadMckenzieListController extends Controller
{
    public function fetchData(Request $request)
    {     
       
    

        $data = CompanyDoor::where([
            ['company_id', '=' , 2],
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

    // public function viewDoor()
    // {
    //     $efcPayrollheadArray = ['None'];
 
    //     $efcPayrollheads = Payrollofficer::pluck(DB::raw("CONCAT(first_name, ' ', last_name) AS display_name"), 'id')->toArray();

    //     $efcPayrollheadArray += $efcPayrollheads;

    //     return view('payrollhead.view.efcpayrollhead', compact('efcPayrollheadArray'));
    // }




  

    public function view_door(){

        $mckenziepayrollhead_array = [0 => "None"];

        $company_me =  session('user')['company_id'];
      
        // $coordinators = Coordinator::where('first_name', '!=', 'none')
        // // ->select('name', 'id')
        // ->pluck('first_name' , 'id')
        // ->toArray();


        $mckenziepayrollhead = Payrollofficer::
        select(DB::raw("CONCAT(first_name ,' ', last_name) AS display_name"),'id')
        ->get()
        ->pluck('display_name','id')
        ->toArray();



         $mckenzie_payrollhead_array += $coordinators;


        // dd($coordinator_array);
    
    
       return view('payrollhead.view.mckenziepayrollhead' , compact('mckenzie_payrollhead_array' ));

    }


    // public function view_door(){

    //     $efcpayrollhead_array = [0 => "None"];
    
    //     $company_me =  session('user')['company_id'];
      
    //     $efcpayrollhead = Payrollofficer::
    //     select(DB::raw("CONCAT(first_name ,' ',  last_name) AS display_name"),'id')
    //     ->get()
    //     ->pluck('display_name','id')
    //     ->toArray();
    
    //     $efcpayrollhead_array += $efcpayrollhead;
    
    //    return view('payrollhead.view.efcpayrollhead', compact('efcpayrollhead_array'));
    
    // }
    


}
