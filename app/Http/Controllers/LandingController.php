<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LandingController extends Controller
{
    public function login()
    {
   
      return view('auth.login');
    
    }

    public function superadmin_login(){
          return view('auth.superadminlogin');      
    }

     public function payrollhead_login(){
          return view('auth.payrollheadlogin');      
    }
    
     public function payrollofficer_login(){
          return view('auth.payrollofficerlogin');      
    }

     public function accountsupervisor_login(){
          return view('auth.accountsupervisorlogin');      
    }

    // public function home(){

    //   if(Auth::check()){
    //     $user = Auth::user();

    //     if($user->user_type=="User"){
    //       return redirect('/merchandisermenu');
    //     }

    //   }else{
    //     return view('landing.Home');
    //   }
     
    // }

    public function home(){

        return view('landing.Home');
     
    }


}
