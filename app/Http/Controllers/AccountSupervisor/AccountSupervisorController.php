<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coordinator;
use App\Models\Merchandiser;
use App\Models\CompanyDoor;

use Session;
use DB;

class AccountSupervisorController extends Controller
{
    public function view_dashboard(){

        

        $company_me =  session('user')['company_id'];

        $merchandiser_count = Merchandiser::
        where([
            'company_id'  => $company_me,
            'is_active' => '1' 
     ])
        ->count();

        $store_count = CompanyDoor::
        where([
            'company_id'  => $company_me,
            'status' => 'active' 
     ])
        ->count();

        $coordinator_count = Coordinator::
        where('company_id' , '='  , $company_me) 
        ->count();
    
       return view('accountsupervisor.dashboard', compact('merchandiser_count', 'store_count' , 'coordinator_count' ));

    }

    public function view_door(){

        $coordinator_array = [0 => "None"];
      
        // $coordinators = Coordinator::where('first_name', '!=', 'none')
        // // ->select('name', 'id')
        // ->pluck('first_name' , 'id')
        // ->toArray();


        $coordinators = Coordinator::
        select(DB::raw("CONCAT(first_name ,' ',  last_name) AS display_name"),'id')
        ->get()
        ->pluck('display_name','id')
        ->toArray();



         $coordinator_array += $coordinators;

        // dd($coordinator_array);
    
    
       return view('accountsupervisor.doors' , compact('coordinator_array'));

    }

    public function view_coordinator(){

        return view('accountsupervisor.coordinator');

    }

    public function view_merchandiser(){

        return view('accountsupervisor.merchandiser');

    }

    public function view_manning(){
        $coordinator_array = [0 => "None"];
      
        // $coordinators = Coordinator::where('first_name', '!=', 'none')
        // // ->select('name', 'id')
        // ->pluck('first_name' , 'id')
        // ->toArray();


        $coordinators = Coordinator::
        select(DB::raw("CONCAT(first_name ,' ',  last_name) AS display_name"),'id')
        ->get()
        ->pluck('display_name','id')
        ->toArray();



         $coordinator_array += $coordinators;

        return view('accountsupervisor.manning' , compact('coordinator_array'));

    }

    
}
