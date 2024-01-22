<?php

namespace App\Http\Controllers\AccountSupervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Session;

class AccountSupervisorController extends Controller
{
    public function view_dashboard(){

        $data = array();
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        }
    
       return view('accountsupervisor.dashboard', compact('data'));

    }

    
}
