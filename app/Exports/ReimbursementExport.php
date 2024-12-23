<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

use Illuminate\Support\Facades\Auth;

class ReimbursementExport implements FromCollection, WithHeadings, WithMapping, 
WithStyles, WithEvents
{
    protected $userId;
    protected $period;

    public function __construct($userId, $period)
    {
        $this->userId = $userId;
        $this->period = $period;
    }

    public function collection()
    {   
        
        $reimbursements = DB::table('reimbursements')
        ->where('user_id', $this->userId) // Filter by the logged-in user's ID
        ->where('period', $this->period)
            ->select('account', 'hc', 'coordinator', 'employee_name', 
            'handled_store', 'transportation', 'mailing', 'supplies',
            'lodging', 'load_allowance', 'total') 
            ->get();

        // Calculate totals for the footer
        $totalTransportation = $reimbursements->sum('transportation');
        $totalMailing = $reimbursements->sum('mailing');
        $totalSupplies = $reimbursements->sum('supplies');
        $totalLodging = $reimbursements->sum('lodging');
        $totalLoadAllowance = $reimbursements->sum('load_allowance');

        // I'm poised to fade like whispers in the night,
        // To ghost the world, to slip from sight.
        // In shadows deep where silence weaves,
        // I'll dance alone, as the heart deceives.
        
        // Calculate the grand total
        $total = $totalTransportation + $totalMailing + $totalSupplies + $totalLodging + $totalLoadAllowance;

        $vat = $total * .10;

        $nigga = $total + $vat;

        $negro = $nigga * .12;

        $billing = $nigga + $negro;

        

        // Append five empty rows for spacing
        $emptyRows = [];
        for ($i = 0; $i < 1; $i++) {
            $emptyRows[] = (object)[
                'account' => '',
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => '',
                'transportation' => '',
                'mailing' => '',
                'supplies' => '',
                'lodging' => '',
                'load_allowance' => '',
            ];
        }

        // Append footer data including the single total
        $footer = [
            (object)[
                'account' => '',
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => 'TOTAL',
                'transportation' => $totalTransportation,
                'mailing' => $totalMailing,
                'supplies' => $totalSupplies,
                'lodging' => $totalLodging,
                'load_allowance' => $totalLoadAllowance,
                'total' => $total, 
            ]
        ];

        // Vertical list under handled store
        $additionalFooter = [
            (object)[
                'account' => '', // Keep Account blank
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => 'SUB TOTAL',
                'transportation' => '=',
                'mailing' => $total,
                'supplies' => '',
                'lodging' => '',
                'load_allowance' => '',
                'total' => '',
            ],
            (object)[
                'account' => '',
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => 'ASF 10%',
                'transportation' => '=',
                'mailing' => $vat,
                'supplies' => '',
                'lodging' => '',
                'load_allowance' => '',
                'total' => '',
            ],
            (object)[
                'account' => '',
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => 'TOTAL',
                'transportation' => '=',
                'mailing' => $nigga,
                'supplies' => '',
                'lodging' => '',
                'load_allowance' => '',
                'total' => '',
            ],
            (object)[
                'account' => '',
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => 'ADD 12% VAT',
                'transportation' => '=',
                'mailing' => $negro ,
                'supplies' => '',
                'lodging' => '',
                'load_allowance' => '',
                'total' => '',
            ],
            (object)[
                'account' => '',
                'hc' => '',
                'coordinator' => '',
                'employee_name' => '',
                'handled_store' => 'TOTAL AMOUNT OF BILLING',
                'transportation' => '=',
                'mailing' => $billing,
                'supplies' => '',
                'lodging' => '',
                'load_allowance' => '',
                'total' => '',
            ],
        ];

        // Return the merged collection with the empty rows, footer, and additional list
        return $reimbursements->merge($emptyRows)->merge($footer)->merge($additionalFooter);
    }

    public function headings(): array {
        return [
            'ACCOUNT',
            'HC',
            'COORDINATION', 
            'EMPLOYEE NAME',
            'HANDLED STORE',
            'TRANSPO',
            'MAILINGS',
            'SUPPLIES',
            'LODGING',
            'LOAD ALLOWANCE',
            'TOTAL',
        ];
    }

    public function map($reimbursement): array {
        return [
            $reimbursement->account,
            $reimbursement->hc,
            $reimbursement->coordinator,
            $reimbursement->employee_name,
            $reimbursement->handled_store,
            $reimbursement->transportation,
            $reimbursement->mailing,
            $reimbursement->supplies,
            $reimbursement->lodging,
            $reimbursement->load_allowance,
            isset($reimbursement->total) ? $reimbursement->total : null,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Styles for the header
        $headerStyleArray = [
            'font' => [
                'medium' => true,
                'size' => 14, // Set your desired font size
                'color' => [
                    'argb' => '000000', // Black font color
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFFF00', // Yellow background
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],

            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['argb' => '000000'], // Black color for borders
                ],
            ],

        ];

        // Apply the styles to the first row (headings)
        $sheet->getStyle('A1:K1')->applyFromArray($headerStyleArray);
        // Set the height of the header row
        $sheet->getRowDimension(1)->setRowHeight(40); // Set to your desired height

        // Get the footer row index (after the empty rows)
        $footerRowIndex = count($this->collection()) + 1; // Adjust for the additional empty rows
        $totalRowIndex = $footerRowIndex - 5; // Adjust back by 5 rows

        // Apply styles for the footer (total) row
        $sheet->getStyle('A' . $footerRowIndex . ':K' . $footerRowIndex)
            ->getFont()->setBold(true);

        // Apply yellow background to the TOTAL cell (Column K)
        $sheet->getStyle('F' . $totalRowIndex . ':K' . $totalRowIndex)
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('FFFF00'); // Yellow background for TOTAL
        
       // Center align the '=' sign in the transportation column for the additional footer rows
       $additionalFooterRowIndices =  [$footerRowIndex - 4, $footerRowIndex - 3, $footerRowIndex - 2, $footerRowIndex - 1, $footerRowIndex];
       $additionalFooter = count($this->collection()) + 1; // no changes
       foreach ($additionalFooterRowIndices as $rowIndex) {
           $sheet->getStyle('F' . $rowIndex)
               ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
       }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Freeze the first row
                $event->sheet->freezePane('A2');

                // Auto-fit columns
                foreach (range('A', 'K') as $columnID) {
                    $event->sheet->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
}
