<?php

namespace App\Exports;
// use App\Models\Eastwest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EastwestExport implements FromCollection ,  WithMapping, WithEvents
// WithHeadings , WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $userId;
    // protected $period;

    public function __construct($userId)
    {
        $this->userId = $userId;
        // $this->period = $period;
    }


    public function collection()
    {
        $eastwestList = DB::table('gcash_lists')
            ->select(
                'merchandiser_name' , 'account_number' , 'net_pay' ,
            )
            ->where('user_id', $this->userId) // Filter by the logged-in user's ID
            ->where('mode_of_payment', 'Eastwest') // Hardcoded filter
            // ->where('period', $this->period)
            ->get();

        return collect($eastwestList);
    }

    // public function styles(Worksheet $sheet)
    // {
    //      return [
    //          // Style header row
    //          1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
    //      ];
    // }


    public function map($row): array
    {
        return [
            $row->merchandiser_name,
            $row->account_number,
            $row->net_pay,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                // Auto-fit columns
                $highestColumn = $sheet->getHighestColumn();
                foreach (range('A', $highestColumn) as $columnID) {
                    $sheet->getColumnDimension($columnID)->setAutoSize(true);
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

