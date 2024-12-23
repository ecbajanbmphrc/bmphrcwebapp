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
    //get update
    public function getUpdateData($id)
    {
        
        $company_door = CompanyDoor::find($id , ['account' , 'region' , 'area' , 
        'store_name' , 'store_address', 'status' , ]);

        if ($company_door) {
             return response()->json($company_door);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }   

    // getview
    public function getViewData($id)
    {
        $company_door = CompanyDoor::find($id, ['account', 'region', 'area', 'store_name', 
        'store_address', 'status']);

        if ($company_door) {
            return response()->json($company_door);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function fetchData(Request $request)
    {
        $data = CompanyDoor::where('company_id', '2')->get();
        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;
            $item['actions'] = '<img src="/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';
           
            return $item;
        });

        return response()->json(['data' => $data]);
    }

    public function saveAccount(Request $request)
    {
        $company = 2;
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
            'c_store_name.required' => 'Select which area it belong.',
            'c_store_address.required' => 'Select which area it belong.',
            'c_sup' => 'Select Supervisor.',
        ]);

        if ($validator->fails()) {
            return redirect('/superadmin/mckenzie')
                
                ->withErrors($validator)
                ->withInput()
                ->with("create-failed", "Account failed to create");
        } else {
            $company_door = new CompanyDoor;
            $company_door->account = $request->input('c_account');
            $company_door->region = $request->input('c_region');
            $company_door->area = $request->input('c_area');
            $company_door->store_name = $request->input('c_store_name');
            $company_door->store_address = $request->input('c_store_address');
            $company_door->supervisor_id = $request->input('c_sup');
            $company_door->company_id = $company;
            $company_door->status = $status;
            $company_door->save();
            
            return redirect('/superadmin/mckenzie')->with('create-success', "Account registered successfully");
        }
    }

    public function updateAccount(Request $request)
    {
        $id = $request->input('selectedId');
        $company = 2;
        $validator = Validator::make($request->all(), [
            'e_account' => 'required',
            'e_region' => 'required',
            'e_area' => 'required',
            'e_store_name' => 'required',
            'e_store_address' => 'required', 
            'e_status' => 'required',
        ],[
            'e_account.required' => 'Select designated account.',
            'e_region.required' => 'Select designated region.',
            'e_area.required' => 'Select which area it belong.',
            'e_store_name.required' => 'Select which area it belong.',
            'e_store_address.required' => 'Select which area it belong.',
            'e_status.required' => 'Select what is current status.',
        ]);

        if ($validator->fails()) {
            return redirect('/superadmin/mckenzie')
                ->withErrors($validator)
                ->withInput()
                ->with("update-failed", "Account update failed");
        } else {
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

                return redirect('/superadmin/mckenzie')->with('update-success', "Account updated successfully");
            } 
            // else {
            //     return redirect('/superadmin/mckenzie')->with('update-failed', "Account not found");
            // }
        // }
    }
}
