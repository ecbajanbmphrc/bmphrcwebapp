<?php

namespace App\Http\Controllers\Treasury;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RateCard; 
use RealRashid\SweetAlert\Facades\Alert;

use DB;


class TreasuryRateCardListController extends Controller
{
    public function fetchData(Request $request)
    {
        $data = RateCard::get();

    //    / dd($data);
        $data = $data->map(function ($item, $key){ 
            //$item = (array)$item;
            $item['#'] = $key +1;
            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"></img>
            <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;"></img>';
                
            return $item;
        });
                
        return response()->json(['datadata' => $data]);
    }

    public function saveRateCard(Request $request)
    {
        $test = $request->input('a_night_differential_wdo');
    // dd($request->all());
    //    $rate_cards = new RateCard;
    //    $rate_cards->region = $request->input('a_region');
    //    $rate_cards->rate_type = $request->input('a_rate_type');
    //    $rate_cards->rate_per_day = $request->input('a_rate_per_day');
    //    $rate_cards->rate_per_hour =  number_format((float)($request->input('a_rate_per_hour')) , 2);
    //    $rate_cards->special_holiday =  number_format((float)($request->input('a_special_holiday')) , 2);
    //    $rate_cards->wdo =  number_format((float)($request->input('a_wdo')) , 2);
    //    $rate_cards->special_holiday_rest_day =  number_format((float)($request->input('a_special_holiday_rest_day')) , 2);
    //    $rate_cards->legal_holiday =  number_format((float)($request->input('a_legal_holiday')) , 2);
    //    $rate_cards->legal_holiday_rest_day =  number_format((float)($request->input('a_legal_holiday_rest_day')) , 2);
    //    $rate_cards->double_pay =  number_format((float)($request->input('a_double_pay')) , 2);
    //    $rate_cards->double_pay_rest_day =  number_format((float)($request->input('a_double_pay_rest_day')) , 2);
    //    $rate_cards->double_pay_rest_day =  number_format((float)($request->input('a_double_pay_rest_day')) , 2);
       
       $rate_cards = new RateCard;
       $rate_cards->region = $request->input('a_region');
    // $rate_cards->rate_type = $request->input('a_rate_type');
       $rate_cards->rate_per_day = $request->input('a_rate_per_day');
       $rate_cards->rate_per_hour = $request->input('a_rate_per_hour');

       // special rates starts here
       $rate_cards->special_rate_special_holiday = $request->input('a_special_rates_special_holiday');
       $rate_cards->special_rate_wdo = $request->input('a_special_rates_wdo');
       $rate_cards->special_rate_special_holiday_rest_day = $request->input('a_special_rates_special_holiday_rest_day') ;
       $rate_cards->special_rate_legal_holiday = $request->input('a_special_rates_legal_holiday') ;
       $rate_cards->special_rate_legal_holiday_rest_day = $request->input('a_special_rates_legal_holiday_rest_day') ;
       $rate_cards->special_rate_double_pay =  $request->input('a_special_rates_double_pay') ;
       $rate_cards->special_rate_double_pay_rest_day = $request->input('a_special_rates_double_pay_rest_day') ;
       
       // overtime starts here
       $rate_cards->overtime_regular_day = $request->input('a_overtime_regular_day');
       $rate_cards->overtime_special_holiday = $request->input('a_overtime_special_holiday');
       $rate_cards->overtime_wdo = $request->input('a_overtime_wdo');
       $rate_cards->overtime_special_holiday_rest_day = $request->input('a_overtime_special_holiday_rest_day') ;
       $rate_cards->overtime_legal_holiday = $request->input('a_overtime_legal_holiday') ;
       $rate_cards->overtime_legal_holiday_rest_day = $request->input('a_overtime_legal_holiday_rest_day') ;
       $rate_cards->overtime_double_pay = $request->input('a_overtime_double_pay') ;
       $rate_cards->overtime_double_pay_rest_day = $request->input('a_overtime_double_pay_rest_day') ;


       // night differential
       $rate_cards->night_differential_regular_day = $request->input('a_night_differential_regular_day');
       $rate_cards->night_differential_special_holiday = $request->input('a_night_differential_special_holiday');
       $rate_cards->night_differential_wdo = $request->input('a_night_differential_wdo');
       $rate_cards->night_differential_special_holiday_rest_day = $request->input('a_night_differential_special_holiday_rest_day') ;
       $rate_cards->night_differential_legal_holiday = $request->input('a_night_differential_legal_holiday') ;
       $rate_cards->night_differential_legal_holiday_rest_day = $request->input('a_night_differential_legal_holiday_rest_day') ;
       $rate_cards->night_differential_double_pay = $request->input('a_night_differential_double_pay') ;
       $rate_cards->night_differential_double_pay_rest_day = $request->input('a_night_differential_double_pay_rest_day') ;

       // overtime with night differential
       $rate_cards->overtime_with_night_differential_regular_day = $request->input('a_overtime_with_night_differential_regular_day');
       $rate_cards->overtime_with_night_differential_special_holiday = $request->input('a_overtime_with_night_differential_special_holiday');
       $rate_cards->overtime_with_night_differential_wdo = $request->input('a_overtime_with_night_differential_wdo');
       $rate_cards->overtime_with_night_differential_special_holiday_rest_day = $request->input('a_overtime_with_night_differential_special_holiday_rest_day') ;
       $rate_cards->overtime_with_night_differential_legal_holiday = $request->input('a_overtime_with_night_differential_legal_holiday') ;
       $rate_cards->overtime_with_night_differential_legal_holiday_rest_day = $request->input('a_overtime_with_night_differential_legal_holiday_rest_day') ;
       $rate_cards->overtime_with_night_differential_double_pay = $request->input('a_overtime_with_night_differential_double_pay') ;
       $rate_cards->overtime_with_night_differential_double_pay_rest_day = $request->input('a_overtime_with_night_differential_double_pay_rest_day') ;
       $rate_cards->save();

       return redirect(('/treasury/rate'))->with('add-success', "Account registered successfully");
    }

