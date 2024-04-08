<?php

namespace App\Http\Controllers\PayrollHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Session;
use DB;

class PayrollHeadController extends Controller
{
    public function view_dashboard(){

        $data = array();
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        }
       return view('payrollhead.dashboard', compact('data'));

    }

    //Efc starts here
    public function view_efc_payrollhead(){

        //$efcPayrollheadArray = ['None'];

            $efcPayrollheadArray = User::
            where('user_type' , 'Payroll Officer')
            ->select(DB::raw("CONCAT(first_name ,' ',  last_name) AS display_name"),'id')
            ->pluck('display_name','id')
            ->toArray();
    
          //  $efcPayrollheadArray += $efcpayrollhead;

    
       return view('payrollhead.efcpayrollhead', compact('efcPayrollheadArray'));


    }


    //Mckenzie starts here
    public function view_mckenzie_payrollhead(){

        // $mckenziePayrollheadArray = ['None'];

        $mckenziePayrollheadArray = User::
            where('user_type' , 'Payroll Officer')
            ->select(DB::raw("CONCAT(first_name ,' ',  last_name) AS display_name"),'id')
            ->pluck('display_name','id')
            ->toArray();
    
            // $mckenziePayrollheadArray += $mckenziepayrollhead;

            // $data = array();
            // if (Session::has('user')){
            //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();
    
             
            // }
    
       return view('payrollhead.mckenziepayrollhead', compact('mckenziePayrollheadArray'));


    }

    //Rfm starts here
    public function view_rfm_payrollhead(){

        $rfmPayrollheadArray = ['none'];

            $rfmpayrollhead = User::
            where('user_type', 'Payroll Officer')
            ->select(DB::raw("CONCAT(first_name ,'', last_name) AS display_name"),'id')
            ->pluck('display_name','id')
            ->toArray();

            $rfmPayrollheadArray += $rfmpayrollhead;
        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
        return view('payrollhead.rfmpayrollhead', compact('rfmPayrollheadArray'));

    }

    //Magis starts here
    public function view_magis_payrollhead(){

        $magisPayrollheadArray = ['None'];

            $magispayrollhead = User::
            where('user_type', 'Payroll Officer')
            ->select(DB::raw("CONCAT(first_name ,'', last_name) AS display_name"),'id')
            ->pluck('display_name','id')
            ->toArray();

            $magisPayrollheadArray += $magispayrollhead;

        // $data = array();
        // if (Session::has('user')){
        //     $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        // }
        return view('payrollhead.magispayrollhead', compact('magisPayrollheadArray'));

    }

}
