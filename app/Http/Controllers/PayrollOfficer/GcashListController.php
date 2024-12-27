<?php

namespace App\Http\Controllers\PayrollOfficer;

// use App\Http\Controllers\PayrollOfficer\Disbursement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyDoor;
use App\Models\TransactionList;
use App\Models\Disbursement;

class GcashListController extends Controller
{
    public function fetchData(Request $request)
    {   
        $user_id = session('user')['current_user_id'];

        $disbursement = DB::table('payroll_lists')
            ->leftjoin('company_doors', 'company_doors.id', '=', 'payroll_lists.company_door_id')
            ->leftjoin('manning_lists', 'company_door_id', 'door_id')
            ->leftjoin('merchandisers', 'merchandisers.id', '=', 'manning_lists.merchandiser_id')
            ->leftjoin('disbursements', 'merchandisers.id', '=', 'disbursements.merchandiser_id')
            ->select(
                 DB::raw("CONCAT(merchandisers.first_name, 
                ' ', COALESCE(merchandisers.middle_name, ''), 
                ' ', merchandisers.last_name) as merchandiser_name"),
                'merchandisers.id as id',
                DB::raw('disbursements.gcash_number as gcash_number')
                )
            
            ->where('merchandisers.is_active', '=', '1') 
            ->where('payroll_lists.user_id', '=', $user_id)
            ->distinct('id')
            ->get();
        // dd($disbursement);

        $disbursement->map(function ($item) {
            $item->actions = '<img src="/asset/img/button_img/arrow.png" alt="Button 1" class="arrow-button" style="height: 25px; width: 25px;">';
            return $item;
        });

        return response()->json(['dataone' => $disbursement]);
    }

    public function getUpdateData(Request $request)
    {

        $disbursement = Disbursement::firstOrCreate(['merchandiser_id'=> $request->merchandiser_id]);
        
        $disbursement->gcash_number = $request->gcash_account_number;
        $disbursement->save();

        return redirect()->route('payrollofficer.view.payrollgcash')->with('success', 'GCash Account Number updated successfully.');
    }

}


// Dear MJ,

// I am writing in response to the Notice of Tardiness (NTE) I received regarding my frequent lateness. 
// I fully understand the importance of punctuality, and I sincerely apologize for my tardiness and any inconvenience it has caused to the team.

// The primary reason for my lateness has been the significant distance between my home and the office, which, combined with heavy daily traffic, 
// has made it challenging for me to arrive on time. Despite my best efforts to account for these factors, the unpredictable nature of traffic congestion often causes delays beyond my control.

// I recognize that this situation is not ideal, and I am committed to making improvements. To prevent further occurrences, 
// I will take proactive steps to ensure I arrive on time, such as adjusting my routine and waking earlier to allow for additional travel time. 

// I will also explore alternate routes or transportation options in an effort to mitigate the impact of traffic.

// Please rest assured that I am dedicated to improving my punctuality and contributing to the team's success. 
// I value my role at BMPower and will do everything I can to ensure that this issue does not persist.

// Thank you for your understanding, and I appreciate your patience as I work to resolve this matter.

// Sincerely,
// Eugene