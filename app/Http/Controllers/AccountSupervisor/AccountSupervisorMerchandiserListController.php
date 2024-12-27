<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Coordinator;
use App\Models\Merchandiser;
use App\Models\CompanyDoor;
use App\Models\Disbursement;
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
        find($id , [ 'first_name' , 'middle_name' , 'last_name' , 'birthdate' , 'age' 
        , 'contact_number' , 'email_address' , 'gender' , 'address' , 'region' 
        , 'date_started' , 'end_of_contract' , 'rate_type' , 'type_of_deployment' 
        , 'remarks' , 'is_active'])
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
        
       

        $data = Merchandiser::
            where('merchandisers.supervisor_id', session('user')['current_user_id' ] )
            ->get();


        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;

            $item['fullname'] = $item['first_name'] . " " . $item['last_name'];


            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            switch($item['remarks']){
                case 'New Diser':
                    $item['remain'] = "New Diser";
                    break;
                    case 'Probationary':
                        $today = \Carbon\Carbon::now();
                        $expirydate = \Carbon\Carbon::parse($item['end_of_contract']);
                        $item['remain'] = $today->diffInDays($expirydate, false);
                    break;   
                    
                    case 'Regular':
                        $item['remain'] = "(∞)";
                    break;  

                    case 'Reliever':
                        $item['remain'] = "-";
                    break;  

                    default :
                        $item['remain'] = "-";
                    break;  


            }


            return $item;
        });

        
        

        return response()->json(['data' => $data]);
    }


    public function saveAccount(Request $request)
    {

    //    dd($request->all());

            
            $company = session('user')['company_id'];
            $status = 1;

            $supId = session('user')['current_user_id'];

            $datebirth = $request->c_birthdate;
            $newDate = Carbon::createFromFormat('m/d/Y', $datebirth)
            ->format('Y-m-d');

            $date_started = $request->c_date_started;
            $newDateDS = Carbon::createFromFormat('m/d/Y', $date_started)
            ->format('Y-m-d');

            $end_of_contract = $request->c_end_of_contract;
            $newDateEC = Carbon::createFromFormat('m/d/Y', $end_of_contract)
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

                $merchandiser ->supervisor_id = $supId; 
                $merchandiser ->first_name = $request->input('c_first_name');
                $merchandiser ->last_name = $request->input('c_last_name');
                $merchandiser ->middle_name = $request->input('c_middle_name');
                // $merchandiser ->birthdate = $newDate;
                $merchandiser ->birthdate = $newDate;
                $merchandiser ->age = $request->input('c_age');
                $merchandiser ->gender = $request->input('c_gender');
                $merchandiser ->address = $request->input('c_address');
                $merchandiser ->region = $request ->input('c_region');
                $merchandiser ->contact_number = $request->input('c_number');
                $merchandiser ->email_address = $request->input('c_email');
                $merchandiser ->date_started = $newDateDS;
                $merchandiser ->end_of_contract = $newDateEC;
                $merchandiser ->rate_type = $request ->input('c_rate_type');
                $merchandiser ->type_of_deployment = $request ->input('c_type_of_deployment');
                $merchandiser ->remarks = $request ->input('c_remarks');
                $merchandiser ->company_id = $company;
                $merchandiser ->is_active = $status;
                $merchandiser ->save();
                $merchandiser ->refresh();
                //  dd($merchandiser->id);


                // saving disburements stars here
                $merchant_id = $merchandiser->id;

                $disbursements = new Disbursement;
            
                $disbursements->merchandiser_id = $merchant_id;
                $disbursements ->save();
                // Saving disbursement ends here

                // return redirect(('/accountsupervisor/merchandiser'))->with('create-success', "Merchandiser registered successfully");
                return response()->json(['message' => 'Data saved successfully!' , 'data' => $merchandiser]);
               
            }

          
            // Upon waking, a shroud of uncertainty clings to my spirit,
            // as motivation slips through my fingers like whispers of dawn.
            // I linger in the cradle of my bed,
            // lost in reverie, pondering the delicate dance of fate,
            // wondering why I tread this earth,
            // why existence beckons with its haunting allure,
            // and what profound purpose breath weaves into the stillness of my soul.

            // "Whispers of Existence: A Dance with Uncertainty"
           
    }


    public function updateAccount(Request $request)
    {
        // dd($request->all());

    $id = $request->input('selectedId');

    $company = session('user')['company_id'];
        
    $date = $request->input('e_birthdate');
    $newDate = Carbon::createFromFormat('m/d/Y', $date)
        ->format('Y-m-d');

    $date = $request->input('e_date_started');
    $newDateDS = Carbon::createFromFormat('m/d/Y', $date)
    ->format('Y-m-d');
        
    $date = $request->input('e_end_of_contract');
    $newDateEC = Carbon::createFromFormat('m/d/Y', $date)
    ->format('Y-m-d');
                        
        $validator = Validator::make($request->all(), [
            'e_email' =>  'max:255|required|email|unique:users,email,'.$id,
            'e_gender' => 'required',
            'e_type_of_deployment' => 'required',
        ],[
            'e_email.unique' => 'Email is already use.',
            'e_gender' => 'Select your gender.',
            'e_type_of_deployment' => 'Select type of deployment.',

            
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
            $merchandiser ->address = $request->input('e_address');
            $merchandiser ->region = $request->input('e_region');
            $merchandiser ->contact_number = $request->input('e_number');
            $merchandiser ->email_address = $request->input('e_email');
            $merchandiser ->date_started = $newDateDS;
            $merchandiser ->end_of_contract = $newDateEC;
            $merchandiser ->remarks = $request->input('e_remarks');
            $merchandiser ->rate_type = $request->input('e_rate_type');
            $merchandiser ->type_of_deployment = $request->input('e_type_of_deployment');
            $merchandiser ->is_active = $request->input('e_status');
            $merchandiser ->company_id = $company;
            $merchandiser ->update();
            
            return redirect(('/accountsupervisor/merchandiser'))
            ->with('update-success', "Merchanidser update successfully");
        }
    }
}




