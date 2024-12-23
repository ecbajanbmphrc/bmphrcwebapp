<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\Billing;
use Maatwebsite\Excel\Facades\Excel;

class BillingExportController extends Controller
{
    public function export()
    {
        return Excel::download(new Billing, 'billing.xlsx');
    }
}

