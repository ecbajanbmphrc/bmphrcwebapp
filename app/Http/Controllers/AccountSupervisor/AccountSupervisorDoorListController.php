<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDoor;
use App\Models\Manning;

use Session;
use DB;

class AccountSupervisorDoorListController extends Controller
{
    public function fetchData(Request $request)
    {     
       // $company_id = $request->input('u', '3');

       $user_type = session('user')['company_id'];

        $data = CompanyDoor::where([
            ['company_id', '=' , $user_type],
            ['status', '=' , 'active'] , 
            ['id' , '<>' , 1]
            ])->get();

        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;

            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';
            //
            $item['fullname'] = $item['first_name'] . " " . $item['last_name'];
            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';
            //
            return $item;
        });

        return response()->json(['data' => $data]);

    }
    

    //
            //     $data = Doors::
            //     where('Doors.company_id', session('user')['company_id'] )
            // //  ->select('coordinators.*', 'company_doors.account_branch as branch')
            // ->get();


            // $data = $data->map(function ($item, $key) {
            // $item['#'] = $key + 1;

            // $item['fullname'] = $item['first_name'] . " " . $item['last_name'];


            // $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';


            // return $item;
            // });

            // return response()->json(['data' => $data]);

            
        
    

    //

    protected function getViewData($id)
    {   

        $merchandiser_count = Manning::
        where([
           'door_id'  => $id,
       ])
        ->count();

        response()->json($merchandiser_count); 


        $company_door = DB::table('company_doors')
        ->leftJoin('coordinators', 'company_doors.coordinator_id', '=', 'coordinators.id')
        ->select('company_doors.*', DB::raw("CONCAT(COALESCE(coordinators.first_name, 'NULL'), ' ', COALESCE(coordinators.last_name, '')) AS get_name"), 'company_doors.coordinator_id')
        ->where('company_doors.id', $id)
        ->first();

        if ($company_door) {
            // Data found for the given ID
            //return response()->json($company_door);
            return response()->json(['merchandiser_count' => $merchandiser_count , 'door' => $company_door]);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }

        return response()->json([
            'merchandiser_count' =>

            $merchandiser_count

        ]);
    }


    protected function getViewMerchandiserManning($id){

        $company_door = DB::table('manning_lists')
        ->leftJoin('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
        ->select('manning_lists.*' , 'merchandisers.first_name as fname')
        ->where('door_id', $id)
        ->get()
        ->toArray();


        $collection = collect([
            ['account_id' => 'account-x10', 'product' => 'Chair'],
            ['account_id' => 'account-x10', 'product' => 'Bookcase'],
            ['account_id' => 'account-x11', 'product' => 'Desk'],
        ]);
        
        $grouped = $collection->groupBy('account_id');
        
        $grouped->toArray();

        

        if ($company_door) {
            // Data found for the given ID
            return response()->json($company_door);
          
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }

    }

   


    protected function getUpdateData($id)
    {


        // $company_door = DB::table('company_doors')
        // ->leftJoin('coordinators', 'company_doors.coordinator_id', '=', 'coordinators.id')
        // ->select('company_doors.*', DB::raw("CONCAT(COALESCE(coordinators.first_name, 'NULL'), COALESCE(coordinators.last_name, '')) AS display_name"), 'company_doors.coordinator_id')
        // ->where('company_doors.id', $id)
        // ->first();

        $company_door = DB::table('company_doors')
        ->select('company_doors.*')
        ->where('company_doors.id', $id)
        ->first();

        $merchandiser_count = Manning::
        where([
           'door_id'  => $id,
       ])
        ->count();
    
       // $company_door += $merchandiser_count;


        if ($company_door) {
            // Data found for the given ID
            return response()->json(['count' => $merchandiser_count , 'door' => $company_door]);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function updateAccount(Request $request)
    {
             //dd($request->all());     
                $company_door = CompanyDoor::find($request->input('selectedID'));
                $company_door->coordinator_id = $request->input('e_coordinator');
                $company_door->update();
               // dd($company_door);
                  
                return redirect(('/accountsupervisor/door'))->with('update-success', "Account updated successfully");
           
    }

}
