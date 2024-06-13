<?php

namespace App\Exports;

use DB;
use App\Models\TransactionList;
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


class PayrollInputExport implements  FromCollection, WithColumnWidths, WithStyles, WithHeadingRow, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $test = DB::table('transaction_lists')
            // ->join('transaction_lists', 'transaction_lists.id', '=', 'transaction_lists.actual_days_rendered')
            // ->select('account', 'hc', 'coordinator', 'employee_name', 'handled_store', 'region',
            // 'transaction_lists.actual_days_rendered as actualdays')
            ->get();

            // dd($test);

            return $test;
        }


    public function columnWidths(): array
    {
        return [ 'B' => 45, ];
    }

    public function headings(): array
    {
        
     return [
                // DATATABLE
                '#', 'ACCOUNT', 'HC', 'COORDINATOR', 'MERCHANDISER', 'STORE', 'REGION',
                // FIRST ROW 
                'ACTUAL DAYS RENDERED', 'ACTUAL DAYS RENDERED (WRI)', 'TOTAL HOURS', 'TOTAL HOUR (WRI)', 'SIL', '13TH MONTH',
                // SPECIAL RATES
                'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // OVERTIME
                'REGULAR DAY', 'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // NIGHT DIFFERENTIAL
                'REGULAR DAY', 'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // OVERTIME WITH NIGHT DIFFERENTIAL
                'REGULAR DAY', 'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // WITH RATE INCREASE 
                // SPECIAL RATES WITH RATE INCREASE
                'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // OVERTIME WITH RATE INCREASE
                'REGULAR DAY', 'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // NIGHT DIFFERENTIAL WITH RATE INCREASE
                'REGULAR DAY', 'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // OVERTIME WITH NIGHT DIFFERENTIAL WITH RATE INCREASE
                'REGULAR DAY', 'SPECIAL HOLIDDAY', 'WDO', 'SPECIAL HOLIDAY FALLING ON REST DAY', 'LEGAL HOLIDAY', 'LEGAL HOLIDAY FALLING ON REST DAY',
                'DOUBLE PAY', 'DOUBLE PAY FALLING ON REST DAY',
                // ADJUSTMENT (+)
                'ADJUSTMENT PLUS', 'TRANSPORTATION',
                // GOVERNMENT DUES
                'SSS', 'PHILHEALTH', 'HDMF',
                // NEW DEDUCTION
                'LATE', 'LATE (WRI)', 'LATE DEDUCTION', 'LATE DEDUCTION (WRI)',
                'SSS LOAN', 'PAG-IBIG LOAN', 'MGA MEAL', 'ADJUSTMENT (-)',
                // REMARKS
                'REMARKS', 'MODE OF PAYMENT', 'TRANSACTION FEE',
                // TOTAL PAY
                'NET PAY', 'DISERS NET PAY',
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
