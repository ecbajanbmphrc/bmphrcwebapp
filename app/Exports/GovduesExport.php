<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\TransactionList;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GovduesExport implements FromCollection, WithHeadings,  WithMapping,
WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $userId;
    // protected $period; // open this if need to filter the period


    public function __construct($userId)
    // public function __construct($userId,$period,) // close/open

    {
        $this->userId = $userId;
        // $this->excludedModes = $excludedModes; // Assign modes to the class property
        // $this->period = $period; // open this if need to filter the period
    }

   public function collection()
   {

    // $excludedModes = ['RCBC', 'RCBC E-Wallet', 'Others', 'Eastwest', 'East West', 'Cebuana Lhuillier'];

    $govdues = DB::table('transaction_lists')
        ->select(
            // DB::raw("ROW_NUMBER() OVER(ORDER BY id) AS row_num"),
          'employee_name',
          'goverment_dues_sss',
          'sss_loan',
        //   DB::raw("ROW_NUMBER() OVER(ORDER BY id) AS row_num"),
        'sss_loan',
          'goverment_dues_phic',
          'goverment_dues_hdmf',
          'pagibig_loan',
        //   DB::raw("ROW_NUMBER() OVER(ORDER BY id) AS row_numm")
        'pagibig_loan',

        )
        ->where('user_id', $this->userId) // Filter by the logged-in user's ID
        // ->where('period', $this->period) /// open this if need to filter the period
        // ->whereNotIn('mode_of_payment', $excludedModes)
        ->get();

    return collect($govdues);
   }

   public function headings(): array
   {
       return [
          'EMPLOYEE NAME', 'SSS', 'SSS LOAN', 'CALAMITY LOAN',
          'PHIC', 'HDMF', 'HDMF LOAN', 'CALAMITY LOAN'
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
            $row->employee_name,
            $row->goverment_dues_sss,
            $row->sss_loan,
            $row->sss_loan,
            $row->goverment_dues_phic,
            $row->goverment_dues_hdmf,
            $row->pagibig_loan,
            $row->pagibig_loan,

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