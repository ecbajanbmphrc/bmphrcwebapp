<?php

namespace App\Exports;

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

class CebuanaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    protected $userId;
    // protected $period;


    public function __construct($userId)
    {
        $this->userId = $userId;
        // $this->period = $period;

    }

    public function collection(): Collection
    {
        return DB::table('gcash_lists')
            ->select(
                DB::raw("ROW_NUMBER() OVER(ORDER BY id) AS row_num"),
                DB::raw("ROW_NUMBER() OVER(ORDER BY id) AS row_numm"),
                'merchandiser_name', 
                'net_pay', 
                'account_number'
            )
            ->where('user_id', $this->userId) // Filter by the logged-in user's ID
            ->where('mode_of_payment', 'Cebuana Lhuillier') // Hardcoded filter
            // ->where('period', $this->period)
            ->get();
    }

    public function headings(): array
    {
        return ['No.', 'ID', 'Employee Name', 'Amount', 'Account Number'];
    }

    public function map($row): array
    {
        return [
            $row->row_num,
            $row->row_numm,
            $row->merchandiser_name,
            $row->net_pay,
            $row->account_number,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestColumn = $sheet->getHighestColumn();
                foreach (range('A', $highestColumn) as $columnID) {
                    $sheet->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
}
