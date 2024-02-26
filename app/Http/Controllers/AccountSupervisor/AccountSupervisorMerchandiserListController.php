<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Coordinator;
use App\Models\Merchandiser;
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

class AccountSupervisorMerchandiserListController extends Controller
{
    public function getUpdateData($id)
    {
        
        $merchandiser = Merchandiser::
        find($id , ['first_name' , 'middle_name' , 'last_name' , 'birthdate' , 'age' , 'contact_number' , 'email_address' , 'gender' , 'is_active'])
        //find($id)
        ->toArray();
        if ($merchandiser) {
            
             return response()->json($merchandiser);
       
        } else {
          
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getViewData($id)
    {

        // $company_door = Merchandiser::find($id , ['account' , 'region' , 'area' , 'account_branch' , 'status' , 'type_of_deployment']);

        $merchandiser = Merchandiser::
          where('merchandisers.id', $id)
        // ->select('merchandiser.*', 'company_doors.account_branch as branch')
         ->first();

        if ($merchandiser) {
           
             return response()->json($merchandiser);
       
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

        $data = Merchandiser::
                  where('merchandisers.company_id', session('user')['company_id' ] )
              //  ->select('merchandisers.*', 'company_doors.account_branch as branch')
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
            
            $company = session('user')['company_id'];
            $status = 1;

            $date = $request->c_birthdate;
        $newDate = Carbon::createFromFormat('m/d/Y', $date)
                            ->format('Y-m-d');
            

            $validator = Validator::make($request->all(), [
                'c_email' => 'required|unique:merchandisers,email_address',
                'c_gender' => 'required',
            ],[
                'c_email.unique' => 'Email is already use.',
                'c_gender' => 'Select your gender.',
                
            ]);

       
        
            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/accountsupervisor/merchandiser')
                
               
                            ->withErrors($validator)
                            ->withInput()
                            ->with("create-failed", "Merchandiser failed to create");
            }else{

                           
                $merchandiser = new Merchandiser;
                $merchandiser ->first_name = $request->input('c_first_name');
                $merchandiser ->last_name = $request->input('c_last_name');
                $merchandiser ->middle_name = $request->input('c_middle_name');
                $merchandiser ->birthdate = $newDate;
                $merchandiser ->age = $request->input('c_age');
                $merchandiser ->gender = $request->input('c_gender');
                $merchandiser ->contact_number = $request->input('c_number');
                $merchandiser ->email_address = $request->input('c_email');
                $merchandiser ->company_id = $company;
                $merchandiser ->is_active = $status;
                $merchandiser ->save();
                 //dd($merchandiser);
                return redirect(('/accountsupervisor/merchandiser'))->with('create-success', "Merchandiser registered successfully");
        
               
            }
          

           
    }


    public function updateAccount(Request $request)
    {
              //dd($request->all());

              $id = $request->input('selectedId');
        
              $company = session('user')['company_id'];
             
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
                  return redirect('/accountsupervisor/merchandiser')
                 
                              ->withErrors($validator)
                              ->withInput()
                              ->with("update-failed", "Merchandiser failed to update");
              }else{
  
                             
                
                  $merchandiser = Merchandiser::find($id);
                  $merchandiser ->first_name = $request->input('e_first_name');
                  $merchandiser ->last_name = $request->input('e_last_name');
                  $merchandiser ->middle_name = $request->input('e_middle_name');
                  $merchandiser ->birthdate = $newDate;
                  $merchandiser ->age = $request->input('e_age');
                  $merchandiser ->gender = $request->input('e_gender');
                  $merchandiser ->contact_number = $request->input('e_number');
                  $merchandiser ->email_address = $request->input('e_email');
                  $merchandiser ->is_active = $request->input('e_status');
                  $merchandiser ->company_id = $company;
                  $merchandiser ->update();
                   
                  return redirect(('/accountsupervisor/merchandiser'))->with('update-success', "Merchanidser update successfully");
          
                 
              }
            
  

           
    }
}
