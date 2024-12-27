<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Rcbc;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class RcbcExport implements FromCollection , WithHeadings,  WithMapping,
WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $userId;
    protected $modes;

    // protected $p

    public function __construct($userId, $modes)
    {
        $this->userId = $userId;
        $this->modes = $modes; // Assign modes to the class property
        // $this->period = $period;
    }

    public function collection()
    {
        $rcbc_lists = DB:: table('gcash_lists')
            ->select(
                'account_number' , 'net_pay' , 'merchandiser_name',
            )
            ->where('user_id', $this->userId) // Filter by the logged-in user's ID
            // ->where('period', $this->period)
            ->whereIn('mode_of_payment', $this->modes) // Filter by multiple modes of payment
            ->get();
    
        return collect($rcbc_lists);
    }       

    
    public function headings(): array
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
