<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Coordinator;
use Session;

use DB;

class SuperAdminController extends Controller
{
    public function view_dashboard(){

        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
       //return view('superadmin.dashboard', compact('data'));
       return view('superadmin.dashboard');

    }

    // function add_to_array($key_value)
    // {
    //     $arr = [];
    //     foreach ($key_value as $key => $value) {
    //         $arr[] = [$key=>$value];
    //     }
    //     return $arr;
    // }

    public function view_accountsupervisor(){

       
        //$array = [1 => "none"];
      
        $companies = Company::where('name', '!=', 'none')
        // ->select('name', 'id')
        ->pluck('name' , 'id')
        ->toArray();


       // $array += $companies;
    
      //  dd ($array);
    


    
       return view('superadmin.accountsupervisor', compact('companies'));
        // return view('superadmin.accountsupervisor');   
    }

    public function view_payrollofficer(){

        return view('superadmin.payrollofficer');       
    }


    public function view_superadmin(){
    
        return view('superadmin.superadmin');        
    }


    public function view_company_efc(){

       

        return view('superadmin.efccompanylist');        
    }

    public function view_company_mckenzie(){
    
        return view('superadmin.mckenziecompanylist');        
    }

    public function view_company_ecossential(){

        return view('superadmin.ecossentialcompanylist');
        
    }

    public function view_company_magis(){

        return view('superadmin.magiscompanylist');
        
    }

    public function view_company_rfm(){

        return view('superadmin.rfmcompanylist');

    }


    public function view_payrollhead(){

        return view('superadmin.payrollhead');       
    }

    public function view_treasury(){

        return view('superadmin.treasury');       
    }
    
}
