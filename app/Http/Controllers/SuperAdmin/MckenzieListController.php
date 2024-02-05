<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDoor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

use DB;

class MckenzieListController extends Controller
{
    // public function getUpdateData(Request $request)
    // {
    //     $id = $request->id;
        
    //     $company_door = CompanyDoor::where('id', '=', $id)
    //     ->select('id' ,'account', 'region', 'area', 'account_branch' , 'type_of_deployment' , 'status' )
    //     ->first();
    //     if ($company_door) {
    //         // Data found for the given ID
    //         return response()->json($company_door);
    //     } else {
    //         // Data not found
    //         return response()->json(['error' => 'Data not found'], 404);
    //     }
    // }

    public function getUpdateData($id)
    {
        
        // $company_door = CompanyDoor::where('id', '=', $id)
        $company_door = CompanyDoor::find($id)
        ->select('account', 'region', 'area', 'account_branch' , 'type_of_deployment' , 'status' )
        ->first();
        if ($company_door) {
            // Data found for the given ID
             return response()->json($company_door);
       
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getViewData(Request $request)
    {

        
        $user = User::where('id', '=', $request->id)
        ->select('id' ,'first_name', 'last_name', 'email', 'contact_number')
        ->first();

        if ($user) {
            // Data found for the given ID
            return response()->json($user);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function fetchData(Request $request)
    {
     
       // $company_id = $request->input('u', '3');


        $data = CompanyDoor::where('company_id', '3')->get();


        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;


            // $item['active'] = '<a href="#" class="clickable" data-id="' . $item['id'] . '"><img src="' . ($item['is_active'] == 1 ? '/asset/img/button_img/active-48.png' : '/asset/img/button_img/inactive-48.png') . '" alt="' . ($item['is_active'] == 1 ? 'Active' : 'Inactive') . '"></a>';


            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            
            return $item;
        });

        return response()->json(['data' => $data]);
    }

    public function getDataById(Request $request)
    {

    $id = $request->input('id');
    $data = User::find($id);

    return response()->json(['data' => $data]);
    }



    public function saveAccount(Request $request)
    {
            //dd($request->all());
            $company = 3;
            $status = "active";
            

            $validator = Validator::make($request->all(), [
                'c_account' => 'required',
                'c_region' => 'required',
                'c_area' => 'required', 
            ],[
                'c_account.required' => 'Select designated account.',
                'c_region.required' => 'Select designated region.',
                'c_area.required' => 'Select which area it belong.',
            ]);

       
        
            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/superadmin/mckenzie')
               
                            ->withErrors($validator)
                            ->withInput()
                            ->with("create-failed", "Account failed to create");
            }else{

              
                
                $company_door = new CompanyDoor;
                $company_door->account = $request->input('c_account');
                $company_door->region = $request->input('c_region');
                $company_door->area = $request->input('c_area');
                $company_door->account_branch = $request->input('c_account_branch');
                $company_door->type_of_deployment = $request->input('c_type_of_deployment');
                $company_door->company_id = $company;
                $company_door->status = $status;
                $company_door->save();
            
           
                //return view('auth.login', compact('Auth.login'));
                //return redirect('registration');
                return redirect(('/superadmin/mckenzie'))->with('create-success', "Account registered successfully");
                //return redirect(route('auth.registration'))->withToastSuccess('Task Created Successfully!');
               
            }
          

           
    }


    public function updateAccount(Request $request)
    {
              //dd($request->all());
        

             $id = $request->input('selectedId');
           
            $company = 3;
    
            

            $validator = Validator::make($request->all(), [
                'e_account' => 'required',
                'e_region' => 'required',
                'e_area' => 'required', 
                'e_status' => 'required',
            ],[
                'e_account.required' => 'Select designated account.',
                'e_region.required' => 'Select designated region.',
                'e_area.required' => 'Select which area it belong.',
                'e_status.required' => 'Select what is current status.',
            ]);
          
        


            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/superadmin/mckenzie')
               
                            ->withErrors($validator)
                            ->withInput()
                            ->with("update-failed", "Account registered successfully");
            }else{

              
                
                $company_door = CompanyDoor::find($id);
                $company_door->account = $request->input('e_account');
                $company_door->region = $request->input('e_region');
                $company_door->area = $request->input('e_area');
                $company_door->account_branch = $request->input('e_account_branch');
                $company_door->type_of_deployment = $request->input('e_type_of_deployment');
                $company_door->status = $request->input('e_status');
                $company_door->company_id = $company;
                $company_door->update();
            
        
                return redirect(('/superadmin/mckenzie'))->with('update-success', "Account updated successfully");
           
               
            }
          

           
    }
}
