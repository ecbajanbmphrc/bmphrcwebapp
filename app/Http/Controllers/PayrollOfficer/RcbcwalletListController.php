<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyDoor;
use App\Models\TransactionList;
use App\Models\Disbursement;

class RcbcwalletListController extends Controller
{
    public function fetchData(Request $request)
    {
        $user_id = session('user')['current_user_id'];

        $disbursement = DB::table('payroll_lists')
            ->leftJoin('company_doors', 'company_doors.id', '=', 'payroll_lists.company_door_id')
            ->leftJoin('manning_lists', 'company_door_id', 'door_id')
            ->leftJoin('merchandisers', 'merchandisers.id', '=', 'manning_lists.merchandiser_id')
            ->leftJoin('disbursements', 'merchandisers.id', '=', 'disbursements.merchandiser_id')
            ->select(
                DB::raw("CONCAT(merchandisers.first_name, 
                ' ', COALESCE(merchandisers.middle_name, ''), 
                ' ', merchandisers.last_name) as merchandiser_name"),
                'merchandisers.id as id',
                DB::raw('disbursements.rcbc_wallet as rcbcwallet')
                
            )
            ->where('merchandisers.is_active', '=', '1')
            ->where('payroll_lists.user_id', '=', $user_id)
            ->distinct('id')
            ->get();

        $disbursement->map(function ($item) {
            $item->actions = '<img src="/asset/img/button_img/arrow.png" alt="Button 1" class="arrow-button" style="height: 25px; width: 25px;">';
            return $item;
        });

        return response()->json(['dataone' => $disbursement]);
    }



    public function getUpdateData(Request $request)
    {

        $disbursement = Disbursement::firstOrCreate(['merchandiser_id'=> $request->merchandiser_id]);
        
        $disbursement->rcbc_wallet = $request->rcbcwallet_account_number;
        $disbursement->save();

        return redirect()->route('payrollofficer.view.payrollrcbcwallet')->with('success', 'RCBC E-Wallet Account Number updated successfully.');
    }

}


