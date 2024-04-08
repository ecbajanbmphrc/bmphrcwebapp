<?php

namespace App\Http\Controllers\PayrollHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manning;

use App\Models\CompanyDoor;

use DB;

class PayrollHeadEfcListController extends Controller
{
    public function fetchData(Request $request)
    {     
       
    

        $data = CompanyDoor::where([
            ['company_id', '=' , 3],
            ['status', '=' , 'active'] , 
            ['id' , '<>' , 1]
            ])->get();

        $data = $data->map(function ($item, $key) {

            
            $item['#'] = $key + 1;
            //
            $item['checkbox'] = '<input type="checkbox" class="transfer">';

            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">';
            //
            return $item;
        });

        return response()->json(['data' => $data]);
    }

    public function transferEfcPayroll(Request $request){

        
        $array = collect($request->ids);
        // $data = array(
        //     "title" => "hello",
        //     "description" => "test test test"
        //   );
      

        // $name = array();
        // foreach($id_array as $d){

           
        //     $name = $d;
         
        // }

        // dd($data);

        // $id_array = $id_array->map(function ($item, $key) {

            
        //     $item['#'] = $key + 1;
        //     //
        //     $item['checkbox'] = '<input type="checkbox" class="transfer">';

        //     $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">';
        //     //
        //     return $item;
        // });
        

        //return response()->json([$id_array]);
       // dd($id_array);

    //    $array = collect([
    //     4,
    //     9
    // ]);
    
    // Given sample collection
    // Given array
//$array = [4, 9];
$samplecollect = ['id', 'user_id', 'company_door_id'];

// Initialize an empty array to hold the result
$data = [];

// Iterate over the $array
foreach ($array as $value) {
    // Combine the value with the corresponding key from $samplecollect
    $data[] = [
        'id' => $request->user_id . $value, 
        'company_door_id' => $value,
        'user_id' => $request->user_id
    ];
}

// Upsert the data into the database table
DB::table('payroll_lists')->upsert($data, [ 'company_door_id' , 'user_id']);

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

        $efcpayrollhead_array = [0 => "None"];

        $company_me =  session('user')['company_id'];
      
        // $coordinators = Coordinator::where('first_name', '!=', 'none')
        // // ->select('name', 'id')
        // ->pluck('first_name' , 'id')
        // ->toArray();


        $efcpayrollhead = Payrollofficer::
        select(DB::raw("CONCAT(first_name ,' ', last_name) AS display_name"),'id')
        ->get()
        ->pluck('display_name','id')
        ->toArray();



         $efc_payrollhead_array += $coordinators;


        // dd($coordinator_array);
    
    
       return view('payrollhead.view.efcpayrollhead' , compact('efc_payrollhead_array' ));

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
