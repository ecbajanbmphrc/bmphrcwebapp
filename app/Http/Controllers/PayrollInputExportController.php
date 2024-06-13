<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\PayrollInputExport;
use Maatwebsite\Excel\Facades\Excel;

class PayrollInputExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PayrollInputExport, 'payrollinput.xlsx');
    }
}
