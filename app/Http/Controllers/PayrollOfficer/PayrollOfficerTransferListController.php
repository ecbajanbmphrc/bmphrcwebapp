<?php

namespace App\Http\Controllers\PayrollOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PayrollList;
use App\Models\CompanyDoor;

use Session;
use DB;

class PayrollOfficerTransferListController extends Controller
    {
        // public function fetchData(Request $request)
        // {
        //     $data = CompanyDoor::where([
        //         ['status', '=' , 'active'],
        //         ['id', '<>' , 1]
        //     ])->get();

        //     $data = $data->map(function ($item, $key){
        //         $item['#'] = $key + 1;
        //         $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;">  ';
                
        //         return $item;
        //     });
        //     return response()->json(['dataone' => $data]);
        // }
        // public function fetchData(Request $request)
        //     {
        //         $user_id = session('user')['current_user_id'];
        //         $data = collect(PayrollList::where
        //         ([
        //             ['user_id', '=' , $user_id]
        //         ])
        //         ->select('company_door_id')
        //         ->get());

        //         $models = DB::table('manning_lists')
        //         ->join('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
        //         ->join('company_doors', 'manning_lists.door_id', '=', 'company_doors.id')
        //         ->join('companies', 'manning_lists.company_id', '=', 'companies.id')
        //         ->select('manning_lists.*', 'merchandisers.first_name as fname', 'merchandisers.middle_name as mname', 'merchandisers.last_name as lname' , 'company_doors.store_name as store_name', 'companies.name as company_name', 'company_doors.account as account_name')
        //         ->whereIn('door_id', $data)
        //         ->get();

        //         $models = $models->map(function ($item, $key){
        //             $item = (array)$item;
        //             $item['#'] = $key +1;
        //             $item['account_name'] = $item['account_name'];
        //             $item['fname'] = $item['fname'];
        //             $item['mname'] = $item['mname'];
        //             $item['lname'] = $item['lname'];
        //             $item['store_name'] = $item['store_name'];
        //             $item['company_name'] = $item['company_name'];
        //             $item['actions'] = '<i class="ri-bank-card-line" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';

        //             return $item;
        //         });
                
        //         return response()->json(['dataone' => $models]);
        //     }


        public function fetchData(Request $request)
        {
            $user_id = session('user')['current_user_id'];

            $user_type = session('user')['company_id'];

            $door_list  = DB::table('payroll_lists')
                ->where('user_id' , '=', $user_id)
                // ->where() // code added
                ->pluck('company_door_id')
                ->toArray();


            $visayasMindanaoRegions = ['special']; 

                // Luzon
                $luzonSpecialRate = DB::table('rate_cards')
                ->where('special', 'LUZ')
                ->max('new_rate_per_day');
            
            DB::table('rate_cards')
                ->where('special', 'LUZ')
                ->update(['special' => $luzonSpecialRate]);
                // dd($luzonSpecialRate);
            
            // VISAYAS and MINDANO
            $highestRate = DB::table('rate_cards')
                ->whereIn('special', ['VIS' , 'MIN'])
                ->max('rate_per_day');

            DB::table('rate_cards')
                ->whereIn('region', $visayasMindanaoRegions)
                ->update(['special' => $highestRate]);
            // dd($highestRate);

            $newhighestRate = DB::table('rate_cards')
                ->whereIn('special', ['VIS' , 'MIN'])
                ->max('new_rate_per_day');
            
            DB::table('rate_cards')
                ->whereIn('region', $visayasMindanaoRegions)
                ->update(['special' => $newhighestRate]);
                // dd($newhighestRate);

            // new condition ends here
            // Fetch payroll list with unique merchandiser details
            $payroll_list = DB::table('payroll_lists')
                ->leftjoin('manning_lists', 'company_door_id', 'door_id')
                ->leftjoin('merchandisers', 'merchandisers.id', '=', 'manning_lists.merchandiser_id')
                ->leftjoin('company_doors', 'company_doors.id', '=', 'payroll_lists.company_door_id')
                ->leftjoin('coordinators', 'coordinators.id', '=', 'company_doors.coordinator_id')
                ->leftjoin('rate_cards', 'merchandisers.rate_type', '=', 'rate_cards.region')
                ->leftjoin('disbursements', 'merchandisers.id', '=', 'disbursements.merchandiser_id')
                ->select( 
                    'merchandisers.first_name as merchandiser_fname',
                    'merchandisers.middle_name as merchandiser_mname',
                    'merchandisers.last_name as merchandiser_lname',
                    'merchandisers.rate_type as merchandiser_rate_type',
                    'merchandisers.type_of_deployment as merchandiser_type_of_deployment',
                    'merchandisers.remarks as merchandiser_remarks', 
                    'coordinators.first_name as coordinator_fname',
                    'coordinators.middle_name as coordinator_mname',
                    'coordinators.last_name as coordinator_lname',

                    'disbursements.bdo as bdo',
                    'disbursements.bpi as bpi',
                    'disbursements.cebuana as cebuana',
                    'disbursements.eastwest as eastwest',
                    'disbursements.gcash_number as gcash',
                    'disbursements.rcbc as rcbc',
                    'disbursements.rcbc_wallet as rcbcwallet',
                    'disbursements.bank_type as bank',
                    'disbursements.bank_account_number as number',


                    DB::raw('GROUP_CONCAT(DISTINCT company_doors.account SEPARATOR " / ") as account'),
                    DB::raw('GROUP_CONCAT(DISTINCT merchandisers.type_of_deployment SEPARATOR " | ") as employee_types'),
                    DB::raw('GROUP_CONCAT(DISTINCT company_doors.store_name SEPARATOR " / ") as handled_store'),
                    DB::raw('GROUP_CONCAT(DISTINCT company_doors.region SEPARATOR " | ") as region'),
                    DB::raw('GROUP_CONCAT(DISTINCT merchandisers.rate_type SEPARATOR " | ") as rate_type'),
                    DB::raw('MAX(rate_cards.rate_per_day) as ratings'),
                    DB::raw('MAX(rate_cards.new_rate_per_day) as newratings'),
                    // DB::raw('MAX(disbursements.gcash_number) as gcash'),

                )
                ->where('payroll_lists.user_id', '=', $user_id)
                ->where('merchandisers.is_active', '=', '1')
                ->groupBy(
                    'merchandisers.first_name',
                    'merchandisers.middle_name',
                    'merchandisers.last_name',
                    'merchandisers.rate_type',
                    'merchandisers.remarks',
                    'merchandisers.type_of_deployment',
                    'coordinators.first_name',
                    'coordinators.middle_name',
                    'coordinators.last_name',
                    'disbursements.gcash_number',
                    'disbursements.bdo',
                    'disbursements.bpi',
                    'disbursements.eastwest',
                    'disbursements.cebuana',
                    'disbursements.rcbc',
                    'disbursements.rcbc_wallet',
                    'disbursements.bank_type',
                    'disbursements.bank_account_number',

                )
                ->get();
                // dd($payroll_list);            

            // Map through the payroll list for further processing
            $payroll_list = $payroll_list->map(function($item) use ($newhighestRate, $luzonSpecialRate) {
                $item = (array) $item;

                // $item['merchandiser_remarks'] = $item['merchandiser_remarks'];
                $item['merchandiser_fullname'] = trim($item['merchandiser_fname'] . " " . $item['merchandiser_mname'] . " " . $item['merchandiser_lname']);
                $item['coordinator_fullname'] = trim($item['coordinator_fname'] . " " . $item['coordinator_mname'] . " " . $item['coordinator_lname']);
                

                // Special rate logic
                $item['special_rate'] = $newhighestRate;
                if (strpos($item['region'], 'Special Rates (LUZ)') !== false) {
                    $item['ratings'] = $luzonSpecialRate;
                }

                // Add action buttons
                $item['actions'] = '<img src="/asset/img/button_img/arrow.png" alt="Button 1" class="arrow-button" style="height: 25px; width: 25px;">';

                return $item;
            });

            return response()->json(['dataone' => $payroll_list]);

        }
        protected function getViewMerchandiserManning($id)
            {
                $company_door = DB::table('manning_lists')
                ->leftJoin('merchandisers', 'manning_lists.merchandiser_id', '=', 'merchandisers.id')
                ->select('manning_lists.*' , 'merchandisers.first_name as fname' , 'merchandisers.middle_name as mname' , 'merchandisers.last_name as lname' )
                ->where('door_id', $id)
                ->get();
                
                $company_door = $company_door->map(function($item){
                    $item = (array) $item;
                    $item['fname'] = $item ['fname'];
                    $item['mname'] = $item ['mname'];
                    $item['lname'] = $item ['lname'];
                    $item['actions'] = '<i class="bi bi-x-circle-fill" id="gpower" alt="Button" style="height: 40px; width: 40px; color: red;"></i>';

                    return $item;
                });
                
                    return response()->json(['data' => $company_door]);;
            }
    }
