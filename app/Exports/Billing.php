<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Style\Border;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

// use Illuminate\Database\Eloquent\Model;
// use App\Models\Billing;
// use App\Exports\BillingExport;
// use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Facades\Excel;s

class Billing implements FromCollection, WithColumnWidths, WithStyles, WithHeadingRow, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $test = DB::table('billings')
            ->select('account', 'hc', 'coordinator', 'employee_name', 'handled_store', 'region',
            
            // days
            'actual_days_rendered', 'actual_days_rendered_wri',
            // late
            'late_min', 'late_min_wri',
            // hours
            'no_of_hours_rendered', 'no_of_hours_rendered_wri',
            // sub total
            'sub_total_pay', 'sub_total_pay_wri',
            // total
            'total_pay',
            // special rates
            'special_rates_special_holiday', 'pay_one', 'special_rates_wdo', 'pay_two',
            'special_rates_special_holiday_falling_on_rest_day', 'pay_three', 'special_rates_legal_holiday', 'pay_four',
            'special_rates_legal_holiday_falling_on_rest_day', 'pay_five', 'special_rates_double_pay', 'pay_six',
            'special_rates_double_pay_falling_on_rest_day', 'pay_seven',
            // overtime
            'overtime_regular_day', 'pay_eight', 'overtime_special_holiday', 'pay_nine', 
            'overtime_wdo', 'pay_ten', 'overtime_special_holiday_falling_on_rest_day', 'pay_eleven',
            'overtime_legal_holiday', 'pay_twelve', 'overtime_legal_holiday_falling_on_rest_day', 'pay_thirteen',
            'overtime_double_pay', 'pay_fourteen', 'overtime_double_pay_falling_on_rest_day', 'pay_fifteen',
            // night differential
            'night_diff_regular_day', 'pay_sixteen', 'night_diff_special_holiday', 'pay_seventeen', 
            'night_diff_wdo', 'pay_eighteen', 'night_diff_special_holiday_falling_on_rest_day', 'pay_nineteen',
            'night_diff_legal_holiday', 'pay_twenty', 'night_difflegal_holiday_falling_on_rest_day', 'pay_twentyone',
            'night_diff_double_pay', 'pay_twentytwo', 'night_diff_double_pay_falling_on_rest_day', 'pay_twentythree',
            // overtime with night differential
            'ot_night_diff_regular_day', 'pay_twentyfour', 'ot_night_diff_special_holiday', 'pay_twentyfive', 
            'ot_night_diff_wdo', 'pay_twentysix', 'ot_night_diff_special_holiday_falling_on_rest_day', 'pay_twentyseven',
            'ot_night_diff_legal_holiday', 'pay_twentyeight', 'ot_night_diff_legal_holiday_falling_on_rest_day', 'pay_twentynine',
            'ot_night_diff_double_pay', 'pay_thirty', 'ot_night_diff_double_pay_falling_rest_day', 'pay_thirtyone',
            // gross amount
            'gross_amount'
            )
           
        ->get();

        $test = $test->map(function($item){
            $item = (array) $item; 
            
            // lates
            // $item['totalPay'] = $item ['rate'] * 8 / 60; //late
            // $item['totalPaywri'] =$item ['rate'] * 8 / 60; //late wri

            // // number of hours
            // $item['numberofhours'] = $item ['actualdays'] * 8 - $item['latededuction'] / 60; // actual rendered days
            // $item['numberofhourswri'] = $item ['actualdaysWri'] * 8 - $item['latedeductionwri'] / 60; // actual rendered days wri
            
            // // totals
            // $item['subTotal'] = $item [''];
            // $item['subTotalWri'] = $item [''];
            // $item['totalPaY'] = $item ['subTotal'] + $item ['subTotalWri'];

            // Special Rates
            $item['payone'] = $item ['newrate'] * 1.3 / 8; // special holiday
            $item['paytwo'] = $item ['newrate'] * 1.3 / 8; // wdo
            $item['paythree'] = $item ['newrate'] * 1.5 / 8; // special holiday falling on rest day
            $item['payfour'] = $item ['newrate'] / 8; // legal holiday
            $item['payfive'] = $item ['newrate'] * 1.6 / 8; // legal holiday falling on rest day
            $item['paysix'] = $item ['newrate'] * 2 / 8; // double pay
            $item['payseven'] = $item ['newrate'] * 2.9 / 8; // double pay falling on rest day

            // Overtime
            $item['payeight'] = $item ['newrate'] * 1.25 / 8; // regular day
            $item['paynine'] = $item ['newrate'] * 1.3; // special holiday
            $item['payten'] = $item ['newrate'] * 1.3; // wdo
            $item['payeleven'] = $item ['newrate'] * 1.3; // special holiday falling on rest day
            $item['paytwelve'] = $item ['newrate'] * 1.3; // legal holiday
            $item['paythirteen'] = $item ['newrate'] * 1.3; // legal holiday falling on rest day
            $item['payfourteen'] = $item ['newrate'] * 1.3; // double pay
            $item['payfifteen'] = $item ['newrate'] * 1.3; // double pay falling on rest day
            // Night differentail
            $item['paysixteen'] = $item ['newrate'] / 8 * 10%  // regular day
            $item['payseventeen'] = $item ['newrate'] / 8 * 10%  // special holiday
            $item['paynineteen'] = $item ['newrate'] / 8 * 10% // wdo
            $item['paynineteen'] = $item ['newrate'] / 8 * 10% // special holiday falling on rest day
            $item['payonetwenty'] = $item ['newrate'] / 8 * 10% // legal holiday
            $item['payonetwentyone'] = $item ['newrate'] / 8 * 10% // legal holiday falling on rest day
            $item['paytweentytwo'] = $item ['newrate'] / 8 * 10% // double pay
            $item['paytwentythree'] = $item ['newrate'] / 8 * 10%  // double pay falling on rest day
            // Overtime with Night differential
            $item['paytwentyfour'] = $item ['newrate'] / 8 * 10% // regular day
            $item['paytwentyfive'] = $item ['newrate'] / 8 * 10% // special holiday
            $item['paytwentysix'] = $item ['newrate'] / 8 * 10% // wdo
            $item['paytwentyseven'] = $item ['newrate'] / 8 * 10% // specail holiday falling on rest day
            $item['paytwentyeight'] = $item ['newrate'] / 8 * 10% // legal holiday
            $item['paytwentynine'] = $item ['newrate'] / 8 * 10% // legal holiday falling on rest day
            $item['paythirty'] = $item ['newrate'] / 8 * 10% // double pay
            $item['paythirtyone'] = $item ['newrate'] / 8 * 10%  // double pay falling on rest day
            
            $item['grossAmount'] = $item ['TotalPay'] +
            // special rates
            $item ['payone'] + $item ['paytwo'] + $item ['paythree'] + $item ['payfour'] +
            $item ['payfive'] + $item ['paysix'] + $item ['payseven'] +
            // overtime
            $item ['payeight'] + $item ['paynine'] + $item ['payten'] + $item ['payeleven'] +
            $item ['paytwelve'] + $item ['paythirteen'] + $item ['payfourteen'] + $item ['payfifteen'] +
            // night differential
            $item ['paysixteen'] + $item ['payseventeen'] + $item ['payeighteen'] + $item ['paynineteen'] +
            $item ['twenty'] + $item ['twentyone'] + $item ['paytwentytwo'] + $item ['paytwentythree'] +
            //overtime with night differential
            $item ['paytwentyfour'] + $item ['paytwentyfive'] + $item ['paytwentysix'] + $item ['paytwentyseven'] + 
            $item ['paytwentyeight'] + $item ['paytwentynine'] + $item ['paythirty'] + $item ['paythirtyone'];
                  
            return $item;
            });
        
        // foreach ($test as $item) {
        //     Billing::create([
        //         'account' => $item->account,
        //         'hc' => $item->hc,
        //         'coordinator' => $item->coordinator,
        //         'employee_name' => $item->employee_name,
        //         'handled_store' => $item->handled_store,
        //         'region' => $item->region,
        //         'actualdays' => $item->actualdays,
        //         'actualdaysWri' => $item->actualdaysWri,
        //         'totalhours' => $item->totalhours,
        //         'totalhourwri' => $item->totalhourwri,
                
        //     ]);
        // }

      
       
        return $test;
    }


    public function columnWidths(): array
    {
        return [ 'B' => 45, ];
    }


    public function headings(): array
    {
     return [
                // array here
                'ACCOUNT', 'HC', 'COORDINATOR', 'EMPLOYEE NAME',
                'HANDLED STORE', 'REGION',

                'ACTUAL DAYS RENDERED', 'ACTUAL DAYS RENDERED (WRI)', 
                'LATE MINS', 'LATE MINS (WRI)', 
                'NO. OF HOURS RENDERED', 'NO. OF HOURS RENDERED (WRI)', 
                
                'SUB TOTAL PAY', 'SUB TOTAL PAY (WRI)', 'TOTAL PAY', 

                // Special Rates
                'Special Rates Special Holiday', 'PAY', 'Special Rates Wdo', 'PAY', 
                'Special Rates Special Holiday Falling on Rest Day', 'PAY',
                'Special Rates Legal Holiday', 'PAY', 'Special Rates Legal Holiday Fallig on Rest Day', 'PAY', 
                'Special Rates Double Pay', 'PAY', 'Special Rates Double Pay Falling on Rest Day', 'PAY',

                // Overtime
                'Overtime Regular Day', 'PAY', 'Overtime Special Holiday', 'PAY', 
                'Overtime WDO', 'PAY', 'Overtime Special Holiday Falling on Rest Day', 'PAY', 
                'Overtime Legal Holiday', 'PAY', 'Overtime Legal Holiday Falling on Rest Day', 'PAY', 
                'Overtime Double Pay', 'PAY', 'Overtime Double Pay Falling on Rest Day', 'PAY',
                
                // Night Diff
                'Night Differential Regular Day', 'PAY', 'Night Differential Special Holiday', 'PAY', 
                'Night Differential WDO', 'PAY', 'Night Differential Special Holiday Falling on Rest Day', 'PAY',
                'Night Differential Legal Holiday', 'PAY', 'Night Differential Legal Holiday Falling on Rest Day', 'PAY', 
                'Night Differential Double Pay', 'PAY', 'Night Differential Double Pay Falling on Rest Day', 'PAY',

                // overtime with night differential
                'Overtime with Night Differential Regular Day', 'PAY', 'Overtime with Night Differential Special Holiday', 'PAY', 
                'Overtime with Night Differential WDO', 'PAY', 'Overtime with Night Differential Special Holiday Falling on Rest Day', 'PAY',
                'Overtime with Night Differential Legal Holiday', 'PAY', 'Overtime with Night Differential Legal Holiday Falling on Rest Day', 'PAY', 
                'Overtime with Night Differential Double Pay', 'PAY', 'Overtime with Night Differential Double Pay Falling on Rest Day', 'PAY',

                // Gross
                'Gross Amount',
            ];
    }



    public function defaultStyles(Style $defaultStyle)
    {

        return [
            // 'fill' => [
            //     'fillType'   => Fill::FILL_SOLID,
            //     'startColor' => ['argb' => 'FBA834'],
            // ],
            
        ];
    }



    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true , 'size' => 13 , 'color' => ['argb' => '000000']]],

        ];
    }

    public function actions(Request $request)
    {
        return [
            new DownloadExcel(),
        ];
    }



    // public function registerEvents(): array
    // {
    //     return [
    //         BeforeExport::class  => function(BeforeExport $event) {
    //             $event->writer->setCreator('Patrick');
    //         },
    //         AfterSheet::class => function(AfterSheet $event) {             
    //             $event->sheet->styleCells(
    //                 'A1:F1',
    //                 [
    //                     'borders' => [
    //                         'outline' => [
    //                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
    //                             'color' => ['argb' => 'FFFF0000'],
    //                         ],
    //                     ]
    //                 ]
    //             );
    //         },
    //     ];
    // }

}
