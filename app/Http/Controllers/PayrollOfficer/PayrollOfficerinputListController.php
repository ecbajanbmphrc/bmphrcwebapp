<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PayrollInput;
use App\Models\PayrollList;
use App\Models\Billing;
use App\Models\Reimbursement;
use App\Models\Data;
use App\Models\Gcash;
use App\Models\Eastwest;
use App\Models\Rcbc;
use App\Models\Rcbcwallet;
use App\Models\Cebuana;



use App\Models\CompanyDoor;
use App\Models\TransactionList;

use Session;
use DB;

class PayrollOfficerInputListController extends Controller
    {

        // fetch data starts here
        public function fetchData(Request $request)
        {
            $user_id = session('user')['current_user_id'];

            $user_type = session('user')['company_id'];

            $door_list  = DB::table('payroll_lists')
                ->where('user_id' , '=', $user_id)
                // ->where() // code added
                ->pluck('company_door_id')
                ->toArray();


            $visayasMindanaoRegions = ['special']; 

                // Luzon
                $luzonSpecialRate = DB::table('rate_cards')
                ->where('special', 'LUZ')
                ->max('new_rate_per_day');
            
            DB::table('rate_cards')
                ->where('special', 'LUZ')
                ->update(['special' => $luzonSpecialRate]);
                // dd($luzonSpecialRate);
            
            // VISAYAS and MINDANO
            $highestRate = DB::table('rate_cards')
                ->whereIn('special', ['VIS' , 'MIN'])
                ->max('rate_per_day');

            DB::table('rate_cards')
                ->whereIn('region', $visayasMindanaoRegions)
                ->update(['special' => $highestRate]);
            // dd($highestRate);

            $newhighestRate = DB::table('rate_cards')
                ->whereIn('special', ['VIS' , 'MIN'])
                ->max('new_rate_per_day');
            
            DB::table('rate_cards')
                ->whereIn('region', $visayasMindanaoRegions)
                ->update(['special' => $newhighestRate]);
                // dd($newhighestRate);

            // new condition ends here
            // Fetch payroll list with unique merchandiser details
            $payroll_list = DB::table('payroll_lists')
                ->leftjoin('manning_lists', 'company_door_id', 'door_id')
                ->leftjoin('merchandisers', 'merchandisers.id', '=', 'manning_lists.merchandiser_id')
                ->leftjoin('company_doors', 'company_doors.id', '=', 'payroll_lists.company_door_id')
                ->leftjoin('coordinators', 'coordinators.id', '=', 'company_doors.coordinator_id')
                ->leftjoin('rate_cards', 'merchandisers.rate_type', '=', 'rate_cards.region')
                ->leftjoin('disbursements', 'merchandisers.id', '=', 'disbursements.merchandiser_id')
                ->select( 
                    'merchandisers.first_name as merchandiser_fname',
                    'merchandisers.middle_name as merchandiser_mname',
                    'merchandisers.last_name as merchandiser_lname',
                    'merchandisers.rate_type as merchandiser_rate_type',
                    'merchandisers.type_of_deployment as merchandiser_type_of_deployment',
                    'merchandisers.remarks as merchandiser_remarks', 
                    'coordinators.first_name as coordinator_fname',
                    'coordinators.middle_name as coordinator_mname',
                    'coordinators.last_name as coordinator_lname',

                    'disbursements.bdo as bdo',
                    'disbursements.bpi as bpi',
                    'disbursements.cebuana as cebuana',
                    'disbursements.eastwest as eastwest',
                    'disbursements.gcash_number as gcash',
                    'disbursements.rcbc as rcbc',
                    'disbursements.rcbc_wallet as rcbcwallet',
                    'disbursements.bank_type as bank',
                    'disbursements.bank_account_number as number',


                    DB::raw('GROUP_CONCAT(DISTINCT company_doors.account SEPARATOR " / ") as account'),
                    DB::raw('GROUP_CONCAT(DISTINCT merchandisers.type_of_deployment SEPARATOR " | ") as employee_types'),
                    DB::raw('GROUP_CONCAT(DISTINCT company_doors.store_name SEPARATOR " / ") as handled_store'),
                    DB::raw('GROUP_CONCAT(DISTINCT company_doors.region SEPARATOR " | ") as region'),
                    DB::raw('GROUP_CONCAT(DISTINCT merchandisers.rate_type SEPARATOR " | ") as rate_type'),
                    DB::raw('MAX(rate_cards.rate_per_day) as ratings'),
                    DB::raw('MAX(rate_cards.new_rate_per_day) as newratings'),
                    // DB::raw('MAX(disbursements.gcash_number) as gcash'),

                )
                ->where('payroll_lists.user_id', '=', $user_id)
                ->where('merchandisers.is_active', '=', '1')
                ->groupBy(
                    'merchandisers.first_name',
                    'merchandisers.middle_name',
                    'merchandisers.last_name',
                    'merchandisers.rate_type',
                    'merchandisers.remarks',
                    'merchandisers.type_of_deployment',
                    'coordinators.first_name',
                    'coordinators.middle_name',
                    'coordinators.last_name',
                    'disbursements.gcash_number',
                    'disbursements.bdo',
                    'disbursements.bpi',
                    'disbursements.eastwest',
                    'disbursements.cebuana',
                    'disbursements.rcbc',
                    'disbursements.rcbc_wallet',
                    'disbursements.bank_type',
                    'disbursements.bank_account_number',

                )
                ->get();
                // dd($payroll_list);            

            // Map through the payroll list for further processing
            $payroll_list = $payroll_list->map(function($item) use ($newhighestRate, $luzonSpecialRate) {
                $item = (array) $item;

                // $item['merchandiser_remarks'] = $item['merchandiser_remarks'];
                $item['merchandiser_fullname'] = trim($item['merchandiser_fname'] . " " . $item['merchandiser_mname'] . " " . $item['merchandiser_lname']);
                $item['coordinator_fullname'] = trim($item['coordinator_fname'] . " " . $item['coordinator_mname'] . " " . $item['coordinator_lname']);
                

                // Special rate logic
                $item['special_rate'] = $newhighestRate;
                if (strpos($item['region'], 'Special Rates (LUZ)') !== false) {
                    $item['ratings'] = $luzonSpecialRate;
                }

                // Add action buttons
                $item['actions'] = '<img src="/asset/img/button_img/arrow.png" alt="Button 1" class="arrow-button" style="height: 25px; width: 25px;">';

                return $item;
            });

            return response()->json(['dataone' => $payroll_list]);

        }

            //  saving data starts here
        public function saveData(Request $request) 
        {

            $dataTable = $request->input('dataTable');


            // dd($request->all()); 
            $oldRate = $request->input('Ratings');
            $newRate = $request->input('newRatings');
            $user_id = session('user')['current_user_id'];
            $userEmail = session('user')['user_email'];

            if (is_null($oldRate)) {
                // return response()->json(['error' => 'Old rate cannot be null'], 400);
            }

            if (is_null($newRate)) {
                $newRate = 0; // or whatever default value makes sense
            }

            $request->validate([
                // 'p_new_deduction_late' => 'required|numeric',
                // 'p_new_deduction_late_wri' => 'required|numeric',
                'p_new_deduction_late_deduction' => 'required|numeric',
                'p_new_deduction_late_deduction_wri' => 'required|numeric',        
            ]);
            
            $transaction_lists = new TransactionList;

            // Data from datatable
            $transaction_lists->coordinator = $request->input('coordinator_fullname');
            $transaction_lists->account = $request->input('account');
            $transaction_lists->employee_name = $request->input('merchandiser_fullname');
            $transaction_lists->remarks = $request->input('merchandiser_remarks');
            $transaction_lists->hc = (1);
            $transaction_lists->handled_store = $request->input('handled_store');
            $transaction_lists->region = $request->input('region');
            
            $transaction_lists->old_rate = $request->input('ratings');
            $transaction_lists->new_rate = $request->input('newratings');

            // data from form
            // first row
            $transaction_lists->actual_days_rendered = $request->input('p_actual_rendered_day');
            $transaction_lists->actual_days_rendered_wri = $request->input('p_actual_rendered_day_wri');
            $transaction_lists->total_hours = $request->input('p_total_hours');
            $transaction_lists->total_hours_wri = $request->input('p_total_hours_wri');
            $transaction_lists->sil_13th_month = $request->input('p_sil');
            $transaction_lists->thirteen_month = $request->input('p_month');
            // special rates
            $transaction_lists->special_rates_special_holiday = $request->input('p_special_rates_special_holiday');
            $transaction_lists->special_rates_wdo = $request->input('p_special_rates_wdo');
            $transaction_lists->special_rates_special_holiday_falling_on_rest_day = $request->input('p_special_rates_special_holiday_falling_on_rest_day');
            $transaction_lists->special_rates_legal_holiday = $request->input('p_special_rates_legal_holiday');
            $transaction_lists->special_rates_legal_holiday_falling_on_rest_day = $request->input('p_special_rates_legal_holiday_falling_on_rest_day');
            $transaction_lists->special_rates_double_pay = $request->input('p_special_rates_double_pay');
            $transaction_lists->special_rates_double_pay_falling_on_rest_day = $request->input('p_special_rates_double_pay_falling_on_rest_day');
            // overtime
            $transaction_lists->overtime_regular_day = $request->input('p_overtime_regular_day');
            $transaction_lists->overtime_special_holiday = $request->input('p_overtime_special_holiday');
            $transaction_lists->overtime_wdo = $request->input('p_overtime_wdo');
            $transaction_lists->overtime_special_holiday_falling_on_rest_day = $request->input('p_overtime_special_holiday_falling_on_rest_day');
            $transaction_lists->overtime_legal_holiday = $request->input('p_overtime_legal_holiday');
            $transaction_lists->overtime_legal_holiday_falling_on_rest_day = $request->input('p_overtime_legal_holiday_falling_on_rest_day');
            $transaction_lists->overtime_double_pay = $request->input('p_overtime_double_pay');
            $transaction_lists->overtime_double_pay_falling_on_rest_day = $request->input('p_overtime_double_pay_falling_on_rest_day');
            // night differential
            $transaction_lists->night_differential_regular_day = $request->input('p_night_differenatial_regular_day');
            $transaction_lists->night_differential_special_holiday = $request->input('p_night_differenatial_special_holiday');
            $transaction_lists->night_differential_wdo = $request->input('p_night_differenatial_wdo');
            $transaction_lists->night_differential_special_holiday_falling_on_rest_day = $request->input('p_night_differenatial_special_holiday_falling_on_rest_day');
            $transaction_lists->night_differential_legal_holiday = $request->input('p_night_differenatial_legal_holiday');
            $transaction_lists->night_differential_legal_holiday_falling_on_rest_day = $request->input('p_night_differenatial_legal_holiday_falling_on_rest_day');
            $transaction_lists->night_differential_double_pay = $request->input('p_night_differenatial_double_pay');
            $transaction_lists->night_differential_double_pay_falling_on_rest_day = $request->input('p_night_differenatial_double_pay_falling_on_rest_day');
            // overtime with night differential
            $transaction_lists->overtime_with_night_differential_regular_day = $request->input('p_overtime_with_night_differential_regular_day');
            $transaction_lists->overtime_with_night_differential_special_holiday = $request->input('p_overtime_with_night_differential_special_holiday');
            $transaction_lists->overtime_with_night_differential_wdo = $request->input('p_overtime_with_night_differential_wdo');
            $transaction_lists->overtime_with_night_differential_special_holiday_rest_day = $request->input('p_overtime_with_night_differential_special_holiday_falling_on_rest_day');
            $transaction_lists->overtime_with_night_differential_legal_holiday = $request->input('p_overtime_with_night_differential_legal_holiday');
            $transaction_lists->overtime_with_night_differential_legal_holiday_rest_day = $request->input('p_overtime_with_night_differential_legal_holiday_falling_on_rest_day');
            $transaction_lists->overtime_with_night_differential_double_pay = $request->input('p_overtime_with_night_differential_double_pay');
            $transaction_lists->overtime_with_night_differential_double_pay_rest_day = $request->input('p_overtime_with_night_differential_double_pay_falling_on_rest_day');


            // with rate increase starts here
            // special rates (wri)
            $transaction_lists->special_rates_special_holiday_wri = $request->input('p_special_rates_special_holiday_wri');
            $transaction_lists->special_rates_wdo_wri = $request->input('p_special_rates_wdo_wri');
            $transaction_lists->special_rates_special_holiday_falling_on_rest_day_wri = $request->input('p_special_rates_special_holiday_falling_on_rest_day_wri');
            $transaction_lists->special_rates_legal_holiday_wri = $request->input('p_special_rates_legal_holiday_wri');
            $transaction_lists->special_rates_legal_holiday_falling_on_rest_day_wri = $request->input('p_special_rates_legal_holiday_falling_on_rest_day_wri');
            $transaction_lists->special_rates_double_pay_wri = $request->input('p_special_rates_double_pay_wri');
            $transaction_lists->special_rates_double_pay_falling_on_rest_day_wri = $request->input('p_special_rates_double_pay_falling_on_rest_day_wri');
            // overtime (wri)
            $transaction_lists->overtime_regular_day_wri = $request->input('p_overtime_regular_day_wri');
            $transaction_lists->overtime_special_holiday_wri = $request->input('p_overtime_special_holiday_wri');
            $transaction_lists->overtime_wdo_wri = $request->input('p_overtime_wdo_wri');
            $transaction_lists->overtime_special_holiday_falling_on_rest_day_wri = $request->input('p_overtime_special_holiday_falling_on_rest_day_wri');
            $transaction_lists->overtime_legal_holiday_wri = $request->input('p_overtime_legal_holiday_wri');
            $transaction_lists->overtime_legal_holiday_falling_on_rest_day_wri = $request->input('p_overtime_legal_holiday_falling_on_rest_day_wri');
            $transaction_lists->overtime_double_pay_wri = $request->input('p_overtime_double_pay_wri');
            $transaction_lists->overtime_double_pay_falling_on_rest_day_wri = $request->input('p_overtime_double_pay_falling_on_rest_day_wri');
            // night differential (wri)
            $transaction_lists->night_differential_regular_day_wri = $request->input('p_night_differenatial_regular_day_wri');
            $transaction_lists->night_differential_special_holiday_wri = $request->input('p_night_differenatial_special_holiday_wri');
            $transaction_lists->night_differential_wdo_wri = $request->input('p_night_differenatial_wdo_wri');
            $transaction_lists->night_differential_special_holiday_falling_on_rest_day_wri = $request->input('p_night_differenatial_special_holiday_falling_on_rest_day_wri');
            $transaction_lists->night_differential_legal_holiday_wri = $request->input('p_night_differenatial_legal_holiday_wri');
            $transaction_lists->night_differential_legal_holiday_falling_on_rest_day_wri = $request->input('p_night_differenatial_legal_holiday_falling_on_rest_day_wri');
            $transaction_lists->night_differential_double_pay_wri = $request->input('p_night_differenatial_double_pay_wri');
            $transaction_lists ->night_differential_double_pay_falling_on_rest_day_wri = $request->input('p_night_differenatial_double_pay_falling_on_rest_day_wri');
            // overtime with night differential (wri)
            $transaction_lists->overtime_with_night_differential_regular_day_wri = $request->input('p_overtime_with_night_differential_regular_day_wri');
            $transaction_lists->overtime_with_night_differential_special_holiday_wri = $request->input('p_overtime_with_night_differential_special_holiday_wri');
            $transaction_lists->overtime_with_night_differential_wdo_wri = $request->input('p_overtime_with_night_differential_wdo_wri');
            $transaction_lists->overtime_with_night_differential_special_holiday_rest_day_wri = $request->input('p_overtime_with_night_differential_special_holiday_falling_on_rest_day_wri');
            $transaction_lists->overtime_with_night_differential_legal_holiday_wri = $request->input('p_overtime_with_night_differential_legal_holiday_wri');
            $transaction_lists->overtime_with_night_differential_legal_holiday_rest_day_wri = $request->input('p_overtime_with_night_differential_legal_holiday_falling_on_rest_day_wri');
            $transaction_lists->overtime_with_night_differential_double_pay_wri = $request->input('p_overtime_with_night_differential_double_pay_wri');
            $transaction_lists->overtime_with_night_differential_double_pay_rest_day_wri = $request->input('p_overtime_with_night_differential_double_pay_falling_on_rest_day_wri');
            // with rate increase ends here

            // reimbursement
            $transaction_lists->transportation = $request->input('p_adjustment_transportation');
            $transaction_lists->mailing = $request->input('p_mailingForms');
            $transaction_lists->supplies = $request->input('p_suppliesAndForms');
            $transaction_lists->lodging = $request->input('p_lodging');
            $transaction_lists->load_allowance= $request->input('p_loadAllowance');
            // adjustment (+)
            $transaction_lists->adjustment_plus = $request->input('p_adjustment_adjustment_plus');
            // government dues
            $transaction_lists->goverment_dues_sss = $request->input('p_goverment_dues_sss');
            $transaction_lists->goverment_dues_phic = $request->input('p_goverment_dues_phic');
            $transaction_lists->goverment_dues_hdmf = $request->input('p_goverment_dues_hdmf');
            // deductions
            $transaction_lists->late = $request->input('p_new_deduction_late');
            $transaction_lists->late_wri = $request->input('p_new_deduction_late_wri');
            $transaction_lists->late_deduction = number_format($request->input('p_new_deduction_late_deduction'), 2, '.', '');
            $transaction_lists->late_wri_deduction = number_format($request->input('p_new_deduction_late_deduction_wri'), 2, '.', '');

            $transaction_lists->sss_loan = $request->input('p_new_deduction_sss_loan');
            $transaction_lists->pagibig_loan = $request->input('p_new_deduction_pagibig_loan');
            $transaction_lists->mga_meal = $request->input('p_new_deduction_meal_deduction');
            $transaction_lists->adjustment_minus = $request->input('new_deduction_adjusment_minus');
            // remarks / mode of payment / transaction fee
            if($request->input('p_mode_of_payment_mode_of_payment') === "Others"){
                $transaction_lists->mode_of_payment = $request->input('bankk');
            }else{
                $transaction_lists->mode_of_payment = $request->input('p_mode_of_payment_mode_of_payment');
            }
            // $transaction_lists->bank_type = $request->input('pogi_bank');
            $transaction_lists->payment_number = $request->input('payment_number');
            $transaction_lists->transaction_fee = $request->input('p_transaction_fee');
            // total pay
            $transaction_lists->net_pay = $request->input('p_total_pay_net_pay');
            $transaction_lists->new_net_pay = $request->input('p_net_pay');
            $transaction_lists->diser_net_pay = $request->input('p_total_pay_total_pay');
            $transaction_lists->payrolled_date = $request->input('p_payrolled'); // DATE
            $transaction_lists->period = $request->input('p_period'); // DATE

            $transaction_lists->payslip_special = $request->input('payslip_speciall');
            $transaction_lists->payslip_ot = $request->input('payslip_ott');
            $transaction_lists->payslip_nd = $request->input('payslip_ndd');
            $transaction_lists->payslip_otnd = $request->input('payslip_otndd');
            $transaction_lists->payslip_other = $request->input('payslip_otherr');
            $transaction_lists->deduction_other = $request->input('deduction_otherr');
            $transaction_lists->deduction_total = $request->input('deduction_totall');




            $transaction_lists->user_id = $user_id; 
            
            // dd($transaction_lists);
            $transaction_lists->save();


            // Saving Reimbursement starts here
            $reimbursements = new Reimbursement;

            $reimbursements->user_id = $user_id; 
            $reimbursements->account = $request->input('account');
            $reimbursements->hc = 1;
            $reimbursements->coordinator = $request->input('coordinator_fullname');
            $reimbursements->employee_name = $request->input('merchandiser_fullname');
            $reimbursements->handled_store = $request->input('handled_store');
            $reimbursements->period = $request->input('p_period');
            $reimbursements->payrolled_date= $request->input('p_payrolled');
            
            
            $transportation = (float) $request->input('p_adjustment_transportation', 0);
            $mailing = (float) $request->input('p_mailingForms', 0);
            $supplies = (float) $request->input('p_suppliesAndForms', 0);
            $lodging = (float) $request->input('p_lodging', 0);
            $loadAllowance = (float) $request->input('p_loadAllowance', 0);
            
            $total = $transportation + $mailing + $supplies + $lodging + $loadAllowance;
            
            // Assign the calculated total to the reimbursement object
            $reimbursements->total = $total;  
            
            $reimbursements->transportation = $transportation;
            $reimbursements->mailing = $mailing;
            $reimbursements->supplies = $supplies;
            $reimbursements->lodging = $lodging;
            $reimbursements->load_allowance = $loadAllowance;
            
            $reimbursements->save();
            // Saving Reimbursement ends here

            // Gcash list starts here
            $gcash_lists = New Gcash;

            $date = "Period for " . $request->input('p_period');

            $gcash_lists->user_id = $user_id; 
            $gcash_lists->net_pay = $request->input('p_total_pay_total_pay');
            $gcash_lists->merchandiser_name = $request->input('merchandiser_fullname');
            $gcash_lists->office_address = "7 Sheridan St Highway Hills Mandaluyong City";
            // $gcash_lists->mode_of_payment = $request->input('p_mode_of_payment_mode_of_payment');
            $mode = $request->input('p_mode_of_payment_mode_of_payment') == "Others" ? $request->input('bankk') : $request->input('p_mode_of_payment_mode_of_payment');

            $gcash_lists->mode_of_payment = $mode;
            
            $gcash_lists->account_number = $request->input('payment_number');
            $gcash_lists->purpose_of_transfer = $date;
            $gcash_lists->payroll_email = $userEmail;
            $gcash_lists->payrolled_date= $request->input('p_payrolled');
            $gcash_lists->period = $request->input('p_period');

            // dd($gcash_lists);
            $gcash_lists->save();
            // Gcash list ends here
            // 


            // return redirect(('/payrollofficer/payrollofficerinput'))->with('message', "Data saved successfully");
            return response()->json(['message' => 'Data saved successfully!']);
            // return back()->withInput();
        }
    }

