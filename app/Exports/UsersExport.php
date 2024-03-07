<?php

namespace App\Exports;

use App\Models\User;
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


class UsersExport implements FromCollection, WithColumnWidths, WithStyles, WithHeadingRow, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id' , 'first_name' , 'last_name' , 'contact_number' , 'email' , 'user_type' )
        ->orderBy('id')
        ->get();
    }

    public function columnWidths(): array
    {
        return [
        
            'B' => 45,            
        ];
    }

    // public function backgroundColor()
    // {
    
    
    //     // Or return the styles array
    //     return [
    //          'fillType'   => Fill::FILL_GRADIENT_LINEAR,
    //          'startColor' => ['argb' => Color::COLOR_RED],
    //     ];
    // }

    public function headings(): array {
        return [

            '#',
            'First Name', 
            'Surname',
            'Contact',
            'Email',
            'Role',

           

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
