<?php

namespace App\Http\Controllers\PayrollHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manning;

use App\Models\CompanyDoor;

use DB;

class PayrollHeadMagisListController extends Controller
{
    public function fetchData(Request $request)
    {     
       
    

        $data = CompanyDoor::where([
           // ['company_id', '=' , $user_type],
            ['status', '=' , 'active'] , 
            ['id' , '<>' , 1]
            ])->get();

        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;
            //
   
            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">';
            //
            return $item;
        });

        return response()->json(['data' => $data]);
    }
}
