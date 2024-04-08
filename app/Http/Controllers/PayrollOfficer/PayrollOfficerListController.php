<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PayrollList;
use App\Models\CompanyDoor;

use Session;
use DB;

class PayrollOfficerListController extends Controller
{
    public function fetchData(Request $request)
    {


        $user_id = session('user')['current_user_id'];

        $data = collect(PayrollList::where([
            ['user_id', '=' , $user_id]
        ])
        ->select('company_door_id')
        ->get());

        
        

        
        // $company_door = DB::table('payroll_lists')
        // ->leftJoin('company_doors', 'company_doors.id', '=', 'payroll_lists.id')
        // //->select('company_doors.store_name',  "AS get_name"), 'company_doors.coordinator_id')
        // //->where('company_doors.id', $id)
        // ->first();

      //  $models = CompanyDoor::findMany($data);

        // $models = DB::table('company_doors')
        // ->whereIn('id', $data)
        // ->get();

        $models = DB::table('manning_lists')
        ->join('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
        ->join('company_doors', 'manning_lists.door_id', '=', 'company_doors.id')
        ->join('companies', 'manning_lists.company_id', '=', 'companies.id')
        ->select('manning_lists.*' , 'merchandisers.first_name as fname' , 'merchandisers.middle_name as mname' , 'merchandisers.last_name as lname' , 'company_doors.store_name as store_name' , 'companies.name as company_name', 'company_doors.account as account_name'  )
        ->whereIn('door_id', $data)
        ->get();

        

        // $models = $models->map(function ($item, $key){
        //     $item['#'] = $key + 1;
        //     $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">  ';
            
        //     return $item;
        // });

        $models = $models->map(function ($item, $key){
            $item = (array)$item;

            $item['#'] = $key +1;

            $item['account_name'] = $item['account_name'];
            $item['fname'] = $item['fname'];
            $item['mname'] = $item['mname'];
            $item['lname'] = $item['lname'];
            $item['store_name'] = $item['store_name'];
            $item['company_name'] = $item['company_name'];

            //<!-- 11-03-2024 new code added starts here -->
            $item['actions'] = '<i class="ri-bank-card-line" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';
            
            return $item;   
        });

        return response()->json(['dataone' => $models]);
    }


    protected function getViewMerchandiserManning($id){

        $company_door = DB::table('manning_lists')
        ->leftJoin('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
        ->select('manning_lists.*' , 'merchandisers.first_name as fname' , 'merchandisers.middle_name as mname' , 'merchandisers.last_name as lname' )
        ->where('door_id', $id)
        ->get();



        $company_door = $company_door->map(function ($item) {
            $item = (array)$item; 
        
          
            $item['fname'] = $item['fname'];
            $item['mname'] = $item['mname'];
            $item['lname'] = $item['lname'];

            //<!-- 11-03-2024 new code added starts here -->
            $item['actions'] = '<i class="bi bi-x-circle-fill" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';
            
            //
            //
            
            //<!-- 11-03-2024 new code added ends here -->
            return $item;
        });

        return response()->json(['data' => $company_door]);


    }



}
