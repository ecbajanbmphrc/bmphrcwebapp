<?php

namespace App\Http\Controllers;

use Auth;
// use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewPayslip;
use App\Models\TransactionList;
use Illuminate\Support\Facades\Log;
use App\Models\RateCard;
use App\Models\Company;
use ZipArchive;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class NewPdfController extends Controller
{
    public function viewNewGeneratePDF()
    {
        $transaction_lists = TransactionList::get(); 
        $rate_cards = RateCard::get();
        $companies = Company::get();
        // $merchandisers = Merchandiser::get();


        // days starts here
        $days = 0;
            foreach ($transaction_lists as $item)
            {
                foreach ($rate_cards as $rate)
                {
                    $days = $item->actual_days_rendered * $item->old_rate;
                }
            }
        // days ends here

        // days wri starts here
        $daysWri = 0; 
        foreach ($transaction_lists as $item)
        {
            foreach ($rate_cards as $rate)
            {
                $daysWri = $item->actual_days_rendered_wri * $item->new_rate;
            }
        }
        // days wri ends here

        //  total days here
        $dayss = 0; // total days worked
        foreach ($transaction_lists as $item)
        {
            
            $dayss = $item->actual_days_rendered + $item->actual_days_rendered_wri;
            
        }
        // total days ends here

        
        // equations starts here

        $Amount = 0;

        foreach ($transaction_lists as $item)
        {
            
           $Amount = $days + $daysWri;
            
        }

        // total special
        $specialTotalHours = 0; // total hours

        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {
                $specialTotalHours =  
                $item->special_rates_special_holiday  + $item->special_rates_wdo
                + $item->special_rates_special_holiday_falling_on_rest_day + $item->special_rates_legal_holiday
                + $item->special_rates_legal_holiday_falling_on_rest_day + $item->special_rates_double_pay
                + $item->special_rates_double_pay_falling_on_rest_day
                // old rate
                + $item->special_rates_special_holiday_wri  + $item->special_rates_wdo_wri
                + $item->special_rates_special_holiday_falling_on_rest_day_wri + $item->special_rates_legal_holiday_wri
                + $item->special_rates_legal_holiday_falling_on_rest_day_wri + $item->special_rates_double_pay_wri
                + $item->special_rates_double_pay_falling_on_rest_day_wri;
            }
        }

        $specialTotalHoursAmount = 0; // total hours in cash

        $specone = $item->special_rates_special_holiday * ($item->old_rate * 1.3 / 8);
        $spectwo = $item->special_rates_wdo * ($item->old_rate * 1.3 / 8);
        $specthree = $item->special_rates_special_holiday_falling_on_rest_day * ($item->old_rate * 1.5 / 8) ;
        $specfour = $item->special_rates_legal_holiday * ($item->old_rate / 8);
        $specfive = $item->special_rates_legal_holiday_falling_on_rest_day * ($item->old_rate * 1.6 / 8);
        $specsix = $item->special_rates_double_pay * ($item->old_rate * 2 / 8);
        $specseven = $item->special_rates_double_pay_falling_on_rest_day * ($item->old_rate * 2.9 / 8);

        $speceight = $item->special_rates_special_holiday_wri * ($item->new_rate * 1.3 / 8);
        $specnine = $item->special_rates_wdo_wri * ($item->new_rate * 1.3 / 8);
        $specten = $item->special_rates_special_holiday_falling_on_rest_day_wri * ($item->new_rate * 1.5 / 8) ;
        $speceleven = $item->special_rates_legal_holiday_wri * ($item->new_rate / 8);
        $spectwelve = $item->special_rates_legal_holiday_falling_on_rest_day_wri * ($item->new_rate * 1.6 / 8);
        $specthirteen = $item->special_rates_double_pay_wri * ($item->new_rate * 2 / 8);
        $specfourteen = $item->special_rates_double_pay_falling_on_rest_day_wri * ($item->new_rate * 2.9 / 8);


        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {
                
                $specialTotalHoursAmount =
                $specone + $spectwo + $specthree 
                + $specfour + $specfive + $specsix + $specseven
                + $speceight + $specnine + $specten 
                + $speceleven + $spectwelve + $specthirteen + $specfourteen;
            }
        }

        // total overtime
        $totalOvertime = 0; // total over time hours
        
        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {

                $totalOvertime =
                $item->overtime_regular_day + $item->overtime_special_holiday
                + $item->overtime_wdo  + $item->overtime_special_holiday_falling_on_rest_day 
                + $item->overtime_legal_holiday  + $item->overtime_legal_holiday_falling_on_rest_day
                + $item->overtime_double_pay  + $item->overtime_double_pay_falling_on_rest_day
                // new rate
                + $item->overtime_regular_day_wri + $item->overtime_special_holiday_wri
                + $item->overtime_wdo_wri  + $item->overtime_special_holiday_falling_on_rest_day_wri 
                + $item->overtime_legal_holiday_wri  + $item->overtime_legal_holiday_falling_on_rest_day_wri
                + $item->overtime_double_pay_wri  + $item->overtime_double_pay_falling_on_rest_day_wri;
            }
        }

        $totalOvertimeAmount = 0; // total overtime in cash
        
        $otreg = $item->overtime_regular_day * ($item->old_rate * 1.25 / 8) ;
        $otcone = $item->overtime_special_holiday * ($item->old_rate * 1.3 * 1.3 / 8);
        $ottwo = $item->overtime_wdo * ($item->old_ratee * 1.3 * 1.3 / 8);
        $otthree = $item->overtime_special_holiday_falling_on_rest_day * ($item->old_rate * 1.5 * 1.3 / 8);
        $otfour = $item->overtime_legal_holiday * ($item->old_rate * 1.3 / 8); 
        $otfive = $item->overtime_legal_holiday_falling_on_rest_day * ($item->old_rate * 1.6 * 1.3 / 8);
        $otsix = $item->overtime_double_pay * ($item->old_rate * 2 * 1.3 / 8);
        $otseven = $item->overtime_double_pay_falling_on_rest_day * ($item->old_rate * 2.9 * 1.3 / 8);

        $otregg = $item->overtime_regular_day * ($item->new_rate * 1.25 / 8) ;
        $otconee = $item->overtime_special_holiday * ($item->new_rate * 1.3 * 1.3 / 8);
        $ottwoo = $item->overtime_wdo * ($item->new_rate * 1.3 * 1.3 / 8);
        $otthreee = $item->overtime_special_holiday_falling_on_rest_day * ($item->new_rate * 1.5 * 1.3 / 8);
        $otfourr = $item->overtime_legal_holiday * ($item->new_rate * 1.3 / 8) ; 
        $otfivee = $item->overtime_legal_holiday_falling_on_rest_day * ($item->new_rate * 1.6 * 1.3 / 8);
        $otsixx = $item->overtime_double_pay * ($item->new_rate * 2 * 1.3 / 8);
        $otsevenn = $item->overtime_double_pay_falling_on_rest_day * ($item->new_rate * 2.9 * 1.3 / 8);
        
        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {

                $totalOvertimeAmount =
                $otreg + $otcone + $ottwo + $otthree 
                + $otfour + $otfive + $otsix + $otseven
                + $otregg + $otconee + $ottwoo + $otthreee 
                + $otfourr + $otfivee + $otsixx + $otsevenn;
            }
        }


        // total night differential
        $totalNightDifferential = 0; // total night differentail hours

        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {

                $totalNightDifferential = 
                $item->night_differential_regular_day + $item->night_differential_special_holiday
                + $item->night_differential_wdo  + $item->night_differential_special_holiday_falling_on_rest_day 
                + $item->night_differential_legal_holiday  + $item->night_differential_legal_holiday_falling_on_rest_day
                + $item->night_differential_double_pay + $item->night_differential_double_pay_falling_on_rest_day 
                // old rate
                + $item->night_differential_regular_day_wri + $item->night_differential_special_holiday_wri
                + $item->night_differential_wdo_wri  + $item->night_differential_special_holiday_falling_on_rest_day_wri 
                + $item->night_differential_legal_holiday_wri  + $item->night_differential_legal_holiday_falling_on_rest_day_wri
                + $item->night_differential_double_pay_wri + $item->night_differential_double_pay_falling_on_rest_day_wri;
            }
        }

        $totalNightDifferentialAmount = 0; // total night differential in cash

        $a = $item->night_differential_regular_day * ($item->old_rate / 8 * 0.1);
        $b = $item->night_differential_special_holiday * ($item->old_rate * 1.3 * 0.1 / 8);
        // muramos juntos.
        $c = $item->night_differential_wdo  * ($item->old_rate * 1.3 * 0.1 / 8);
        $d = $item->night_differential_special_holiday_falling_on_rest_day * ($item->old_rate * 1.5 * 0.1 / 8);
        $e = $item->night_differential_legal_holiday * ($item->old_rate / 8 * 0.1);
        $f = $item->night_differential_legal_holiday_falling_on_rest_day * ($item->old_rate * 1.6 * 0.1 / 8);
        $g = $item->night_differential_double_pay * ($item->old_rate * 2 * 0.1 / 8);
        $h = $item->night_differential_double_pay_falling_on_rest_day * ($item->old_rate * 2.9 * 0.1 / 8);
        
        $aa = $item->night_differential_regular_day_wri * ($item->new_rate / 8 * 0.1);
        $bb = $item->night_differential_special_holiday_wri * ($item->new_rate * 1.3 * 0.1 / 8);
        $cc = $item->night_differential_wdo_wri  * ($item->new_rate * 1.3 * 0.1 / 8);
        $dd = $item->night_differential_special_holiday_falling_on_rest_day_wri * ($item->new_rate * 1.5 * 0.1 / 8);
        $ee = $item->night_differential_legal_holiday_wri * ($item->new_rate / 8 * 0.1);
        $ff = $item->night_differential_legal_holiday_falling_on_rest_day_wri * ($item->new_rate * 1.6 * 0.1 / 8);
        $gg = $item->night_differential_double_pay_wri * ($item->new_rate * 2 * 0.1 / 8);
        $hh = $item->night_differential_double_pay_falling_on_rest_day_wri * ($item->new_rate * 2.9 * 0.1 / 8);

        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {

                $totalNightDifferentialAmount = 
                $a + $b + $c + $d + $e + $f + $g + $h + 
                $aa + $bb + $cc + $dd + $ee + $ff + $gg + $hh;
            }
        }

        // total ot with night differential
        $totalOTwithNightDiff = 0; // total overtime with night differential hour
       
        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {

                $totalOTwithNightDiff = 
                $item->overtime_with_night_differential_regular_day + $item->overtime_with_night_differential_special_holiday  
                + $item->overtime_with_night_differential_wdo + $item->overtime_with_night_differential_special_holiday_rest_day
                + $item->overtime_with_night_differential_legal_holiday + $item->overtime_with_night_differential_legal_holiday_rest_day 
                + $item->overtime_with_night_differential_double_pay + $item->overtime_with_night_differential_double_pay_rest_day
                // old rate
                + $item->overtime_with_night_differential_regular_day_wri + $item->overtime_with_night_differential_special_holiday_wri 
                + $item->overtime_with_night_differential_wdo_wri + $item->overtime_with_night_differential_special_holiday_rest_day_wri
                + $item->overtime_with_night_differential_legal_holiday_wri + $item->overtime_with_night_differential_legal_holiday_rest_day_wri 
                + $item->overtime_with_night_differential_double_pay_wri + $item->overtime_with_night_differential_double_pay_rest_day_wri
                ;
            }
        }   

        $totalOTwithNightDiffAmount = 0; // total overtime with night differentail in cash

        $jj = $item->overtime_with_night_differential_regular_day * ($item->old_rate * 1.25 * 0.1 / 8);
        $kk = $item->overtime_with_night_differential_special_holiday * ($item->old_rate * 1.3 * 1.3 * 0.1 / 8);
        $ll = $item->overtime_with_night_differential_wdo * ($item->old_rate * 1.3 * 1.3 * 0.1 / 8);
        $mm = $item->overtime_with_night_differential_special_holiday_rest_day * ($item->old_rate * 1.5 * 1.3 * 0.1 / 8);
        $nn = $item->overtime_with_night_differential_legal_holiday * ($item->old_rate * 1.3 * 0.1 / 8);
        $oo = $item->overtime_with_night_differential_legal_holiday_rest_day * ($item->old_rate * 1.6 * 1.3 * 0.1 / 8);
        $pp = $item->overtime_with_night_differential_double_pay * ($item->old_rate * 2 * 1.3 * 0.1 / 8);
        $qq = $item->overtime_with_night_differential_double_pay_rest_day * ($item->old_rate * 2.9 *1.3 * 0.1 / 8);
        // old rate
        $rr = $item->overtime_with_night_differential_regular_day_wri * ($item->new_rate * 1.25 * 0.1 / 8);
        $ss = $item->overtime_with_night_differential_special_holiday_wri * ($item->new_rate * 1.3 * 1.3 * 0.1 / 8);
        $tt = $item->overtime_with_night_differential_wdo_wri * ($item->new_rate * 1.3 * 1.3 * 0.1 / 8);
        $uu = $item->overtime_with_night_differential_special_holiday_rest_day_wri * ($item->new_rate * 1.5 * 1.3 * 0.1 / 8);
        $vv = $item->overtime_with_night_differential_legal_holiday_wri  * ($item->new_rate * 1.3 * 0.1 / 8);
        $ww = $item->overtime_with_night_differential_legal_holiday_rest_day_wri * ($item->new_rate * 1.6 * 1.3 * 0.1 / 8);
        $xx = $item->overtime_with_night_differential_double_pay_wri * ($item->new_rate * 2 * 1.3 * 0.1 / 8);
        $yy = $item->overtime_with_night_differential_double_pay_rest_day_wri * ($item->new_rate * 2.9 *1.3 * 0.1 / 8);

        foreach ($transaction_lists as $item) {
            foreach ($rate_cards as $rate) {

                $totalOTwithNightDiffAmount = 
                $jj + $kk + $ll + $mm + $nn + $oo + $pp + $qq +
                $rr + $ss + $tt + $uu + $vv + $ww + $xx + $yy;
            }
        }

        $otherTotals = 0; // other total cash

        foreach ($transaction_lists as $item) {
           
                $otherTotals =
                $item->transportation + $item->mailing + $item->supplies + $item->lodging + $item->load_allowance  ;
        }

        $Month = 0; // 13th month / SIL

        foreach ($transaction_lists as $item) 
        {
            $Month = $item->sil_13th_month + $item->thirteen_month;
        }


        $totalEarnings = 0; // total cash earned

        $totalEarnings = $Amount + $specialTotalHoursAmount + $totalOvertimeAmount + $totalNightDifferentialAmount + $totalOTwithNightDiffAmount +
        + $otherTotals + $Month + $item->adjustment_plus;
        // earnings ends here

        // deductions starts here
       
        $totalLate = 0; // total late in cash
        foreach ($transaction_lists as $item) 
        {
            $totalLate = $item->late_deduction + $item->late_wri_deduction;
        }


        
        $deductionOthers = 0; //  deductions others 
        foreach ($transaction_lists as $item) 
        {
            $deductionOthers = $item->mga_meal + $item->adjustment_minus; 
        }


        $totalDeductions = 0; // total deductions
        
        foreach ($transaction_lists as $item) {

            $totalDeductions = $item->goverment_dues_sss + $item->goverment_dues_phic + $item->goverment_dues_hdmf +
                $totalLate + $item->pagibig_loan + $item->sss_loan + $deductionOthers 
            ;
        }
        //deductions ends here
  

        // for decimal point starts here
        $specialTotalHoursAmount = number_format($specialTotalHoursAmount, 2);
        $totalOvertimeAmount = number_format($totalOvertimeAmount, 2);
        $totalNightDifferentialAmount = number_format($totalNightDifferentialAmount, 2);
        $totalOTwithNightDiffAmount =  number_format($totalOTwithNightDiffAmount, 2);

        $totalEarnings = number_format($totalEarnings, 2);
        $deductionOthers = number_format($deductionOthers, 2);
        $totalDeductions = number_format($totalDeductions, 2);
        // $netPay  = number_format($netPay, 2);
        $Amount = number_format($Amount, 2);
        $Month = number_format($Month, 2);
        // for decimal point ends here

        
        set_time_limit(999); // downloading time limit

        // In the quiet of my mind, a shadow stirs, a restless echo of thoughts colliding like stormy seas, 
        // where the essence of who I am feels split, grappling with confusion and yearning for peace, 
        // searching for the light amid the chaos, hoping to weave the fragments into a tapestry of understanding and strength.
           // "Turbulence Within"

        // user filtrations starts here

        // user filtrations ends here

        
        // Get today's date
        $user_id = Auth::id(); // Assumes you are using Laravel's built-in authentication

        // Get today's date
        $today = Carbon::now(); 
        $currentMonth = $today->month;
        $currentYear = $today->year;
        $currentDay = $today->day;
        
        // Set the start and end dates for filtering based on the current day
        if ($currentDay >= 1 && $currentDay <= 15) {
            $startDate = Carbon::create($currentYear, $currentMonth - 1, 15)->startOfDay(); // 16th of previous month
            $endDate = Carbon::create($currentYear, $currentMonth - 1)->endOfMonth(); // Last day of the previous month
        } elseif ($currentDay >= 16 && $currentDay <= 25) {
            $startDate = Carbon::create($currentYear, $currentMonth, 1)->startOfDay(); // 1st of current month
            $endDate = Carbon::create($currentYear, $currentMonth, 15)->endOfDay(); // 15th of current month
        } else {
            $startDate = $today->startOfDay();
            $endDate = $today->endOfDay();
        }
        
        // Function to parse the 'period' string
        function parsePeriod($periodString) {
            try {
                $parts = explode(' ', $periodString);
                if (count($parts) < 4) return null;

                $month = $parts[0];
                $startDay = $parts[1];
                $endDay = trim($parts[3]);
                $year = $parts[4];
                $startDate = Carbon::createFromFormat('F j Y', "$month $startDay $year");
                $endDate = Carbon::createFromFormat('F j Y', "$month $endDay $year");
        
                return [$startDate, $endDate];
            } catch (Exception $e) {
                return null;
            }
        }
        
        // Now filter the transaction list based on the logged-in user_id and parsed period range
        $filteredTransactionLists = $transaction_lists->filter(function ($transaction) use ($user_id, $startDate, $endDate) {
            // Only include transactions that belong to the currently logged-in user
            if ($transaction->user_id != $user_id) {
                return false; // Skip this transaction if it's not the logged-in user's transaction
            }
        
            $period = $transaction->period;
            $parsedDates = parsePeriod($period);
        
            if ($parsedDates) {
                [$transactionStartDate, $transactionEndDate] = $parsedDates;
                return $transactionStartDate->between($startDate, $endDate) || $transactionEndDate->between($startDate, $endDate);
            }
            return false;
        });
        
        // If there are no transactions for this user, return an error or message
        if ($filteredTransactionLists->isEmpty()) {
            return response()->json(['error' => 'No transactions found for this user and period.'], 404);
        }
        
        // Set the base path for payslips for the logged-in user
        $userPath = public_path("payslips/user_{$user_id}");
        
        // Check if the base directory exists, if not, create it
        if (!File::exists($userPath)) {
            File::makeDirectory($userPath, 0755, true);
        }
        
        // Create a new ZIP file for the logged-in user
        $zip = new ZipArchive;
        $zip_file = public_path("payslips/user_{$user_id}/payslips_{$user_id}.zip");
        
        if ($zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Group transactions by coordinator for the current user
            $groupedByCoordinator = $filteredTransactionLists->groupBy('coordinator');
        
            foreach ($groupedByCoordinator as $coordinator => $transactions) {
                // Create a folder for each coordinator inside the zip
                $coordinatorFolder = "{$userPath}/{$coordinator}";
                if (!File::exists($coordinatorFolder)) {
                    File::makeDirectory($coordinatorFolder, 0755, true);
                }
        
                foreach ($transactions as $transaction) {
                    // Filter transactions for the current employee
                    $employeeTransactions = $transactions->filter(function ($trans) use ($transaction) {
                        return $trans->employee_name === $transaction->employee_name;
                    });
        
                    // Prepare data for the PDF generation
                    $data = [
                        'title' => 'BMPOWER HUMAN RESOURCES CORP.',
                        'date' => date('m/d/y'),
                        'transaction_lists' => $employeeTransactions,
                        'companies' => $companies,
                        'rate_cards' => $rate_cards,
                        'dayss' => $dayss,
                        'days' => $days,
                        'daysWri' => $daysWri,
                        'Amount' => $Amount,
                        'specialTotalHours' => $specialTotalHours,
                        'totalOvertime' => $totalOvertime,
                        'totalNightDifferential' => $totalNightDifferential,
                        'totalOTwithNightDiff' => $totalOTwithNightDiff,
                        'specialTotalHoursAmount' => $specialTotalHoursAmount,
                        'totalOvertimeAmount' => $totalOvertimeAmount,
                        'totalNightDifferentialAmount' => $totalNightDifferentialAmount,
                        'totalOTwithNightDiffAmount' => $totalOTwithNightDiffAmount,
                        'Month' => $Month,
                        'otherTotals' => $otherTotals,
                        'totalEarnings' => $totalEarnings,
                        'totalLate' => $totalLate,
                        'deductionOthers' => $deductionOthers,
                        'totalDeductions' => $totalDeductions,
                        
                    ];
        
                    // Generate the PDF for the employee
                    $pdf = PDF::loadView('pdfnew.newPayslip', $data)->setPaper('A4', 'portrait');
        
                    // Save the PDF to the coordinator's folder
                    $pdf_file = "{$coordinatorFolder}/{$transaction->employee_name}_payslip.pdf";
                    $pdf->save($pdf_file);
        
                    // Add the PDF file to the zip under the coordinator's folder
                    $zip->addFile($pdf_file, "{$coordinator}/{$transaction->employee_name}_payslip.pdf");
                }
            }
        
            // Close the zip after adding all files for the user
            $zip->close();
        }
        
        // Download the created zip file and delete it after sending to the client
        return Response::download($zip_file)->deleteFileAfterSend(true);
            // return view('pdfnew.newPayslip')->with($data); // close / open
        
    }
}


// Cloudy mind, empty feelings, and a numb body.
// It feels like my soul is drifting away from my body.
// I have these moments where I daydream, 
// always seeing myself looking at my body, 
// as if my soul is above, watching my helpless body below.
// When my soul leaves my body, I always feel weightless.
// It feels like freedom—something I've always longed for.
// To let my soul escape my body and experience that release.

// A cloudy mind, a numb body, and empty feelings; 
// my soul drifts away, watching from above, as if it no longer belongs. 
// In daydreams, I rise and look down on the helpless self below, 
// weightless and free, untethered by flesh. It’s the freedom I’ve always 
// longed for, to escape the confines of this body, 
// to slip into the void where peace resides, far from the chains of this world.
