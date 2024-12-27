<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Session;

class PayrollOfficerController extends Controller
{
    
    public function view_dashboard(){

        $data = array();
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        }
       return view('payrollofficer.dashboard', compact('data'));

        }

    public function view_payrollofficerlist(){
        $data = array();
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

        }
        return view('payrollofficer.payrollofficerlist', compact('data'));
    }

    public function view_payrolltransferlist(){
        $data = array();
        $data =  session('user')['company_id'];
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();
        
        }

        return view('payrollofficer.payrolltransferlist', compact('data'));
    }

    public function view_payrollofficerinput(){

        return view('payrollofficer.payrollofficerinput');
    }

    public function view_payrollgcash(){

        return view('payrollofficer.payrollgcash');
    }

    public function view_payrollrcbc(){

        return view('payrollofficer.payrollrcbc');
    }

    public function view_payrollrcbcwallet(){

        return view('payrollofficer.payrollrcbcwallet');
    }

    public function view_payrollcebuana(){

        return view('payrollofficer.payrollcebuana');
    }

    public function view_payrolleastwest(){

        return view('payrollofficer.payrolleastwest');
    }

    public function view_payrollbpi(){

        return view('payrollofficer.payrollbpi');
    }

    public function view_payrollbdo(){

        return view('payrollofficer.payrollbdo');
    }

    public function view_payrollbank(){

        return view('payrollofficer.payrollbank');
    }

    
    


}
