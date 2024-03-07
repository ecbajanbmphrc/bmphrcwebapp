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
    

        //using eloquent orm
        // $data = Coordinator::join('company_doors' , 'coordinators.company_door_id' , '=' , 'company_doors.id')
        // ->where('coordinators.company_id', session('user')['company_id'] )
        // ->select('coordinators.*', 'company_doors.account_branch as branch')
        // ->get();


        // $data = $data->map(function ($item, $key) {
        //     $item['#'] = $key + 1;

        //     $item['fullname'] = $item['first_name'] . " " . $item['last_name'];


        //     $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            
        //     return $item;
        // });

       


        //using query builder
        // $data = DB::table('coordinators')
        // ->join('company_doors' , 'coordinators.company_door_id' , '=' , 'company_doors.id')
        // ->select('coordinators.*', 'company_doors.store_name as store')
        // ->where('coordinators.company_id', session('user')['company_id'])
        // ->get();

        // $data = $data->map(function ($item, $key) {
        //     $item->count = $key + 1;

        //     $item->fullname = $item->first_name . " " . $item->last_name;


        //     $item->actions = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            
        //     return $item;
        // });

        $data = Manning::
                  where('manning.company_id', session('user')['company_id'] )
              //  ->select('coordinators.*', 'company_doors.account_branch as branch')
                ->get();


        $data = $data->map(function ($item, $key) {
            //$item['#'] = $key + 1;

           // $item['fullname'] = $item['first_name'] . " " . $item['last_name'];


            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            
            return $item;
        });

        return response()->json(['data' => $data]);
    }


    public function saveAccount(Request $request)
    {
           // dd($request->all());
            $company = session('user')['company_id'];
            $status = 1;

        //     $date = $request->input('c_birthdate');
        // $newDate = Carbon::createFromFormat('m/d/Y', $date)
        //                     ->format('Y-m-d');
            

            $validator = Validator::make($request->all(), [
                'c_store_name' => 'required|unique:manning,store_address',
                'c_coordinator' => 'required',
                'c-store_address' => 'required',
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
                $manning ->store_name  = $request->input('c_store_name');
                $manning ->coordinator = $request->input('c_coordinator');
                $manning ->address = $request->input('c_store_address');
                $manning ->region = $request->input('c_region');
                // $coordinator ->first_name = $request->input('c_first_name');
                // $coordinator ->last_name = $request->input('c_last_name');
                // $coordinator ->middle_name = $request->input('c_middle_name');
                // $coordinator ->birthdate = $newDate;
                // $coordinator ->age = $request->input('c_age');
                // $coordinator ->gender = $request->input('c_gender');
                // $coordinator ->address = $request->input('c_address');
                // $coordinator ->region = $request->input('c_region');
                // $coordinator ->contact_number = $request->input('c_number');
                // $coordinator ->email_address = $request->input('c_email');
                $manning ->company_id = $company;
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
        //   $newDate = Carbon::createFromFormat('m/d/Y', $date)
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
                //   $coordinator ->first_name = $request->input('e_first_name');
                //   $coordinator ->last_name = $request->input('e_last_name');
                //   $coordinator ->middle_name = $request->input('e_middle_name');
                //   $coordinator ->birthdate = $newDate;
                //   $coordinator ->age = $request->input('e_age');
                //   $coordinator ->gender = $request->input('e_gender');
                //   $coordinator ->address = $request->input('e_address');
                //   $coordinator ->region = $request->input('e_region');
                //   $coordinator ->contact_number = $request->input('e_number');
                //   $coordinator ->email_address = $request->input('e_email');
                //   $coordinator ->company_id = $company;
                  $coordinator ->is_active = $status;
                  $coordinator ->update();
                   
                //   return redirect(('/accountsupervisor/coordinator'))->with('update-success', "Coordinator update successfully");
          
                 
              }
            
  

           
    }
}
