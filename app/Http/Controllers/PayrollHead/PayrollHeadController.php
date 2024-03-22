<?php

namespace App\Http\Controllers\PayrollHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Session;

class PayrollHeadController extends Controller
{
    public function view_dashboard(){

        $data = array();
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        }
       return view('payrollhead.dashboard', compact('data'));

    }

    public function view_efc_payrollhead(){

        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
       return view('payrollhead.efcpayrollhead');

    }

    public function view_mckenzie_payrollhead(){

        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
       return view('payrollhead.mckenziepayrollhead');

    }
    public function view_rfm_payrollhead(){

        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
       return view('payrollhead.rfmpayrollhead');

    }

    public function view_magis_payrollhead(){

        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
       return view('payrollhead.magispayrollhead');

    }

}
