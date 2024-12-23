<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Rcbcwallet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RcbcwalletExport implements FromCollection , WithHeadings,  WithMapping,
WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $userId;
    // protected $period;
    protected $modes;

    public function __construct($userId,$modes)
    // public function __construct($userId,$modes,$period)

    {
        $this->userId = $userId;
        // $this->period = $period;
        $this->modes = $modes; // Assign modes to the class property
    }


    public function collection()
    {
        $rcbcewal_list = DB:: table('gcash_lists')
        ->select(
            'account_number' , 'net_pay' , 'merchandiser_name',
        )
        ->where('user_id', $this->userId) // Filter by the logged-in user's ID
        // ->where('period', $this->period)
        ->whereIn('mode_of_payment', $this->modes) // Filter by multiple modes of payment
        ->get();

    return collect($rcbcewal_list);
    }

    public function headings():array
    {
        return [
            'Account Number',
            'Amount',
            'Name',
              
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
            $row->account_number,
            $row->net_pay,
            $row->merchandiser_name,
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
