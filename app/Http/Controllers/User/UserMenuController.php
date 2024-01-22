<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Http\Request;



use Session;


class UserMenuController extends Controller
{
    public function viewusermenu(){
        $data = array();
        if (Session::has('current_user_id')){
            $data = User::where('id', '=', Session::get('current_user_id'))->first();
        }
        return view('user.usermenu', compact('data'));
    }
}
