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
                
                $merchandiser_list =  $merchandiser_list->map(function($item){
                    $item = (array) $item;
                    $item['full_name'] = $item ['first_name'] . " " . $item['last_name'] ;
                    
                    // $item['actions'] = '<i class="bi bi-x-circle-fill" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';
                    $item['input_with_rate_increase'] = '<input type="text" class="input_table"/>';
                    $item['input_actual_days_rendered'] = '<input type="text" class="input_table"/>';
                    $item['input_wri_actual_days_rendered'] = '<input type="text" class="input_table"/>';
                    $item['input_late_min'] = '<input type="text" class="input_table"/>';
                    $item['input_wri_late_min'] = '<input type="text" class="input_table"/>';
                    $item['no_of_hour'] = '<input type="text" class="input_table readonly"/>';
                    $item['input_wri_no_of_hour'] = '<input type="text" class="input_table"/>';
                    $item['input_sub_total_pay'] = '<input type="text" class="input_table"/>';
                    $item['input_wri_sub_total_pay'] = '<input type="text"class="input_table"/>';                   
                    $item['total_pay'] = '<input type="text" class="input_table> readonly';
                    return $item;
                });

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
                  
                    
                    
                    return $item;
                });
                
                    return response()->json(['data' => $company_door]);;
            }


            // new code added
            // public function calculatePay()
            // {
            //     // Assuming the following values
            //     $dailyRate = 610;
            //     $daysRendered = 10;
            //     $hoursPerDay = 8;

            //     // Calculate values
            //     $withRateIncrease = $dailyRate * $daysRendered;
            //     $actualDaysRendered = $daysRendered;
            //     $wriActualDaysRendered = $daysRendered;
            //     $lateMins = 0; // Assuming no late minutes for now
            //     $wriLateMins = 0; // Assuming no late minutes for now
            //     $numberOfHours = $daysRendered * $hoursPerDay;
            //     $wriNumberOfHours = $daysRendered * $hoursPerDay;
            //     $subTotalPay = $dailyRate * $daysRendered;
            //     $wriSubTotalPay = $dailyRate * $daysRendered;
            //     $totalPay = $subTotalPay; // Assuming no difference in total pay for now

            //     // Pass data to view
            //     return view('payroll.index', compact('withRateIncrease', 'actualDaysRendered', 'wriActualDaysRendered', 'lateMins', 'wriLateMins', 'numberOfHours', 'wriNumberOfHours', 'subTotalPay', 'wriSubTotalPay', 'totalPay'));
            // }
    }
