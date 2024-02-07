<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDoor;

use Session;

class AccountSupervisorDoorListController extends Controller
{
    public function fetchData(Request $request)
    {
     
       // $company_id = $request->input('u', '3');


       $user_type = session('user')['company_id'];


        $data = CompanyDoor::where([
            ['company_id', '=' , $user_type],
            ['status', '=' , 'active']
            ])->get();


        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;


            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">';

            
            return $item;
        });

        return response()->json(['data' => $data]);
    }

    protected function getViewData($id)
    {

        
        // $company_door = CompanyDoor::find($id);

        $company_door = CompanyDoor::where('id' , $id)
        ->select('account' , 'region' , 'area' , 'account_branch' , 'type_of_deployment')
        ->first();

        if ($company_door) {
            // Data found for the given ID
            return response()->json($company_door);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

}
