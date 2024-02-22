<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordinator;
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

class AccountSupervisorCoordinatorListController extends Controller
{
    public function getUpdateData($id)
    {
        
        $coordinator = Coordinator::
        find($id , ['first_name' , 'middle_name' , 'last_name' , 'birthdate' , 'age' , 'contact_number' , 'email_address' , 'gender'])
        //find($id)
        ->toArray();
        if ($coordinator) {
            
             return response()->json($coordinator);
       
        } else {
          
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getViewData($id)
    {

        // $company_door = Coodinator::find($id , ['account' , 'region' , 'area' , 'account_branch' , 'status' , 'type_of_deployment']);

        $coordinator = Coordinator::
          where('coordinators.id', $id)
        // ->select('coordinators.*', 'company_doors.account_branch as branch')
         ->first();

        if ($coordinator) {
           
             return response()->json($coordinator);
       
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

        $data = Coordinator::
                  where('coordinators.company_id', session('user')['company_id'] )
              //  ->select('coordinators.*', 'company_doors.account_branch as branch')
                ->get();


        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;

            $item['fullname'] = $item['first_name'] . " " . $item['last_name'];


            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            
            return $item;
        });

        


        

        return response()->json(['data' => $data]);
    }


    public function saveAccount(Request $request)
    {
            //dd($request->all());
            $company = session('user')['company_id'];
            $status = 1;

            $date = $request->c_birthdate;
        $newDate = Carbon::createFromFormat('m/d/Y', $date)
                            ->format('Y-m-d');
            

            $validator = Validator::make($request->all(), [
                'c_email' => 'required|unique:coordinators,email_address',
                'c_gender' => 'required',
            ],[
                'c_email.unique' => 'Email is already use.',
                'c_gender' => 'Select your gender.',
                
            ]);

       
        
            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/accountsupervisor/coordinator')
               
                            ->withErrors($validator)
                            ->withInput()
                            ->with("create-failed", "Coordinator failed to create");
            }else{

                           
                $coordinator = new Coordinator;
                $coordinator ->first_name = $request->input('c_first_name');
                $coordinator ->last_name = $request->input('c_last_name');
                $coordinator ->middle_name = $request->input('c_middle_name');
                $coordinator ->birthdate = $newDate;
                $coordinator ->age = $request->input('c_age');
                $coordinator ->gender = $request->input('c_gender');
                $coordinator ->contact_number = $request->input('c_number');
                $coordinator ->email_address = $request->input('c_email');
                $coordinator ->company_id = $company;
                $coordinator ->is_active = $status;
                $coordinator ->save();
                 
                return redirect(('/accountsupervisor/coordinator'))->with('create-success', "Coordinator registered successfully");
        
               
            }
          

           
    }


    public function updateAccount(Request $request)
    {
              //dd($request->all());

              $id = $request->input('selectedId');
        
              $company = session('user')['company_id'];
              $status = 1;
  
             $date = $request->input('e_birthdate');
          $newDate = Carbon::createFromFormat('m/d/Y', $date)
                             ->format('Y-m-d');
              
  
              $validator = Validator::make($request->all(), [
                  'e_email' =>  'max:255|required|email|unique:users,email,'.$id,
                  'e_gender' => 'required',
              ],[
                  'e_email.unique' => 'Email is already use.',
                  'e_gender' => 'Select your gender.',
                  
              ]);
  
         
          
              if ($validator->fails()) {
                 // Alert::error('Registration Failed');
                  return redirect('/accountsupervisor/coordinator')
                 
                              ->withErrors($validator)
                              ->withInput()
                              ->with("update-failed", "Coordinator failed to update");
              }else{
  
                             
                
                  $coordinator = Coordinator::find($id);
                  $coordinator ->first_name = $request->input('e_first_name');
                  $coordinator ->last_name = $request->input('e_last_name');
                  $coordinator ->middle_name = $request->input('e_middle_name');
                  $coordinator ->birthdate = $newDate;
                  $coordinator ->age = $request->input('e_age');
                  $coordinator ->gender = $request->input('e_gender');
                  $coordinator ->contact_number = $request->input('e_number');
                  $coordinator ->email_address = $request->input('e_email');
                  $coordinator ->company_id = $company;
                  $coordinator ->is_active = $status;
                  $coordinator ->update();
                   
                  return redirect(('/accountsupervisor/coordinator'))->with('update-success', "Coordinator update successfully");
          
                 
              }
            
  

           
    }
}
