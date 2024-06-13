<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PayrollInput;
use App\Models\CompanyDoor;
use App\Models\TransactionList;

use Session;
use DB;

class PayrollOfficerInputListController extends Controller
    {
        public function fetchData(Request $request)
            {
                $user_id = session('user')['current_user_id'];

                $user_type = session('user')['company_id'];

                $door_list  = DB::table('payroll_lists')
                    ->where('user_id' , '=', $user_id)
                    // ->select('company_doors_id')
                    ->pluck('company_door_id')
                    ->toArray();

                  

                $manning_list = DB::table('manning_lists')   
                    ->whereIn('door_id' , $door_list)
                    ->join('company_doors', 'company_doors.id' , '=' , 'door_id')
                    ->join('merchandisers' , 'merchandisers.id' , '=' , 'merchandiser_id')
                    ->join('coordinators' , 'coordinators.id' , '=' , 'company_doors.coordinator_id' )
                    ->join('rate_cards', 'rate_cards.region', '=' , 'company_doors.region')
                    ->select('merchandisers.first_name as  merchandiser_fname' , 'merchandisers.middle_name as  merchandiser_mname' , 'merchandisers.last_name as  merchandiser_lname', 
                    'coordinators.first_name as coordinator_fname', 'coordinators.middle_name as coordinator_mname', 'coordinators.last_name as coordinator_lname' ,'account' , 'store_name', 
                    'company_doors.region' , 'rate_cards.rate_per_day as ratings', 'rate_cards.new_rate_per_day as newratings' )
                    ->get();

             
                                
                //  dd($manning_list);
                
                $manning_list =  $manning_list->map(function($item){
                    $item = (array) $item;
                    $item['merchandiser_fullname'] = $item['merchandiser_fname'] ." ". $item['merchandiser_mname'] ." ". $item['merchandiser_lname'];
                    $item['coordinator_fullname'] = $item['coordinator_fname'] ." ". $item['coordinator_mname'] ." ". $item['coordinator_fname'] ;
                    
                    $item['actions'] = '<img src= "/asset/img/button_img/arrow.png" alt="Button 1" class="arrow-button" style="height: 25px; width: 25px;"></img>';
                    $item['input_with_rate_increase'] = '<input type="text" class="input_table"/>';
                    $item['input_actual_days_rendered'] = '<input type="text" class="input_table"/>';
                    $item['input_wri_actual_days_rendered'] = '<input type="text" class="input_table"/>';
                    $item['input_late_min'] = '<input type="text" class="input_table"/>';
                    $item['input_wri_late_min'] = '<input type="text" class="input_table"/>';
                    $item['input_no_of_hour'] = '<input type="text" class="input_table readonly"/>';
                    $item['input_wri_no_of_hour'] = '<input type="text" class="input_table"/>';
                    $item['input_sub_total_pay'] = '<input type="text" class="input_table"/>';
                    $item['input_wri_sub_total_pay'] = '<input type="text"class="input_table"/>';                   
                    $item['total_pay'] = '<input type="text" class="input_table> readonly';
                    return $item;
                });

                return response()->json(['dataone' => $manning_list]);
            }



            public function saveData(Request $request) {

                $dataTable = $request->input('dataTable');

                // dd($request->all()); 
                
                    $transaction_list = new TransactionList;

                    // Data from datatable
                    $transaction_list->account = $request->input( 'account');
                    $transaction_list->hc = (1);
                    $transaction_list->coordinator = $request->input('coordinator_fullname');
                    $transaction_list->employee_name = $request->input('merchandiser_fullname');
                    $transaction_list->handled_store = $request->input('store_name');
                    $transaction_list->region = $request->input('region');

                

                // data from form
                // first row
                $transaction_list ->actual_days_rendered = $request->input('p_actual_rendered_day');
                $transaction_list ->actual_days_rendered_wri = $request->input('p_actual_rendered_day_wri');
                $transaction_list ->total_hours = $request->input('p_total_hours');
                $transaction_list ->total_hours_wri = $request->input('p_total_hours_wri');
                $transaction_list ->sil_13th_month = $request->input('p_sil');
                $transaction_list ->thirteen_month = $request->input('p_month');
                // special rates
                $transaction_list ->special_rates_special_holiday = $request->input('p_special_rates_special_holiday');
                $transaction_list ->special_rates_wdo = $request->input('p_special_rates_wdo');
                $transaction_list ->special_rates_special_holiday_falling_on_rest_day = $request->input('p_special_rates_special_holiday_falling_on_rest_day');
                $transaction_list ->special_rates_legal_holiday = $request->input('p_special_rates_legal_holiday');
                $transaction_list ->special_rates_legal_holiday_falling_on_rest_day = $request->input('p_special_rates_legal_holiday_falling_on_rest_day');
                $transaction_list ->special_rates_double_pay = $request->input('p_special_rates_double_pay');
                $transaction_list ->special_rates_double_pay_falling_on_rest_day = $request->input('p_special_rates_double_pay_falling_on_rest_day');
                // overtime
                $transaction_list ->overtime_regular_day = $request->input('p_overtime_regular_day');
                $transaction_list ->overtime_special_holiday = $request->input('p_overtime_special_holiday');
                $transaction_list ->overtime_wdo = $request->input('p_overtime_wdo');
                $transaction_list ->overtime_special_holiday_falling_on_rest_day = $request->input('p_overtime_special_holiday_falling_on_rest_day');
                $transaction_list ->overtime_legal_holiday = $request->input('p_overtime_legal_holiday');
                $transaction_list ->overtime_legal_holiday_falling_on_rest_day = $request->input('p_overtime_legal_holiday_falling_on_rest_day');
                $transaction_list ->overtime_double_pay = $request->input('p_overtime_double_pay');
                $transaction_list ->overtime_double_pay_falling_on_rest_day = $request->input('p_overtime_double_pay_falling_on_rest_day');
                // night differential
                $transaction_list ->night_differential_regular_day = $request->input('p_night_differenatial_regular_day');
                $transaction_list ->night_differential_special_holiday = $request->input('p_night_differenatial_special_holiday');
                $transaction_list ->night_differential_wdo = $request->input('p_night_differenatial_wdo');
                $transaction_list ->night_differential_special_holiday_falling_on_rest_day = $request->input('p_night_differenatial_special_holiday_falling_on_rest_day');
                $transaction_list ->night_differential_legal_holiday = $request->input('p_night_differenatial_legal_holiday');
                $transaction_list ->night_differential_legal_holiday_falling_on_rest_day = $request->input('p_night_differenatial_legal_holiday_falling_on_rest_day');
                $transaction_list ->night_differential_double_pay = $request->input('p_night_differenatial_double_pay');
                $transaction_list ->night_differential_double_pay_falling_on_rest_day = $request->input('p_night_differenatial_double_pay_falling_on_rest_day');
                // overtime with night differential
                $transaction_list ->overtime_with_night_differential_regular_day = $request->input('p_overtime_with_night_differential_regular_day');
                $transaction_list ->overtime_with_night_differential_special_holiday = $request->input('p_overtime_with_night_differential_special_holiday');
                $transaction_list ->overtime_with_night_differential_wdo = $request->input('p_overtime_with_night_differential_wdo');
                $transaction_list ->overtime_with_night_differential_special_holiday_rest_day = $request->input('p_overtime_with_night_differential_special_holiday_falling_on_rest_day');
                $transaction_list ->overtime_with_night_differential_legal_holiday = $request->input('p_overtime_with_night_differential_legal_holiday');
                $transaction_list ->overtime_with_night_differential_legal_holiday_rest_day = $request->input('p_overtime_with_night_differential_legal_holiday_falling_on_rest_day');
                $transaction_list ->overtime_with_night_differential_double_pay = $request->input('p_overtime_with_night_differential_double_pay');
                $transaction_list ->overtime_with_night_differential_double_pay_rest_day = $request->input('p_overtime_with_night_differential_double_pay_falling_on_rest_day');


                // with rate increase starts here
                // special rates (wri)
                $transaction_list ->special_rates_special_holiday_wri = $request->input('p_special_rates_special_holiday_wri');
                $transaction_list ->special_rates_wdo_wri = $request->input('p_special_rates_wdo_wri');
                $transaction_list ->special_rates_special_holiday_falling_on_rest_day_wri = $request->input('p_special_rates_special_holiday_falling_on_rest_day_wri');
                $transaction_list ->special_rates_legal_holiday_wri = $request->input('p_special_rates_legal_holiday_wri');
                $transaction_list ->special_rates_legal_holiday_falling_on_rest_day_wri = $request->input('p_special_rates_legal_holiday_falling_on_rest_day_wri');
                $transaction_list ->special_rates_double_pay_wri = $request->input('p_special_rates_double_pay_wri');
                $transaction_list ->special_rates_double_pay_falling_on_rest_day_wri = $request->input('p_special_rates_double_pay_falling_on_rest_day_wri');
                // overtime (wri)
                $transaction_list ->overtime_regular_day_wri = $request->input('p_overtime_regular_day_wri');
                $transaction_list ->overtime_special_holiday_wri = $request->input('p_overtime_special_holiday_wri');
                $transaction_list ->overtime_wdo_wri = $request->input('p_overtime_wdo_wri');
                $transaction_list ->overtime_special_holiday_falling_on_rest_day_wri = $request->input('p_overtime_special_holiday_falling_on_rest_day_wri');
                $transaction_list ->overtime_legal_holiday_wri = $request->input('p_overtime_legal_holiday_wri');
                $transaction_list ->overtime_legal_holiday_falling_on_rest_day_wri = $request->input('p_overtime_legal_holiday_falling_on_rest_day_wri');
                $transaction_list ->overtime_double_pay_wri = $request->input('p_overtime_double_pay_wri');
                $transaction_list ->overtime_double_pay_falling_on_rest_day_wri = $request->input('p_overtime_double_pay_falling_on_rest_day_wri');
                // night differential (wri)
                $transaction_list ->night_differential_regular_day_wri = $request->input('p_night_differenatial_regular_day_wri');
                $transaction_list ->night_differential_special_holiday_wri = $request->input('p_night_differenatial_special_holiday_wri');
                $transaction_list ->night_differential_wdo_wri = $request->input('p_night_differenatial_wdo_wri');
                $transaction_list ->night_differential_special_holiday_falling_on_rest_day_wri = $request->input('p_night_differenatial_special_holiday_falling_on_rest_day_wri');
                $transaction_list ->night_differential_legal_holiday_wri = $request->input('p_night_differenatial_legal_holiday_wri');
                $transaction_list ->night_differential_legal_holiday_falling_on_rest_day_wri = $request->input('p_night_differenatial_legal_holiday_falling_on_rest_day_wri');
                $transaction_list ->night_differential_double_pay_wri = $request->input('p_night_differenatial_double_pay_wri');
                $transaction_list ->night_differential_double_pay_falling_on_rest_day_wri = $request->input('p_night_differenatial_double_pay_falling_on_rest_day_wri');
                // overtime with night differential (wri)
                $transaction_list ->overtime_with_night_differential_regular_day_wri = $request->input('p_overtime_with_night_differential_regular_day_wri');
                $transaction_list ->overtime_with_night_differential_special_holiday_wri = $request->input('p_overtime_with_night_differential_special_holiday_wri');
                $transaction_list ->overtime_with_night_differential_wdo_wri = $request->input('p_overtime_with_night_differential_wdo_wri');
                $transaction_list ->overtime_with_night_differential_special_holiday_rest_day_wri = $request->input('p_overtime_with_night_differential_special_holiday_falling_on_rest_day_wri');
                $transaction_list ->overtime_with_night_differential_legal_holiday_wri = $request->input('p_overtime_with_night_differential_legal_holiday_wri');
                $transaction_list ->overtime_with_night_differential_legal_holiday_rest_day_wri = $request->input('p_overtime_with_night_differential_legal_holiday_falling_on_rest_day_wri');
                $transaction_list ->overtime_with_night_differential_double_pay_wri = $request->input('p_overtime_with_night_differential_double_pay_wri');
                $transaction_list ->overtime_with_night_differential_double_pay_rest_day_wri = $request->input('p_overtime_with_night_differential_double_pay_falling_on_rest_day_wri');
                // with rate increase ends here

                // adjustment (+)
                $transaction_list ->adjustment_plus = $request->input('p_adjustment_adjustment_plus');
                $transaction_list ->transportation = $request->input('p_adjustment_transportation');
                // government dues
                $transaction_list ->goverment_dues_sss = $request->input('p_goverment_dues_sss');
                $transaction_list ->goverment_dues_phic = $request->input('p_goverment_dues_phic');
                $transaction_list ->goverment_dues_hdmf = $request->input('p_goverment_dues_hdmf');
                // 
                $transaction_list ->late = $request->input('p_new_deduction_late');
                $transaction_list ->late_wri = $request->input('p_new_deduction_late_wri');
                $transaction_list ->late_deduction = $request->input('p_new_deduction_late_deduction');
                $transaction_list ->late_wri_deduction = $request->input('p_new_deduction_late_deduction_wri');
                $transaction_list ->sss_loan = $request->input('p_new_deduction_sss_loan');
                $transaction_list ->pagibig_loan = $request->input('p_new_deduction_pagibig_loan');
                $transaction_list ->mga_meal = $request->input('p_new_deduction_meal_deduction');
                $transaction_list ->adjustment_minus = $request->input('new_deduction_adjusment_minus');
                // remarks / mode of payment / transaction fee
                $transaction_list ->remarks = $request->input('p_remarks_remarks');
                $transaction_list ->mode_of_payment = $request->input('p_mode_of_payment_mode_of_payment');
                $transaction_list ->transaction_fee = $request->input('p_transaction_fee');
                // total pay
                $transaction_list ->net_pay = $request->input('p_total_pay_net_pay');
                $transaction_list ->diser_net_pay = $request->input('p_total_pay_total_pay');
                
                
                $transaction_list ->save();

                

                return redirect(('/payrollofficer/payrollofficerinput'))->with('message', "Data saved successfully");

            
            }

        

            // protected function getViewMerchandiserManning($id)
            // {
            //     $company_door = DB::table('manning_lists')
            //     ->leftJoin('coordinators', 'manning_lists.coordinator.id', '=' , 'coordinator.id')
            //     ->select('manning_lists.*' , 'coordinators.first_name as fname' , 'coordinators.middle_name as mname' , 'coordinators.last_name as lname' )
            //     ->leftJoin('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
            //     ->select('manning_lists.*' , 'merchandisers.first_name as fname' , 'merchandisers.middle_name as mname' , 'merchandisers.last_name as lname' )
            //     ->where('door_id', $id)
            //     ->get();
                
            //     $company_door = $company_door->map(function($item){
            //         $item = (array) $item;
            //         $item['fname'] = $item ['fname'];
            //         $item['mname'] = $item ['mname'];
            //         $item['lname'] = $item ['lname'];
                  
                    
                    
            //         return $item;
            //     });
                
            //         return response()->json(['data' => $company_door]);;
            // }


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

