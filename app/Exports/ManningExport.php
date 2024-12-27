<?php
namespace App\Exports;

use DB;
use App\Models\Manning;
use Maatwebsite\Excel\Concerns\FromCollection; //
use Maatwebsite\Excel\Concerns\WithColumnWidths; //
use PhpOffice\PhpSpreadsheet\Style\Fill; // 
use PhpOffice\PhpSpreadsheet\Style\Style; //
use PhpOffice\PhpSpreadsheet\Style\Color; //
use Maatwebsite\Excel\Concerns\WithDefaultStyles; //
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet; //
use Maatwebsite\Excel\Concerns\WithBackgroundColor; //
use Maatwebsite\Excel\Concerns\WithStyles; //
use Maatwebsite\Excel\Concerns\ToModel; // 
use Maatwebsite\Excel\Concerns\WithHeadingRow; //
use Maatwebsite\Excel\Concerns\WithHeadings; //
use Maatwebsite\Excel\Concerns\FromArray; //
use Maatwebsite\Excel\Concerns\WithEvents; //
use Maatwebsite\Excel\Events\AfterSheet; //
use Maatwebsite\Excel\Concerns\ShouldAutoSize; //
use Maatwebsite\Excel\Style\Border; //
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel; //
use Carbon\Carbon; //
use Illuminate\Support\Facades\Auth; //

class ManningExport implements FromCollection, WithColumnWidths, WithStyles, 
WithHeadingRow, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection 
    */

    protected $userId;
    protected $period;

    public function __construct($userId, $period)
    {
        $this->userId = $userId;
        $this->period = $period;
    }

    public function collection()
    {
        $today = Carbon::today();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();

        if ($today->day <= 15) {
            // 1st to 15th of the month
            $startDate = $startOfMonth;
            $endDate = $startOfMonth->copy()->addDays(14);
        } else {
            // 16th to end of the month
            $startDate = $startOfMonth->copy()->addDays(15);
            $endDate = $endOfMonth;
        }

        $manning = DB::table('manning_lists')
            ->where('merchandisers.is_active', 1) // Filter active merchandisers
            ->where('manning_lists.user_id', $this->userId) // Filter by user ID
            // No date column filter as we’re only generating by real-time cut-off
            ->join('company_doors', 'company_doors.id', '=', 'manning_lists.door_id')
            ->join('merchandisers', 'merchandisers.id', '=', 'manning_lists.merchandiser_id')
            ->join('coordinators', 'coordinators.id', '=', 'company_doors.coordinator_id')
            ->select(
                'store_name', 
                'account', 
                DB::raw("CONCAT_WS(' ', coordinators.first_name, coordinators.middle_name, coordinators.last_name) as coordinator_fullname"),
                'company_doors.region',
                'company_doors.area', 
                'store_address', 
                DB::raw("CONCAT_WS(' ', merchandisers.first_name, merchandisers.middle_name, merchandisers.last_name) as merchandiser_fullname"), 
                'merchandisers.type_of_deployment', 
                'merchandisers.contact_number', 
                'merchandisers.date_started', 
                'merchandisers.end_of_contract',
                DB::raw("DATEDIFF(merchandisers.end_of_contract, CURDATE()) as days_left") // Calculate days left
            )
            ->get();

        // return view('exports.manning', compact('manning'));
        return $manning;
    }



    public function columnWidths(): array
    {
        return [ 'B' => 45, ];
    }

    public function headings(): array
    {
        
     return [
                'STORE NAME', 'TRADERS NAME', 'COORDINATOR',
                'REGION', 'AREA REF 2', 'MUNICIPALITY', 'MERCHANDISER NAME', 
                'TYPE OF DEPLOYMENT', 'CONTACT NUMBER', 'DATE STARTED',
                'END DATE', 'DAYS LEFT',

            ];
    }

    public function styles(Worksheet $sheet)
    {
 
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
        
        // Apply the styles to the header row (you can adjust the range as needed)
        $sheet->getStyle('A1:L1')->applyFromArray($headerStyleArray);
        // Set the height of the header row
        $sheet->getRowDimension(1)->setRowHeight(40); // Set to your desired height
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Freeze the first row
                $event->sheet->getDelegate()->freezePane('A2'); // Adjust to freeze only the first row
                
                // Auto-fit columns (optional, but ensure it doesn't conflict with freezePane)
                foreach (range('A', 'L') as $columnID) { // Specify a valid range, A to L in your case
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
      
    public function defaultStyles(Style $defaultStyle)
    {

        return [
            
        ];
    }

    public function actions(Request $request)
    {
        return [
            new DownloadExcel(),
        ];
    }


}

