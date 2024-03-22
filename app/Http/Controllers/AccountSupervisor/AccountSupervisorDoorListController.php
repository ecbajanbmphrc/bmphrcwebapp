<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDoor;
use App\Models\Manning;
use App\Models\Merchandiser;

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
            //
   
            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';
            //
            return $item;
        });

        return response()->json(['data' => $data]);

    }


    public function fetchMerchandiserData(Request $request)
    {     
       // $company_id = $request->input('u', '3');
        $arrayid = [];

        $xmerchandiser = Manning::select('merchandiser_id')
       // ->where('door_id' , '4')
        ->distinct()
        ->get();

        $name = $request->input('selectedID');
  
       $user_type = session('user')['company_id'];

        $data = Merchandiser::where([
            ['company_id', '=' , $user_type],
            ['is_active', '=' , '1']  
         //   ['id' , '<>' , [23,2]]
            ])
            ->whereNotIn('id', $xmerchandiser)
            ->get();

        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;

            $item['actions'] = '<img src= "/asset/img/button_img/add32.png" alt="Button 1" class="button-image3" style="height: 25px; width: 25px; ">';
    
            return $item;
        });

        return response()->json(['mdata' => $data]);

    }



    public function save(Request $request)
    {
        // dd(request->all());
    
        $company = session('user')['user_id'];
        $status = 1;

        $door = session('door')['door_id'];
        $status = 4;

        $coordinator = session('coordinator')['coordinator_id'];
        $status = 2;

        $merchandiser = session('merchandiser')['merchandiser_id'];
        $status = 2;

        $company = session('user')['company_id'];
        $status = 2;

        //new code added
        return view('merchandiserList', compact('company', 'door', 'coordinator', 'merchandiser'));
        
    }

   

    

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
        ->select('manning_lists.*' , 'merchandisers.first_name as fname' , 'merchandisers.middle_name as mname' , 'merchandisers.last_name as lname' )
        ->where('door_id', $id)
        ->get();



        $company_door = $company_door->map(function ($item) {
            $item = (array)$item; 
        
          
            $item['fname'] = $item['fname'];
            $item['mname'] = $item['mname'];
            $item['lname'] = $item['lname'];

            //<!-- 11-03-2024 new code added starts here -->
            $item['actions'] = '<i class="bi bi-x-circle-fill" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';
            
            //
            //
            
            //<!-- 11-03-2024 new code added ends here -->
            return $item;
        });

        return response()->json(['data' => $company_door]);


    }

    // 18-03-2024 new code added starts here
    public function destroy($id) {
        try {
            
            DB::table('manning_lists')->where('id', $id)->delete();

    
           // return redirect()->route('accountsupervisor.view.door')->with('success', 'Merchandiser deleted successfully');
           return response()->json(['success' => 'success']);
        } catch (Exception $e) {
            
            //return redirect()->route('accountsupervisor.view.door')->with('error', 'Error deleting merchandiser');
        }
    }


    //18-03-2024 new code added ends here


   


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

    public function saveMerchandiserData(Request $request){
       //  dd($request->all());

       $company = session('user')['company_id'];
      

        $manning = new Manning;
        $manning ->door_id = $request->_store_id;
        $manning ->coordinator_id = $request->_coordinator_id;
        $manning ->merchandiser_id = $request->_merchandiser_id;
        $manning ->company_id = $company;
        $manning -> save();

        // $manning->door_id = $data['door_id'];
        // $manning->merchandiser_id = $data['merchandiser_id'];
        // $manning->coordinator_id = $data['coordinator_id'];
        // $manning->company_id = $data['company_id'];

        // $manning ->save();

       // return response()->json(['data'=>$id]);
        //new code added ends here (still not working)

       // return response()->json(['data' => $id])
    }

}