    public function updateRateCard(Request $request)
    {
        
        $id = $request->input('selectedId');

        // $id = $request->input('id');

        // $validator = Validator::make($request)->all(),
        // [ 
        //     'u_region' => 'required',
        //     'u_rate_tpe' => 'required',
        //     'u_rate_per_day' => 'required',
        //     'u_rate-per_hour' => 'required',
        //     'u_special_holiday' => 'required',
        //     'u_wdo' => 'required',
        //     'u_special_holiday_rest_day' => 'required',
        //     'u_legal_holiday' => 'required',
        //     'u_legal_holiday_rest_day' => 'required',
        //     'u_double_pay' => 'required',
        //     'u_double_pay_rest_day' => 'required',
        // ]

        // 

        $rate_cards = RateCard::find($id);
        $rate_cards->region = $request->input('u_region');
        // $rate_cards->rate_type = $request->input('u_rate_type');
        $rate_cards->rate_per_day = $request->input('u_rate_per_day');
        $rate_cards->rate_per_hour = $request->input('u_rate_per_hour');

        // speciarl rate
        $rate_cards->spcecial_rate_special_holiday = $request->input('u_special_rate_special_holiday');
        $rate_cards->spcecial_rate_wdo = $request->input('u_special_rate_wdo');
        $rate_cards->spcecial_rate_special_holiday = $request->input('u_special_rate_special_holiday');
        $rate_cards->spcecial_rate_special_holiday_rest_day = $request->input('u_special_rate_special_holiday_rest_day');
        $rate_cards->spcecial_rate_legal_holiday = $request->input('u_special_rate_legal_holiday');
        $rate_cards->spcecial_rate_legal_holiday_rest_day = $request->input('u_special_rate_legal_holiday_rest_day');
        $rate_cards->spcecial_rate_double_pay = $request->input('u_special_rate_double_pay');
        $rate_cards->spcecial_rate_double_pay_rest_day = $request->input('u_special_rate_double_pay_rest_day');

        // overtime
        $rate_cards->overtime_regular_day = $request->input('u_overtime_regular_day');
        $rate_cards->overtime_special_holiday = $request->input('u_overtime_special_holiday');
        $rate_cards->overtime_wdo = $request->input('u_overtime_wdo');
        $rate_cards->overtime_special_holiday = $request->input('u_overtime_special_holiday');
        $rate_cards->overtime_special_holiday_rest_day = $request->input('u_overtime_special_holiday_rest_day');
        $rate_cards->overtime_legal_holiday = $request->input('u_overtime_legal_holiday');
        $rate_cards->overtime_legal_holiday_rest_day = $request->input('u_overtime_legal_holiday_rest_day');
        $rate_cards->overtime_double_pay = $request->input('u_overtime_double_pay');
        $rate_cards->overtime_double_pay_rest_day = $request->input('u_overtime_double_pay_rest_day');

        // night differential
        $rate_cards->night_differential_regular_day = $request->input('u_night_differential_regular_day');
        $rate_cards->night_differential_special_holiday = $request->input('u_night_differentialspecial_holiday');
        $rate_cards->night_differential_wdo = $request->input('u_night_differentialspecial_wdo');
        $rate_cards->night_differential_special_holiday = $request->input('u_night_differentialspecial_special_holiday');
        $rate_cards->night_differential_special_holiday_rest_day = $request->input('u_night_differentialspecial_special_holiday_rest_day');
        $rate_cards->night_differential_legal_holiday = $request->input('u_night_differentialspecial_legal_holiday');
        $rate_cards->night_differential_legal_holiday_rest_day = $request->input('u_night_differentialspecial_legal_holiday_rest_day');
        $rate_cards->night_differential_double_pay = $request->input('u_night_differentialspecial_double_pay');
        $rate_cards->night_differential_special_double_pay_rest_day = $request->input('u_night_differentialspecial_double_pay_rest_day');

        // overtime with night differential
        $rate_cards->overtime_with_night_differential_regular_day = $request->input('u_overtime_with_night_differential_regular_day');
        $rate_cards->overtime_with_night_differential_special_holiday = $request->input('u_overtime_with_night_differentialspecial_holiday');
        $rate_cards->overtime_with_night_differential_wdo = $request->input('u_overtime_with_night_differentialspecial_wdo');
        $rate_cards->overtime_with_night_differential_special_holiday = $request->input('u_overtime_with_night_differentialspecial_special_holiday');
        $rate_cards->overtime_with_night_differential_special_holiday_rest_day = $request->input('u_overtime_with_night_differentialspecial_special_holiday_rest_day');
        $rate_cards->overtime_with_night_differential_legal_holiday = $request->input('u_overtime_with_night_differentialspecial_legal_holiday');
        $rate_cards->overtime_with_night_differential_legal_holiday_rest_day = $request->input('u_overtime_with_night_differentialspecial_legal_holiday_rest_day');
        $rate_cards->overtime_with_night_differential_double_pay = $request->input('u_overtime_with_night_differentialspecial_double_pay');
        $rate_cards->overtime_with_night_differential_special_double_pay_rest_day = $request->input('u_overtime_with_night_differentialspecial_double_pay_rest_day');

        $rate_cards->update();

        return redirect(('/treasury/rate'))->with('update-success,', "Ratecard updated succesfully");
    }

