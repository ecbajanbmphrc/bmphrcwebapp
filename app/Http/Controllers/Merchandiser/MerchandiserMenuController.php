<?php

namespace App\Http\Controllers\Merchandiser;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use App\Http\Middleware\Merchandiser;
use Illuminate\Http\Request;

use Session;

class MerchandiserMenuController extends Controller
{
    public function view_menu(){
    $data = array();
        if (Session::has('user')){
            $data = User::where('id', '=', Session::get('user')['current_user_id'])->first();

         
        }
       return view('merchandiser.menu', compact('data'));

        
        }
}
