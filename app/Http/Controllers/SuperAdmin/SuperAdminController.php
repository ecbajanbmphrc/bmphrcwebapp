<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Session;


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

    public function view_accountsupervisor(){
        $data = Company::where('name', '!=', 'none')->pluck('name', 'id');

        return view('superadmin.accountsupervisor', compact('data'));
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

    public function view_company_madis(){

        return view('superadmin.madiscompanylist');
        
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
