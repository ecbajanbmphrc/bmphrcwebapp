<?php

namespace App\Http\Controllers\Treasury;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreasuryController extends Controller
{
    public function view_dashboard(){

       return view('treasury.dashboard');

    }

    public function view_rate(){

        return view('treasury.rate');
        
    }
}
