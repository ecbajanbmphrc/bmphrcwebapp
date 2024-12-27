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
        $data = DB::table('company_doors')
            ->leftJoin('payroll_lists', 'payroll_lists.company_door_id', '=', 'company_doors.id')
            ->leftJoin('users', 'users.id', '=', 'payroll_lists.user_id')
            ->where('company_doors.company_id', '=', 3)
            ->select(
                'users.first_name as fname',
                'users.last_name as lname',
                'company_doors.store_name',
                'company_doors.account',
                'company_doors.region',
                'company_doors.id as door_id',
                'payroll_lists.user_id as payroll_officer_id'
            );

        // Apply account filter if provided
        if ($request->has('account') && $request->account != '') {
            $data->where('company_doors.account', $request->account);
        }

        $data = $data->get();

        $data = $data->map(function ($item, $key) {
            $item = (array) $item;
            $item['#'] = $key + 1;
            $item['id'] = $item['door_id'];
            $item['checkbox'] = '<input type="checkbox" class="transfer" data-id="' . $item['door_id'] . '">';
            $item['store_name'] = $item['store_name'];
            $item['user_fullname'] = trim($item['fname'] . " " . $item['lname']);
            $item['actions'] = '<img src="/asset/img/button_img/pen-green-32.png" alt="Edit" class="button-image2" style="height: 25px; width: 25px;">';
            return $item;
        });

        return response()->json(['data' => $data]);
    }



    public function transferEfcPayroll(Request $request)
    {
        try {
            $user_id = $request->user_id; // Payroll officer ID
            $store_ids = $request->ids;  // Selected store IDs

            // Validate inputs
            if (empty($user_id) || empty($store_ids)) {
                return response()->json(['error' => 'Payroll officer or stores not selected'], 400);
            }

            foreach ($store_ids as $store_id) {
                // Check if the store already has a payroll officer assigned
                $existingRecord = DB::table('payroll_lists')
                    ->where('company_door_id', $store_id)
                    ->first();

                if ($existingRecord) {
                    // Update the record with the new payroll officer
                    DB::table('payroll_lists')
                        ->where('company_door_id', $store_id)
                        ->update(['user_id' => $user_id]);
                } else {
                    // Insert a new record if it does not exist
                    DB::table('payroll_lists')->insert([
                        'company_door_id' => $store_id,
                        'user_id' => $user_id,
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => 'Payroll officer reassigned successfully']);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


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
