<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\PayrollInputExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PayrollInputExportController extends Controller
{
    /**
     * Export data to Excel file filtered by user ID and period.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export()
    {
        $userId = Auth::id(); // Get the currently logged-in user's ID
        $today = Carbon::now(); // Get today's date
        
        // Calculate period based on the current date
        $period = $this->getPeriodForPayroll($today);
        
        // Return the Excel file with the filtered reimbursement data
        return Excel::download(new PayrollInputExport($userId, $period), 'Payroll.xlsx');
    }

     /**
     * Get the appropriate period range based on today's date for payroll.
     *
     * @param Carbon $today
     * @return string
     */
    private function getPeriodForPayroll($today)
    {
        $currentMonth = $today->month;
        $currentYear = $today->year;
        $currentDay = $today->day;

        if ($currentDay >= 1 && $currentDay <= 15) {
            // Get previous month's 16th to the last day of the previous month
            $previousMonth = $today->copy()->subMonth();
            $start = $previousMonth->format('F 16');
            $end = $previousMonth->endOfMonth()->format('d Y');
            return "$start - $end";
        } elseif ($currentDay >= 16 && $currentDay <= 25) {
            // Current month's 1st to 15th
            return $today->format('F 1 - 15 Y');
        } elseif ($currentDay >= 26 && $currentDay <= 31) {
            // Current month's 16th to the last day
            return $today->format('F 16 - d Y');
        }

        // Default: for 1st - 10th range
        return $today->format('F 1 - 15 Y');
    }
}


