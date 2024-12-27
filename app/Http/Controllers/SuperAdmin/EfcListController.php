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

class EfcListController extends Controller
{
    //getupdate
    public function getUpdateData($id)
    {
        $company_door = CompanyDoor::find($id , ['account' , 'region' , 'area' , 
        'store_name' , 'store_address', 'status' ,]);

        if ($company_door) {
             return response()->json($company_door);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    // getview
    public function getViewData($id)
    {
   
        $company_door = CompanyDoor::find($id , ['account' , 'region' , 'area' , 'store_name' , 
        'store_address' , 'supervisor_id', 'status' ,]);

        if ($company_door) {
             return response()->json($company_door);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function fetchData(Request $request)
    {
        $data = CompanyDoor::where('company_id', '3')->get();
        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;
            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';
            
            return $item;
        });

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
            'c_store_name' => 'required',
            'c_store_address' => 'required',
            'c_sup' => 'required',
            
        ],[
            'c_account.required' => 'Select designated account.',
            'c_region.required' => 'Select designated region.',
            'c_area.required' => 'Select which area it belong.',
            'c_store_name.required' => 'Define store name.',
            'c_store_address.required' => 'Select Address.',
            'c_sup' => 'Select Supervisor.',
        ]);

    
    
        if ($validator->fails()) {
            // Alert::error('Registration Failed');
            return redirect('/superadmin/efc')
            
                ->withErrors($validator)
                ->withInput()
                ->with("create-failed", "Account failed to create");
        }else{     
            $company_door = new CompanyDoor;

            // $company_door->supervisor_id = 

            $company_door->account = $request->input('c_account');
            $company_door->region = $request->input('c_region');
            $company_door->area = $request->input('c_area');
            $company_door->store_name = $request->input('c_store_name');
            $company_door->store_address = $request->input('c_store_address');
            $company_door->supervisor_id = $request->input('c_sup');
            $company_door->company_id = $company;
            $company_door->status = $status;
            $company_door->save();
                
            return redirect(('/superadmin/efc'))->with('create-success', "Account registered successfully"); 
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
            return redirect('/superadmin/efc')
            
            ->withErrors($validator)
            ->withInput()
            ->with("update-failed", "Account registered successfully");
        }else{
            $company_door = CompanyDoor::find($id);
            $company_door->supervisor_id = $request->input('e_sup');
            $company_door->account = $request->input('e_account');
            $company_door->region = $request->input('e_region');
            $company_door->area = $request->input('e_area');
            $company_door->store_name = $request->input('e_store_name');
            $company_door->store_address = $request->input('e_store_address');
            $company_door->status = $request->input('e_status');
            $company_door->company_id = $company;
            $company_door->update();
        
            return redirect(('/superadmin/efc'))->with('update-success', "Account updated successfully");     
        }     
    }
}
