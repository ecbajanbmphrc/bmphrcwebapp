<?php

namespace App\Exports;

use DB;
use App\Models\Data;
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


class DataExport implements FromCollection, WithColumnWidths, WithStyles, WithHeadingRow, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $test = DB::table('data')
        // ->join('rate_cards', 'transaction_lists.region', '=', 'rate_cards.region')
        ->select('account', 'hc', 'coordinator', 'employee_name', 'handled_store', 'region',

        'rendered_days', 'rendered_days_wri', 'sil', 'thirteen_month',

        'sr_special_holiday', 'sr_wdo', 'sr_special_holiday_falling_on_rest_day', 'sr_legal_holiday',
        'sr_legal_holiday_falling_on_rest_day', 'sr_double_pay', 'sr_double_pay_falling_on_rest_day',

        'ot_regular_day', 'ot_special_holiday', 'ot_wdo', 'ot_special_holiday_falling_on_rest_day',
        'ot_legal_holiday', 'ot_legal_holiday_falling_on_rest_day', 'ot_double_pay', 'ot_double_pay_falling_on_rest_day',

        'nd_regular_day', 'nd_special_holiday', 'nd_wdo', 'nd_special_holiday_falling_on_rest_day',
        'nd_legal_holiday', 'nd_legal_holiday_falling_on_rest_day', 'nd_double_pay', 'nd_double_pay_falling_on_rest_day',

        'otwnd_regular_day', 'otwnd_special_holiday', 'otwnd_wdo', 'otwnd_special_holiday_falling_on_rest_day',
        'otwnd_legal_holiday', 'otwnd_legal_holiday_falling_on_rest_day', 'otwnd_double_pay', 'otwnd_double_pay_falling_on_rest_day',

        'adjustment_plus', 'transportation',

        'late', 'late_wri',

        'sss_loan', 'pagibig_loan', 'deduction_minus', 'mga_meals',

        'remarks', 'mode_of_payment'
        
        
        )
        ->get();

        return $test;
    }



    public function columnWidths(): array
    {
        return [ 'B' => 45, ];
    }



    public function headings(): array
    {
        
     return [
                'ACCOUNT', 'HC', 'COORDINATOR', 'EMPLOYEE NAME', 'HANDLED STORE', 'REGION',

                'RENDERED DAYS', 'RENDERED DAYS WRI', 'SIL', '13TH MONTH',

                // Special Rates
                'SR SPECIAL HOLIDAY', 'SR WDO', 'SR SPECIAL HOLIDAY FALLING ON REST DAY', 
                'SR LEGAL HOLIDAY', 'SR LEGAL HOLIDAY FALLING ON REST DAY', 'SR DOUBLE PAY ', 'SR DOUBLE PAY FALLING ON REST DAT',

                // Overtime
                'OT REGULAR DAY', 'OT SPECIAL HOLIDAY', 'OT WDO', 'OT SPECIAL HOLIDAY FALLING ON REST DAY',
                'OT LEGAL HOLIDAY', 'OT LEGAL HOLIDAY FALLING ON REST DAY', 'OT DOUBLE PAY', 'OT DOUBLE PAY FALLING ON REST DAY',

                // Night differential
                'ND REGULAR DAY', 'ND SPECIAL HOLIDAY', 'ND WDO', 'ND SPECIAL HOLIDAY FALLING ON REST DAY', 
                'ND LEGAL HOLIDAY', 'ND LEGAL HOLIDAY FALLING ON REST DAY', 'ND DOUBLE PAY', 'ND DOUBLE PAY FALLING ON REST DAY',

                // Overtime with night differential
                'OTWND REGULAR DAY', 'OTWND SPECIAL DAY', 'OTWND WDO', 'OTWND SPECIAL HOLIDAY FALLING ON REST DAY',
                'OTWND LEGAL HOLIDAY', 'OTWND LEGAL HOLIDAY FALLING ON REST DAY', 'OTWND DOUBLE PAY', 'OTWND DOUBLE PAY FALLING ON REST DAY',

                // Adjustment (+)
                'ADJUSTMENT (+)', 'TRANSPORTATION',
                // NEW DEDUCTION
                'LATE', 'LATE (WRI)', 'SSS LOAN', 'PAGIBIG LOAN', 'DEDUCTION (-)', 'MGA MEALS',
                
                // 
                'REMARKS', 'MODE PAYMENT',

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
