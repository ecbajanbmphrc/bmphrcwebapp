<?php

namespace App\Http\Controllers\payrollofficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyDoor;
use App\Models\TransactionList;
use App\Models\Disbursement;

class BankListController extends Controller
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
                DB::raw('disbursements.bank_type as bank_type'),
                DB::raw('disbursements.bank_account_number as bank_account_number')

                
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
        
        $disbursement->bank_type = $request->type_account_number;
        $disbursement->bank_account_number = $request->bank_account_number;

        $disbursement->save();

        return redirect()->route('payrollofficer.view.payrollbank')->with('success', 'Account Number updated successfully.');
    }
}