    public function getViewData(Request $request)
    {

        
        $rate_cards = RateCard::where('id', '=', $request->id)
        ->select('id' ,'region', 'rate_per_day','rate_per_hour',
         
        'special_rate_special_holiday', 'special_rate_wdo', 'special_rate_special_holiday_rest_day',
        'special_rate_legal_holiday', 'special_rate_legal_holiday_rest_day', 'special_rate_double_pay', 'special_rate_double_pay_rest_day',
        
        'overtime_regular_day' , 'overtime_special_holiday', 'overtime_wdo', 'overtime_special_holiday_rest_day',
        'overtime_legal_holiday', 'overtime_legal_holiday_rest_day', 'overtime_double_pay', 'overtime_double_pay_rest_day',
        
        'night_differential_regular_day' , 'night_differential_special_holiday', 'night_differential_wdo', 'night_differential_special_holiday_rest_day',
        'night_differential_legal_holiday', 'night_differential_legal_holiday_rest_day', 'night_differential_double_pay', 'night_differential_double_pay_rest_day',
        
        'overtime_with_night_differential_regular_day' , 'overtime_with_night_differential_special_holiday', 'overtime_with_night_differential_wdo', 'overtime_with_night_differential_special_holiday_rest_day',
        'overtime_with_night_differential_legal_holiday', 'overtime_with_night_differential_legal_holiday_rest_day', 'overtime_with_night_differential_double_pay', 'overtime_with_night_differential_double_pay_rest_day',)
        ->first();

        if ($rate_cards) {
            // Data found for the given ID
            return response()->json($rate_cards);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

}
