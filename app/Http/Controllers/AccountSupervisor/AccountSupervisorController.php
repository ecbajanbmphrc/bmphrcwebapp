<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coordinator;
use App\Models\Merchandiser;

use Session;
use DB;

class AccountSupervisorController extends Controller
{
    public function view_dashboard(){

    
    
       return view('accountsupervisor.dashboard');

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

    
}
