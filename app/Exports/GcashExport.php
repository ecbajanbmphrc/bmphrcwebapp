<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Gcash;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class GcashExport implements FromCollection , WithHeadings,  WithMapping,
WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $userId;
    protected $excludedModes;
    // protected $period; // open this if need to filter the period


    public function __construct($userId, $excludedModes)
    // public function __construct($userId,$period,) // close/open

    {
        $this->userId = $userId;
        $this->excludedModes = $excludedModes; // Assign modes to the class property
        // $this->period = $period; // open this if need to filter the period
    }

   public function collection()
   {

    $excludedModes = ['RCBC', 'RCBC E-Wallet', 'Others', 'Eastwest', 'East West', 'Cebuana Lhuillier'];

    $gcashList = DB::table('gcash_lists')
        ->select(
            DB::raw("ROW_NUMBER() OVER(ORDER BY id) AS row_num"),
            'net_pay',
            'merchandiser_name',
            'office_address',
            'mode_of_payment',
            'account_number',
            'purpose_of_transfer',
            'payroll_email'
        )
        ->where('user_id', $this->userId) // Filter by the logged-in user's ID
        // ->where('period', $this->period) /// open this if need to filter the period
        ->whereNotIn('mode_of_payment', $excludedModes)
        ->get();

    return collect($gcashList);
   }

   public function headings(): array
   {
       return [
           'No.',
           'Amount (less 15.00)',
           'Employee Name',
           'Office Address',
           'Beneficiary Bank',
           'Account Number',
           'Purpose of Transfer',
           'Email Add of Payroll Officer',
       ];
   }

   public function styles(Worksheet $sheet)
   {
        return [
            // Style header row
            1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
        ];
   }

   public function map($row): array
    {
        return [
            $row->row_num,
            $row->net_pay,
            $row->merchandiser_name,
            $row->office_address,
            $row->mode_of_payment,
            $row->account_number,
            $row->purpose_of_transfer,
            $row->payroll_email,
        ];
    }


   public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();


                $sheet->getStyle('A1:H1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => '4F81BD'], // Header background color
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center',
                    ],
                ]);

                // Freeze the first row
                $event->sheet->freezePane('A2');

                // Auto-fit columns
                foreach (range('A', 'L') as $columnID) {
                    $event->sheet->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }

    public function actions(Request $request)
    {
        return [
            new DownloadExcel(),
        ];
    }

}
