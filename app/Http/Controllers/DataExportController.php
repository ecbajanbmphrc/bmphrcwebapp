<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;

class DataExportController extends Controller
{
    /**
     * Export data to Excel file.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new DataExport, 'data.xlsx');
    }
}

