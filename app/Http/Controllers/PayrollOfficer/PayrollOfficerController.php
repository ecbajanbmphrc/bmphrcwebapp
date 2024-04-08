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
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();
        
        }

        return view('payrollofficer.payrolltransferlist', compact('data'));
    }

}
