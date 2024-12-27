<?php

namespace App\Http\Controllers;

use App\Models\Payslip;
use App\Models\TransactionList;
use App\Models\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;


// class PayslipController extends Controller
// {
//     public function generatePDF()
//     {
//         $transaction_list = TransactionList::get(); 
//         $company = Company::get();


//         $data = [
//             'title' => 'Payslip',
//             'date' => date('m/d/y'),
//             'transaction_lists' => $transaction_list,
//             'companies' => $company
//         ];

//         $pdf = Pdf::loadView('pdf.payslipPDF', $data);
//         return $pdf->download('payslip.pdf');
//     }

    
// }
