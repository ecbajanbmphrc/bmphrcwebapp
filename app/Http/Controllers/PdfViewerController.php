<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payslip;
use App\Models\TransactionList;
use App\Models\RateCard;
use App\Models\Company;



class PdfViewerController extends Controller
{
    public function viewGeneratePDF()
    {
        $transaction_lists = TransactionList::get(); 
        $rate_cards = RateCard::get();
        $companies = Company::get();


        $lateU = 0;
        foreach ($transaction_lists as $item) 
        {
            $lateU += $item->late_deduction + $item->late_wri_deduction;
        }

        $sum = 0;
        foreach ($transaction_lists as $item) 
        {
            $sum += $item->goverment_dues_sss +
                    $item->goverment_dues_phic +
                    $item->goverment_dues_hdmf +
                    $item->pagibig_loan +
                    $item->sss_loan +
                    $item->adjustment_minus +
                    $item->mga_meal + $lateU;
        }

        
        $days = 0;
        foreach ($transaction_lists as $item)
        {
            foreach ($rate_cards as $rate)
            {
                $days = $item->actual_days_rendered * $rate->rate_per_day;
            }
        }

        $daysWri = 0;
        foreach ($transaction_lists as $item)
        {
            foreach ($rate_cards as $rate)
            {
                $daysWri = $item->actual_days_rendered * $rate->rate_per_day_wri;
            }
        }


        $grossPay = 0;
        foreach ($transaction_lists as $item) 
        {
            foreach ($rate_cards as $rate) 
            {
                $grossPay += $days + $daysWri +
                // regular
                 $item->special_rates_special_holiday  + $item->special_rates_wdo
                + $item->special_rates_special_holiday_falling_on_rest_day + $item->special_rates_legal_holiday
                + $item->special_rates_legal_holiday_falling_on_rest_day + $item->special_rates_double_pay
                + $item->special_rates_double_pay_falling_on_rest_day
                // overtime
                + $item->overtime_regular_day + $item->overtime_special_holiday
                + $item->overtime_wdo  + $item->overtime_special_holiday_falling_on_rest_day 
                + $item->overtime_legal_holiday  + $item->overtime_legal_holiday_falling_on_rest_day
                + $item->overtime_double_pay  + $item->overtime_double_pay_falling_on_rest_day
                // night differential
                + $item->night_differential_regular_day + $item->night_differential_special_holiday
                + $item->night_differential_wdo  + $item->night_differential_special_holiday_falling_on_rest_day 
                + $item->night_differential_legal_holiday  + $item->night_differential_legal_holiday_falling_on_rest_day
                + $item->night_differential_double_pay + $item->night_differential_double_pay_falling_on_rest_day 
                // overtime with night differential
                + $item->overtime_with_night_differential_regular_day + $item->overtime_with_night_differential_special_holiday  
                + $item->overtime_with_night_differential_wdo + $item->overtime_with_night_differential_special_holiday_rest_day
                + $item->overtime_with_night_differential_legal_holiday + $item->overtime_with_night_differential_legal_holiday_rest_day 
                + $item->overtime_with_night_differential_double_pay + $item->overtime_with_night_differential_double_pay_rest_day
                // regular with rate increase
                + $item->special_rates_special_holiday_wri  + $item->special_rates_wdo_wri
                + $item->special_rates_special_holiday_falling_on_rest_day_wri + $item->special_rates_legal_holiday_wri
                + $item->special_rates_legal_holiday_falling_on_rest_day_wri + $item->special_rates_double_pay_wri
                + $item->special_rates_double_pay_falling_on_rest_day_wri
                // overtime with rate increase
                + $item->overtime_regular_day_wri + $item->overtime_special_holiday_wri
                + $item->overtime_wdo_wri  + $item->overtime_special_holiday_falling_on_rest_day_wri 
                + $item->overtime_legal_holiday_wri  + $item->overtime_legal_holiday_falling_on_rest_day_wri
                + $item->overtime_double_pay_wri  + $item->overtime_double_pay_falling_on_rest_day_wri
                // night differential with rate increase
                + $item->night_differential_regular_day_wri + $item->night_differential_special_holiday_wri
                + $item->night_differential_wdo_wri  + $item->night_differential_special_holiday_falling_on_rest_day_wri 
                + $item->night_differential_legal_holiday_wri  + $item->night_differential_legal_holiday_falling_on_rest_day_wri
                + $item->night_differential_double_pay_wri + $item->night_differential_double_pay_falling_on_rest_day_wri 
                // overtime with night differential with rate increase
                + $item->overtime_with_night_differential_regular_day_wri + $item->overtime_with_night_differential_special_holiday_wri 
                + $item->overtime_with_night_differential_wdo_wri + $item->overtime_with_night_differential_special_holiday_rest_day_wri
                + $item->overtime_with_night_differential_legal_holiday_wri + $item->overtime_with_night_differential_legal_holiday_rest_day_wri 
                + $item->overtime_with_night_differential_double_pay_wri + $item->overtime_with_night_differential_double_pay_rest_day_wri
                ;
            }
        }

        $netPay = 0;
        foreach ($transaction_lists as $item) 
        {
            $netPay = $grossPay - $sum;
        }
        

        $data = [
            'title' => 'BMPOWER HUMAN RESOURCES CORP.',
            'date' => date('m/d/y'),
            'transaction_lists' => $transaction_lists ,
            'companies' => $companies ,
            'rate_cards' => $rate_cards , 
            'sum' => $sum , 
            'grossPay' => $grossPay ,
            'netPay' => $netPay ,
            'lateU' => $lateU ,
            'days' => $days ,
            'daysWri' => $daysWri ,
        ];


        $title = "Welcome to ItSolutionStuff.com";
      
        return view('pdf.payslipPDF')->with($data);
    }

    // public function showRegion($regionId)
    // {
    //     $region = Region::with('rateCard')->find($regionId);

    //     return view('region.show', compact('region'));
    // }
}
