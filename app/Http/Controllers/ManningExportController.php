<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\ManningExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManningExportController extends Controller
{
    /**
     * Export data to Excel file filtered by user ID, period, and active status.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        $userId = Auth::id(); // Get the currently logged-in user's ID
        $period = $this->getPeriodForManning(); // Determine the cut-off period

        return Excel::download(new ManningExport($userId, $period), 'manning.xlsx');
    }

    /**
     * Determine the cut-off period based on today's date.
     *
     * @return array
     */
    private function getPeriodForManning()
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

        return ['start' => $startDate, 'end' => $endDate];
    }
}
