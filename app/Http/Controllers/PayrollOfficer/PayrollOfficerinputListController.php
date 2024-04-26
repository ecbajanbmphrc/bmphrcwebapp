<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PayrollInput;
use App\Models\CompanyDoor;

use Session;
use DB;

class PayrollOfficerInputListController extends Controller
    {
        // public function fetchData(Request $request)
        // {
        //     $data = CompanyDoor::where([
        //         ['status', '=' , 'active'],
        //         ['id', '<>' , 1]
        //     ])->get();

        //     $data = $data->map(function ($item, $key){
        //         $item['#'] = $key + 1;
        //         $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">  ';
                
        //         return $item;
        //     });
        //     return response()->json(['dataone' => $data]);
        // }
        public function fetchData(Request $request)
            {
                // $user_id = session('user')['current_user_id'];
                // $data = collect(PayrollInput::select('company_door_id')
                // ->get());

                // $models = DB::table('manning_lists')
                //     ->leftJoin('coordinators', 'manning_lists.coordinator_id', '=', 'coordinators.id')
                //     ->leftJoin('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
                //     ->leftJoin('company_doors as region_doors', 'manning_lists.region_id', '=', 'region_doors.id')
                //     ->leftJoin('company_doors as store_doors', 'manning_lists.store_name_id', '=', 'store_doors.id')
                //     ->select(
                //         'manning_lists.*',
                //         'coordinators.first_name as coordinator_first_name',
                //         'coordinators.middle_name as coordinator_middle_name',
                //         'coordinators.last_name as coordinator_last_name',
                //         'merchandisers.first_name as merchandiser_first_name',
                //         'merchandisers.middle_name as merchandiser_middle_name',
                //         'merchandisers.last_name as merchandiser_last_name'
                //     )
                //     ->where('region_doors.door_id', $request->input('region_id')) 
                //     ->where('coordinators.id', $request->input('coordinator_id'))   
                //     ->where('region_doors.id', $request->input('region_id')) 
                //     ->where('store_doors.id', $request->input('store_code_id')) 
                //     ->get();
                
                // $models = $models->map(function ($item, $key){
                //     $item = (array)$item;
                //     $item['#'] = $key +1;
                //     $item['account_name'] = $item['account_name'];
                //     $item['fname'] = $item['fname'];
                //     $item['mname'] = $item['mname'];
                //     $item['lname'] = $item['lname'];
                //     $item['store_name'] = $item['store_name'];
                //     $item['company_name'] = $item['company_name'];
                //     $item['actions'] = '<i class="ri-bank-card-line" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';

                //     return $item;
                // });

                $user_id = session('user')['current_user_id'];

                $door_list  = DB::table('payroll_lists')
                    ->where('user_id' , '=', $user_id)
                    ->join('company_doors', 'payroll_lists.company_door_id' , '=' , 'company_doors.id')
                    ->select('company_doors.id as store_id')
                    ->pluck('store_id')
                    ->toArray();
                     

                $payroll_list = DB::table('manning_lists')
                ->whereIn('door_id' , $door_list) 
                ->select('merchandiser_id')
                ->pluck('merchandiser_id')
                ->toArray();

                $merchandiser_list = DB::table('merchandisers')
                ->whereIn('id' , $payroll_list)
                ->get();
                
            

                return response()->json(['dataone' => $merchandiser_list]);
            }
            

            protected function getViewMerchandiserManning($id)
            {
                $company_door = DB::table('manning_lists')
                ->leftJoin('coordinators', 'manning_lists.coordinator.id', '=' , 'coordinator.id')
                ->select('manning_lists.*' , 'coordinators.first_name as fname' , 'coordinators.middle_name as mname' , 'coordinators.last_name as lname' )
                ->leftJoin('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
                ->select('manning_lists.*' , 'merchandisers.first_name as fname' , 'merchandisers.middle_name as mname' , 'merchandisers.last_name as lname' )
                ->where('door_id', $id)
                ->get();
                
                $company_door = $company_door->map(function($item){
                    $item = (array) $item;
                    $item['fname'] = $item ['fname'];
                    $item['mname'] = $item ['mname'];
                    $item['lname'] = $item ['lname'];
                    $item['actions'] = '<i class="bi bi-x-circle-fill" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';
                    
                    
                    return $item;
                });
                
                    return response()->json(['data' => $company_door]);;
            }
    }
