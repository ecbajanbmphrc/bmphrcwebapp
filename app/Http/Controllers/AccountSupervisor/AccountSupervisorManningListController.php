<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Merchandiser;
use App\Models\Manning;
use App\Models\CompanyDoor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

use Session;
use Carbon\Carbon;
use DB;

class AccountSupervisorManningListController extends Controller
{
    public function getUpdateData($id)
    {
        
        $manning = Manning::
        find($id , [ 'store_name' , 'first_name' , 'middle_name' , 'last_name' , 'birthdate' , 'age' , 'address' , 'region' , 'contact_number' , 'email_address' , 'gender'])
        //find($id)
        ->toArray();
        if ($manning) {
            
             return response()->json($manning);
       
        } else {
          
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getViewData($id)
    {

        // $company_door = Coodinator::find($id , ['account' , 'region' , 'area' , 'account_branch' , 'status' , 'type_of_deployment']);

        $manning = Manning::
          where('manning.id', $id)
        // ->select('coordinators.*', 'company_doors.account_branch as branch')
         ->first();

        if ($manning) {
           
             return response()->json($manning);
       
        } else {
           
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function fetchData(Request $request)
    {
        try {
            $userCompanyId = session('user')['company_id'];

            $data = DB::table('manning_lists')
                ->join('company_doors', 'company_doors.id', '=', 'manning_lists.door_id')
                // ->join('merchsandisers', 'merchandisers.id', '=', 'manning_lists.merchandiser_id')
                // ->join('coordinators', 'coordinators.id', '=', 'company_doors.coordinator_id')
                // ->join('rate_cards', 'rate_cards.region', '=', 'company_doors.region')
                // ->select('merchandisers.first_name as merchandiser_fname',
                //     'merchandisers.middle_name as merchandiser_mname',
                //     'merchandisers.last_name as merchandiser_lname',
                //     'coordinators.first_name as coordinator_fname',
                //     'coordinators.middle_name as coordinator_mname',
                //     'coordinators.last_name as coordinator_lname',
                //     'company_doors.account',
                //     'company_doors.store_name',
                //     'company_doors.region as region',
                //     'rate_cards.rate_per_day as ratings')
                ->where('company_doors.company_id', '=', $userCompanyId)    
                ->get();

                // dd($data);

            $data = $data->map(function ($item, $key) {
                $item = (array) $item;
                $item['number'] = $key + 1;
                $item['coordinator_fullname'] = trim($item['coordinator_fname'] . " " . $item['coordinator_mname'] . " " . $item['coordinator_lname']);
                $item['merchandiser_fullname'] = trim($item['merchandiser_fname'] . " " . $item['merchandiser_mname'] . " " . $item['merchandiser_lname']);
                $item['region'] = $item['region'];
                $item['actions'] = '<img src="/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';
                return $item;
            });

            return response()->json(['data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function saveAccount(Request $request)
    {
           // dd($request->all());
            $company = session('user')['company_id'];
            $status = 1;

           

        //     $date = $request->input('c_birthdate');
        // $newDate = Carbon::createFromFormat('m/d/Y', $date)
        //                     ->format('Y-m-d');
            
            dd($request->all());

            $validator = Validator::make($request->all(), [
                'c_store_name' => 'required',
                'c_coordinator' => 'required',
                'c_store_address' => 'required',
           ],[
                //'c_email.unique' => 'Email is already use.',
                'c_region' => 'Select your region.',
                
            ]);

       
        
            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/accountsupervisor/manning')           
                    ->withErrors($validator)
                    ->withInput()
                    ->with("create-failed", "Manning failed to create");
            }else{

                    
                $manning = new Manning;
                $manning ->door_id = $request->input('c_store_name');
                $manning ->coordinator_id = $request->input('c_coordinator');
                // $manning ->merchandiser_id =$request->input()
                $manning ->door_id = $request->input('c_store_address');
                $manning ->region_id = $request->input('c_region');
                // $maning ->account_id = $request->input('c_account');

                $manning ->is_active = $status;
                $manning ->save();
                 
                //return redirect(('/accountsupervisor/coordinator'))->with('create-success', "Coordinator registered successfully");
        
               
            }
          

           
    }


    public function updateAccount(Request $request)
    {
              //dd($request->all());

              $id = $request->input('selectedId');
        
              $company = session('user')['company_id'];
              $status = 1;
  
        //      $date = $request->input('e_birthdate');
        //      $newDate = Carbon::createFromFormat('m/d/Y', $date)
        //                      ->format('Y-m-d');
              
  
        //       $validator = Validator::make($request->all(), [
        //           'e_email' =>  'max:255|required|email|unique:users,email,'.$id,
        //           'e_gender' => 'required',
        //       ],[
        //           'e_email.unique' => 'Email is already use.',
        //           'e_gender' => 'Select your gender.',
                  
        //       ]);
  
         
          
              if ($validator->fails()) {
                 // Alert::error('Registration Failed');
                  return redirect('/accountsupervisor/manning')
                 
                              ->withErrors($validator)
                              ->withInput()
                              ->with("update-failed", "Manning failed to update");
              }else{
  
                             
                
                  $coordinator = Manning::find($id);

                  $coordinator ->is_active = $status;
                  $coordinator ->update();
                   
                //   return redirect(('/accountsupervisor/coordinator'))->with('update-success', "Coordinator update successfully");
          
                 
              }
            
  

           
    }
}
