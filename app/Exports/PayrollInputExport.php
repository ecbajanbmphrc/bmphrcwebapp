<?php
namespace App\Exports;

use DB;
use App\Models\TransactionList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Style\Border;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;


class PayrollInputExport implements  FromCollection, 
// WithColumnWidths, 
WithStyles, WithHeadingRow, WithHeadings, ShouldAutoSize , WithEvents
{
    /**
    * @return \Illuminate\Support\Collection

    */

    protected $userId;
    protected $period;

    public function __construct($userId, $period)
    {
        $this->userId = $userId;
        $this->period = $period;
    }

    public function collection()
    {
         $test = DB::table('transaction_lists')
            ->where('user_id', $this->userId) // Filter by the logged-in user's ID
            ->where('period', $this->period)
            ->select('account', 'hc', 'coordinator', 'employee_name', 'handled_store',

            'region', 'old_rate', 'actual_days_rendered', DB::raw('actual_days_rendered * old_rate as payone'),
            'region as second_region', 'actual_days_rendered_wri', 'actual_days_rendered_wri', DB::raw('actual_days_rendered_wri * new_rate as paytwo'),
            // SIL / 13TH MONTH
            'sil_13th_month', 'thirteen_month',
            // fuy
            // OLD RATE
            // SPCEIAL RATE
            'special_rates_special_holiday', DB::raw('special_rates_special_holiday * (old_rate * 1.3 / 8) as a'), 
            'special_rates_wdo', DB::raw(' special_rates_wdo * (old_rate * 1.3 / 8) as b'), 
            'special_rates_special_holiday_falling_on_rest_day', DB::raw('special_rates_special_holiday_falling_on_rest_day * (old_rate * 1.5 / 8) as c'), 

            'special_rates_legal_holiday', DB::raw('special_rates_legal_holiday * (old_rate / 8) as d'), 
            'special_rates_legal_holiday_falling_on_rest_day', DB::raw('special_rates_legal_holiday_falling_on_rest_day * (old_rate * 1.6 / 8) as e'), 
            'special_rates_double_pay', DB::raw('special_rates_double_pay * (old_rate * 2 / 8) as f'), 
            'special_rates_double_pay_falling_on_rest_day', DB::raw('special_rates_double_pay_falling_on_rest_day * (old_rate * 2.9 / 8) as g'),

            // OVERTIME
            'overtime_regular_day', DB::raw('overtime_regular_day * (old_rate * 1.25 / 8) as h'), 
            'overtime_special_holiday', DB::raw('overtime_special_holiday * (old_rate * 1.3 * 1.3 / 8) as i'), 
            'overtime_wdo', DB::raw('overtime_wdo * (old_rate * 1.3 * 1.3 / 8) as j'), 
            'overtime_special_holiday_falling_on_rest_day', DB::raw('overtime_special_holiday_falling_on_rest_day * (old_rate * 1.5 * 1.3 / 8) as k'),

            'overtime_legal_holiday', DB::raw('overtime_legal_holiday * (old_rate * 1.3 / 8) as l'), 
            'overtime_legal_holiday_falling_on_rest_day', DB::raw('overtime_legal_holiday_falling_on_rest_day * (old_rate * 1.6 * 1.3 / 8) as m'), 
            'overtime_double_pay', DB::raw('overtime_double_pay * (old_rate * 2 * 1.3 / 8) as n'), 
            'overtime_double_pay_falling_on_rest_day', DB::raw('overtime_double_pay_falling_on_rest_day * (old_rate * 2.9 * 1.3 / 8) as o'),
            
            // NIGHT DIFFERENTIAL
            'night_differential_regular_day', DB::raw('night_differential_regular_day * (old_rate / 8 * 0.1) as p'), 
            'night_differential_special_holiday', DB::raw('night_differential_special_holiday * (old_rate * 1.3 * 0.1 / 8) as q'), 
            'night_differential_wdo', DB::raw('night_differential_wdo * (old_rate * 1.3 * 0.1 / 8) as r'), 
            'night_differential_special_holiday_falling_on_rest_day', DB::raw('night_differential_special_holiday_falling_on_rest_day * (old_rate * 1.5 * 0.1 / 8) as s'),

            'night_differential_legal_holiday', DB::raw('night_differential_legal_holiday * (old_rate / 8 * 0.1) as t'), 
            'night_differential_legal_holiday_falling_on_rest_day', DB::raw('night_differential_legal_holiday_falling_on_rest_day * (old_rate * 1.6 * 0.1 / 8) as u'), 
            'night_differential_double_pay', DB::raw('night_differential_double_pay * (old_rate * 2 * 0.1 / 8) as v'), 
            'night_differential_double_pay_falling_on_rest_day', DB::raw('night_differential_double_pay_falling_on_rest_day * (old_rate * 2.9 * 0.1 / 8) as w'),

            // OVERTIME WITH NIGHT DIFFERENTIA
            'overtime_with_night_differential_regular_day', DB::raw('overtime_with_night_differential_regular_day * (old_rate * 1.25 * 0.1 / 8) as x'), 
            'overtime_with_night_differential_special_holiday', DB::raw('overtime_with_night_differential_special_holiday * (old_rate * 1.3 * 1.3 * 0.1 / 8) as y'), 
            'overtime_with_night_differential_wdo', DB::raw('overtime_with_night_differential_wdo * (old_rate * 1.3 * 1.3 * 0.1 / 8) as z'), 
            'overtime_with_night_differential_special_holiday_rest_day', DB::raw('overtime_with_night_differential_special_holiday_rest_day * (old_rate * 1.5 * 1.3 * 0.1 / 8) as aa'),

            'overtime_with_night_differential_legal_holiday', DB::raw('overtime_with_night_differential_legal_holiday * (old_rate * 1.3 * 0.1 / 8) as bb'), 
            'overtime_with_night_differential_legal_holiday_rest_day', DB::raw('overtime_with_night_differential_legal_holiday_rest_day * (old_rate * 1.6 * 1.3 * 0.1 / 8) as cc'), 
            'overtime_with_night_differential_double_pay', DB::raw('overtime_with_night_differential_double_pay * (old_rate * 2 * 1.3 * 0.1 / 8) as dd'), 
            'overtime_with_night_differential_double_pay_rest_day', DB::raw('overtime_with_night_differential_double_pay_rest_day * (old_rate * 2.9 *1.3 * 0.1 / 8) as ee'),

            // NEW RATE
            // SPCEIAL RATE
            'special_rates_special_holiday_wri', DB::raw('special_rates_special_holiday_wri * (new_rate * 1.3 / 8) as ff'), 
            'special_rates_wdo_wri', DB::raw(' special_rates_wdo_wri * (new_rate * 1.3 / 8) as ggg'), 
            'special_rates_special_holiday_falling_on_rest_day_wri', DB::raw('special_rates_special_holiday_falling_on_rest_day_wri * (new_rate * 1.5 / 8) as gg'), 

            'special_rates_legal_holiday_wri', DB::raw('special_rates_legal_holiday_wri * (new_rate / 8) as hh'), 
            'special_rates_legal_holiday_falling_on_rest_day_wri', DB::raw('special_rates_legal_holiday_falling_on_rest_day_wri * (new_rate * 1.6 / 8) as ii'), 
            'special_rates_double_pay_wri', DB::raw('special_rates_double_pay_wri * (new_rate * 2 / 8) as jj'), 
            'special_rates_double_pay_falling_on_rest_day_wri', DB::raw('special_rates_double_pay_falling_on_rest_day_wri * (new_rate * 2.9 / 8) as kk'),

            // OVERTIME
            'overtime_regular_day_wri', DB::raw('overtime_regular_day_wri * (new_rate * 1.25 / 8) as ll'), 
            'overtime_special_holiday_wri', DB::raw('overtime_special_holiday_wri * (new_rate * 1.3 * 1.3 / 8) as mm'), 
            'overtime_wdo_wri', DB::raw('overtime_wdo_wri * (new_rate * 1.3 * 1.3 / 8) as nn'), 
            'overtime_special_holiday_falling_on_rest_day_wri', DB::raw('overtime_special_holiday_falling_on_rest_day_wri * (new_rate * 1.5 * 1.3 / 8) as oo'),

            'overtime_legal_holiday_wri', DB::raw('overtime_legal_holiday_wri * (new_rate * 1.3 / 8) as pp'), 
            'overtime_legal_holiday_falling_on_rest_day_wri', DB::raw('overtime_legal_holiday_falling_on_rest_day_wri * (new_rate * 1.6 * 1.3 / 8) as qq'), 
            'overtime_double_pay_wri', DB::raw('overtime_double_pay_wri * (new_rate * 2 * 1.3 / 8) as rr'), 
            'overtime_double_pay_falling_on_rest_day_wri', DB::raw('overtime_double_pay_falling_on_rest_day_wri * (new_rate * 2.9 * 1.3 / 8) as ss'),
            
            // NIGHT DIFFERENTIAL
            'night_differential_regular_day_wri', DB::raw('night_differential_regular_day_wri * (new_rate / 8 * 0.1) as tt'), 
            'night_differential_special_holiday_wri', DB::raw('night_differential_special_holiday_wri * (new_rate * 1.3 * 0.1 / 8) as uu'), 
            'night_differential_wdo_wri', DB::raw('night_differential_wdo_wri * (new_rate * 1.3 * 0.1 / 8) as qqq'), 
            'night_differential_special_holiday_falling_on_rest_day_wri', DB::raw('night_differential_special_holiday_falling_on_rest_day_wri * (new_rate * 1.5 * 0.1 / 8) as vv'),

            'night_differential_legal_holiday_wri', DB::raw('night_differential_legal_holiday_wri * (new_rate / 8 * 0.1) as ww'), 
            'night_differential_legal_holiday_falling_on_rest_day_wri', DB::raw('night_differential_legal_holiday_falling_on_rest_day_wri * (new_rate * 1.6 * 0.1 / 8) as xx'), 
            'night_differential_double_pay_wri', DB::raw('night_differential_double_pay_wri * (new_rate * 2 * 0.1 / 8) as yy'), 
            'night_differential_double_pay_falling_on_rest_day_wri', DB::raw('night_differential_double_pay_falling_on_rest_day_wri * (new_rate * 2.9 * 0.1 / 8) as zz'),

            // OVERTIME WITH NIGHT DIFFERENTIA
            'overtime_with_night_differential_regular_day_wri', DB::raw('overtime_with_night_differential_regular_day_wri * (new_rate * 1.25 * 0.1 / 8) as aaa'), 
            'overtime_with_night_differential_special_holiday_wri', DB::raw('overtime_with_night_differential_special_holiday_wri * (new_rate * 1.3 * 1.3 * 0.1 / 8) as bbbb'), 
            'overtime_with_night_differential_wdo_wri', DB::raw('overtime_with_night_differential_wdo_wri * (new_rate * 1.3 * 1.3 * 0.1 / 8) as ccc'), 
            'overtime_with_night_differential_special_holiday_rest_day_wri', DB::raw('overtime_with_night_differential_special_holiday_rest_day_wri * (new_rate * 1.5 * 1.3 * 0.1 / 8) as ddd'),

            'overtime_with_night_differential_legal_holiday_wri', DB::raw('overtime_with_night_differential_legal_holiday_wri * (new_rate * 1.3 * 0.1 / 8) as eee'), 
            'overtime_with_night_differential_legal_holiday_rest_day_wri', DB::raw('overtime_with_night_differential_legal_holiday_rest_day_wri * (new_rate * 1.6 * 1.3 * 0.1 / 8) as fff'), 
            'overtime_with_night_differential_double_pay_wri', DB::raw('overtime_with_night_differential_double_pay_wri * (new_rate * 2 * 1.3 * 0.1 / 8) as ggggg'), 
            'overtime_with_night_differential_double_pay_rest_day_wri', DB::raw('overtime_with_night_differential_double_pay_rest_day_wri * (new_rate * 2.9 *1.3 * 0.1 / 8) as hhh'),
            
            // adjustment 
            'adjustment_plus', 'load_allowance', 'transportation', 'mailing', 'supplies', 'lodging', 

            // gross pay
            'net_pay',

            // late
            'late', 'late_deduction', 'late_wri', 'late_wri_deduction',
            
            // corruption
            'goverment_dues_sss', 'goverment_dues_phic', 'goverment_dues_hdmf',
            // deduction 
            'sss_loan', 'pagibig_loan', 'adjustment_minus', 'mga_meal',

            // net pay 
            'new_net_pay',
            
            // mode of payment
            'mode_of_payment', 'transaction_fee',
            
            // disers net pay
            'diser_net_pay'


            )
            ->get();
           
            // $  = $transaction_lists->sum('');
            // $  = $test->sum('');


            // calculate footer starts here
            $totaldays = $test->sum('actual_days_rendered');
            $totaldaysPay = $test->sum('payone');
            $totaldaysWri = $test->sum('actual_days_rendered_wri');
            $totaldaysPayWri = $test->sum('paytwo');
            $sil  = $test->sum('sil_13th_month');
            $thirteen  = $test->sum('thirteen_month');

            // sp 
            $a  = $test->sum('a');
            $aa  = $test->sum('b');
            $aaa  = $test->sum('c');
            $aaaa  = $test->sum('d');
            $aaaaa  = $test->sum('e');
            $aaaaaa  = $test->sum('f');
            $aaaaaaa  = $test->sum('g');

            // ot 
            $b  = $test->sum('h');
            $bb  = $test->sum('i');
            $bbb  = $test->sum('j');
            $bbbb  = $test->sum('k');
            $bbbbb  = $test->sum('l');
            $bbbbbb  = $test->sum('m');
            $bbbbbbb  = $test->sum('n');
            $bbbbbbbb  = $test->sum('o');

            // nd 
            $c  = $test->sum('p');
            $cc  = $test->sum('q');
            $ccc  = $test->sum('r');
            $cccc  = $test->sum('r');
            $ccccc = $test->sum('t');
            $cccccc  = $test->sum('u');
            $ccccccc  = $test->sum('v');
            $cccccccc  = $test->sum('w');

            // otnd 
            $d  = $test->sum('x');
            $dd  = $test->sum('y');
            $ddd  = $test->sum('z');
            $dddd  = $test->sum('aa');
            $ddddd  = $test->sum('bb');
            $dddddd  = $test->sum('cc');
            $ddddddd  = $test->sum('dd');
            $dddddddd  = $test->sum('ee');

            // new rate 
            // sp new rate
            $e  = $test->sum('ff');
            $ee  = $test->sum('ggg');
            $eee  = $test->sum('gg');
            $eeee  = $test->sum('hh');
            $eeeee  = $test->sum('ii');
            $eeeeee  = $test->sum('jj');
            $eeeeeee  = $test->sum('kk');

            // ot new rate 
            $f  = $test->sum('ll');
            $ff  = $test->sum('mm');
            $fff  = $test->sum('nn');
            $ffff  = $test->sum('oo');
            $fffff  = $test->sum('pp');
            $ffffff  = $test->sum('qq');
            $fffffff  = $test->sum('rr');
            $ffffffff  = $test->sum('ss');

            // nd new rate
            $g  = $test->sum('tt');
            $gg  = $test->sum('uu');
            $ggg  = $test->sum('qqq');
            $gggg  = $test->sum('vv');
            $ggggg  = $test->sum('ww');
            $gggggg  = $test->sum('yy');
            $ggggggg  = $test->sum('xx');
            $gggggggg  = $test->sum('zz');

            // otnd new rate
            $h  = $test->sum('aaa');
            $hh  = $test->sum('bbb');
            $hhh  = $test->sum('ccc');
            $hhhh  = $test->sum('dddd');
            $hhhhh  = $test->sum('eee');
            $hhhhhh  = $test->sum('fff');
            $hhhhhhh  = $test->sum('gggg');
            $hhhhhhhh  = $test->sum('hhh');

            // 
            $plus = $test->sum('adjustment_plus');
            $load  = $test->sum('load_allowance');
            $trans  = $test->sum('transportation');
            $mail  = $test->sum('mailing');
            $supl  = $test->sum('supplies');
            $lodg  = $test->sum('lodging');


            // $  = $transaction_lists->sum('');
            // net pay
            $net  = $test->sum('net_pay');
            // lates
            $late  = $test->sum('late_deduction');
            $lateWri  = $test->sum('late_wri_deduction');  
            // gov
            $sss  = $test->sum('goverment_dues_sss');
            $phil  = $test->sum('goverment_dues_phic');
            $hdmf  = $test->sum('goverment_dues_hdmf');

            // deduction 
            $sssloan  = $test->sum('sss_loan');
            $pagibigloan  = $test->sum('pagibig_loan');
            $adjustmentminus  = $test->sum('adjustment_minus');
            $meal  = $test->sum('mga_meal');
            // net pay 
            $newnet  = $test->sum('new_net_pay');
            // transactions
            // $mopp  = $test->sum('mode_of_payment');
            $fee  = $test->sum('transaction_fee');
            // disers net pay
            $diser  = $test->sum('diser_net_pay');



            $total_clh = $test->sum(function($item){
                if($item->mode_of_payment === "Cebuana Lhuillier"){
                    return $item->diser_net_pay;
                }
            });  

            $total_clh_transaction_fee = $test->sum(function($item) {
                if ($item->mode_of_payment === "Cebuana Lhuillier") {
                    return $item->transaction_fee; // Sum the transaction fees
                }
                return 0; // Return 0 for other payment modes
            });

           $total_eastwest = $test->sum(function($item){
                if($item->mode_of_payment === "Eastwest"){
                    return $item->diser_net_pay;
                }
            }); 

            $total_Gcash = $test->sum(function($item) {
                $excludedPayments = ["Cebuana Lhuillier", "Eastwest", "RCBC", "RCBC E-Wallet"]; // Excluded payment modes
                if (!in_array($item->mode_of_payment, $excludedPayments)) {
                    return $item->diser_net_pay;
                }
                return 0; // Return 0 for excluded modes
            });

            $total_Gcash_transaction_fee = $test->sum(function($item) {
                $excludedPayments = ["Cebuana Lhuillier", "Eastwest", "RCBC", "RCBC E-Wallet"]; // Excluded payment modes
                if (!in_array($item->mode_of_payment, $excludedPayments)) {
                    return $item->transaction_fee; // Sum transaction fees for GCash
                }
                return 0; // Return 0 for excluded modes
            });
            

            $total_rcbc = $test->sum(function($item){
                if($item->mode_of_payment === "RCBC"){
                    return $item->diser_net_pay;
                }
            });

            $total_rcbcwallet = $test->sum(function($item){
                if($item->mode_of_payment === "RCBC E-Wallet"){
                    return $item->diser_net_pay;
                }
            });

            $eugenepogi = $total_clh + $total_clh_transaction_fee + 
                    $total_eastwest +  $total_Gcash + $total_Gcash_transaction_fee + 
                    $total_rcbc + $total_rcbcwallet;

    
            // Append footer data including the single total
            $footer = [
                (object)[
                    'account' => '', 
                    'hc' => '', 
                    'coordinator' => '', 
                    'employee_name' => '', 
                    'handled_store' => '',
                    'region' => '', 
                    'old_rate' => '', 
                    'actual_days_rendered' => $totaldays,
                    'payone' =>  $totaldaysPay,
                    'region as second_region' => '', 
                    'actual_days_rendered_wri' =>  $totaldaysWri, 
                    'paytwo' => $totaldaysPayWri,
                    // SIL / 13TH MONTH
                    'sil_13th_month' => $sil, 
                    'thirteen_month' => $thirteen ,
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 
                    'a' => $a, 
                    'special_rates_wdo' => '', 
                    'b' => $aa, 
                    'special_rates_special_holiday_falling_on_rest_day' => '', 
                    'c' => $aaa, 

                    'special_rates_legal_holiday' => '', 
                    'd' => $aaaa, 
                    'special_rates_legal_holiday_falling_on_rest_day' => '', 
                    'e' => $aaaa, 
                    'special_rates_double_pay' => '', 
                    'f' => $aaaaaa, 
                    'special_rates_double_pay_falling_on_rest_day' => '', 
                    'g' => $aaaaaaa,

                    // OVERTIME
                    'overtime_regular_day' => '',
                    'h' => $b, 
                    'overtime_special_holiday' => '', 
                    'i' => $bb, 
                    'overtime_wdo' => '', 
                    'j' => $bbb, 
                    'overtime_special_holiday_falling_on_rest_day' => '', 
                    'k' => $bbbb,

                    'overtime_legal_holiday' => '',
                    'l' => $bbbbb, 
                    'overtime_legal_holiday_falling_on_rest_day' => '', 
                    'm' => $bbbbbb, 
                    'overtime_double_pay' => '', 
                    'n' => $bbbbbbb, 
                    'overtime_double_pay_falling_on_rest_day' => '', 
                    'o' => $bbbbbbbb,
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 
                    'p' => $c, 
                    'night_differential_special_holiday' => '', 
                    'q' => $cc, 
                    'night_differential_wdo' => '', 
                    'r' => $ccc, 
                    'night_differential_special_holiday_falling_on_rest_day' => '', 
                    's' => $cccc,

                    'night_differential_legal_holiday' => '', 
                    't' => $ccccc, 
                    'night_differential_legal_holiday_falling_on_rest_day' =>'', 
                    'u' => $cccccc, 
                    'night_differential_double_pay' => '', 
                    'v' => $ccccccc, 
                    'night_differential_double_pay_falling_on_rest_day' => '', 
                    'w' => $cccccccc,

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 
                    'x' => $d, 
                    'overtime_with_night_differential_special_holiday' => '', 
                    'y' => $dd, 
                    'overtime_with_night_differential_wdo' => '', 
                    'z' => $ddd, 
                    'overtime_with_night_differential_special_holiday_rest_day' => '', 
                    'aa' => $dddd,

                    'overtime_with_night_differential_legal_holiday' => '', 
                    'bb' => $ddddd, 
                    'overtime_with_night_differential_legal_holiday_rest_day' => '', 
                    'cc' => $dddddd, 
                    'overtime_with_night_differential_double_pay' => '', 
                    'dd' => $ddddddd, 
                    'overtime_with_night_differential_double_pay_rest_day' => '',
                    'ee' => $dddddddd,

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 
                    'ff' => $e, 
                    'special_rates_wdo_wri' => '',  
                    'ggg' => $ee, 
                    'special_rates_special_holiday_falling_on_rest_day_wri' => '', 
                    'gg' => $eee, 

                    'special_rates_legal_holiday_wri' => '', 
                    'hh' => $eeee, 
                    'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 
                    'ii' => $eeeee, 
                    'special_rates_double_pay_wri' => '', 
                    'jj' => $eeeeee, 
                    'special_rates_double_pay_falling_on_rest_day_wri' => '', 
                    'kk' => $eeeeeee,

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 
                    'll' => $f, 
                    'overtime_special_holiday_wri' => '',
                    'mm' => $ff, 
                    'overtime_wdo_wri' => '', 
                    'nn' => $fff, 
                    'overtime_special_holiday_falling_on_rest_day_wri' => '',
                    'oo' => $ffff,

                    'overtime_legal_holiday_wri' => '', 
                    'pp' => $fffff, 
                    'overtime_legal_holiday_falling_on_rest_day_wri' => '', 
                    'qq' => $ffffff, 
                    'overtime_double_pay_wri' => '', 
                    'rr' => $fffffff, 
                    'overtime_double_pay_falling_on_rest_day_wri' => '', 
                    'ss' => $ffffffff,
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '',  
                    'tt' => $g, 
                    'night_differential_special_holiday_wri' => '', 
                    'uu' => $gg, 
                    'night_differential_wdo_wri' => '', 
                    'qqq' => $gggg, 
                    'night_differential_special_holiday_falling_on_rest_day_wri' => '', 
                    'vv' => $gggg,

                    'night_differential_legal_holiday_wri' => '', 
                    'ww' => $ggggg, 
                    'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 
                    'xx' => $gggggg, 
                    'night_differential_double_pay_wri' => '', 
                    'yy' => $ggggggg, 
                    'night_differential_double_pay_falling_on_rest_day_wri' => '', 
                    'zz' => $gggggggg,

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 
                    'aaa' => $h, 
                    'overtime_with_night_differential_special_holiday_wri' => '', 
                    'bbb' => $hh, 
                    'overtime_with_night_differential_wdo_wri' => '', 
                    'ccc' => $hhh, 
                    'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 
                    'ddd' => $hhhh,

                    'overtime_with_night_differential_legal_holiday_wri' => '', 
                    'eee' => $hhhhh, 
                    'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 
                    'fff' => $hhhhhh, 
                    'overtime_with_night_differential_double_pay_wri' => '', 
                    'gggg' => $hhhhhhh, 
                    'overtime_with_night_differential_double_pay_rest_day_wri' => '', 
                    'hhh' => $hhhhhhhh,
        
                    // adjustment 
                    'adjustment_plus' => $plus, 
                    'load_allowance' => $load, 
                    'transportation' => $trans, 
                    'mailing' => $mail, 
                    'supplies' => $supl, 
                    'lodging' => $lodg, 

                    // gross pay
                    'net_pay' => $net,
                    // late
                    'late' => '', 
                    'late_deduction' => $late, 
                    'late_wri' => '', 
                    'late_wri_deduction' => $lateWri ,
                    // corruption
                    'goverment_dues_sss' => $sss, 
                    'goverment_dues_phic' => $phil, 
                    'goverment_dues_hdmf' => $hdmf,
                    // deduction 
                    'sss_loan' => $sssloan, 
                    'pagibig_loan' => $pagibigloan, 
                    'adjustment_minus' => $adjustmentminus, 
                    'mga_meal' => $meal,
                    // net pay 
                    'new_net_pay' => $newnet,
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => $fee ,
                    // disers net pay
                    'diser_net_pay' => $diser,
                ]
                
            ];

            $emptyRows = [];
            for ($i = 0; $i < 1; $i++) {
                $emptyRows[] = (object)[
                    'account' => '', 
                    'hc' => '', 
                    'coordinator' => '', 
                    'employee_name' => '', 
                    'handled_store' => '',
                    'region' => '', 
                    'old_rate' => '', 
                    'actual_days_rendered'  => '',
                    'payone' =>  '',
                    'region as second_region' => '', 
                    'actual_days_rendered_wri' => '', 
                    'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 
                    'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 
                    'a' => '', 
                    'special_rates_wdo' => '', 
                    'b' => '', 
                    'special_rates_special_holiday_falling_on_rest_day' => '', 
                    'c' => '', 

                    'special_rates_legal_holiday' => '', 
                    'd' => '', 
                    'special_rates_legal_holiday_falling_on_rest_day' => '', 
                    'e' => '', 
                    'special_rates_double_pay' => '', 
                    'f' => '', 
                    'special_rates_double_pay_falling_on_rest_day' => '', 
                    'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '',
                    'h' => '', 
                    'overtime_special_holiday' => '', 
                    'i' => '', 
                    'overtime_wdo' => '', 
                    'j' => '', 
                    'overtime_special_holiday_falling_on_rest_day' => '', 
                    'k' => '',

                    'overtime_legal_holiday' => '',
                    'l' => '', 
                    'overtime_legal_holiday_falling_on_rest_day' => '', 
                    'm' => '', 
                    'overtime_double_pay' => '', 
                    'n' => '', 
                    'overtime_double_pay_falling_on_rest_day' => '', 
                    'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 
                    'p' => '', 
                    'night_differential_special_holiday' => '', 
                    'q' => '', 
                    'night_differential_wdo' => '', 
                    'r' => '', 
                    'night_differential_special_holiday_falling_on_rest_day' => '', 
                    's' => '',

                    'night_differential_legal_holiday' => '', 
                    't' => '', 
                    'night_differential_legal_holiday_falling_on_rest_day' =>'', 
                    'u' => '', 
                    'night_differential_double_pay' => '', 
                    'v' => '', 
                    'night_differential_double_pay_falling_on_rest_day' => '', 
                    'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 
                    'x' => '', 
                    'overtime_with_night_differential_special_holiday' => '', 
                    'y' => '', 
                    'overtime_with_night_differential_wdo' => '', 
                    'z' => '', 
                    'overtime_with_night_differential_special_holiday_rest_day' => '', 
                    'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 
                    'bb' => '', 
                    'overtime_with_night_differential_legal_holiday_rest_day' => '', 
                    'cc' => '', 
                    'overtime_with_night_differential_double_pay' => '', 
                    'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '',
                    'ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 
                    'ff' => '', 
                    'special_rates_wdo_wri' => '',  
                    'ggg' => '', 
                    'special_rates_special_holiday_falling_on_rest_day_wri' => '', 
                    'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 
                    'hh' => '', 
                    'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 
                    'ii' => '', 
                    'special_rates_double_pay_wri' => '', 
                    'jj' => '', 
                    'special_rates_double_pay_falling_on_rest_day_wri' => '', 
                    'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 
                    'll' => '', 
                    'overtime_special_holiday_wri' => '',
                    'mm' => '', 
                    'overtime_wdo_wri' => '', 
                    'nn' => '', 
                    'overtime_special_holiday_falling_on_rest_day_wri' => '',
                    'oo' => '',

                    'overtime_legal_holiday_wri' => '', 
                    'pp' => '', 
                    'overtime_legal_holiday_falling_on_rest_day_wri' => '', 
                    'qq' => '', 
                    'overtime_double_pay_wri' => '', 
                    'rr' => '', 
                    'overtime_double_pay_falling_on_rest_day_wri' => '', 
                    'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '',  
                    'tt' => '', 
                    'night_differential_special_holiday_wri' => '', 
                    'uu' => '', 
                    'night_differential_wdo_wri' => '', 
                    'qqq' => '', 
                    'night_differential_special_holiday_falling_on_rest_day_wri' => '', 
                    'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 
                    'ww' => '', 
                    'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 
                    'xx' => '', 
                    'night_differential_double_pay_wri' => '', 
                    'yy' => '', 
                    'night_differential_double_pay_falling_on_rest_day_wri' => '', 
                    'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 
                    'aaa' => '', 
                    'overtime_with_night_differential_special_holiday_wri' => '', 
                    'bbb' => '', 
                    'overtime_with_night_differential_wdo_wri' => '', 
                    'ccc' => '', 
                    'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 
                    'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 
                    'eee' => '', 
                    'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 
                    'fff' => '', 
                    'overtime_with_night_differential_double_pay_wri' => '', 
                    'gggg' => '', 
                    'overtime_with_night_differential_double_pay_rest_day_wri' => '', 
                    'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 
                    'load_allowance' => '', 
                    'transportation' => '', 
                    'mailing' => '', 
                    'supplies' => '', 
                    'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => '',
                    // disers net pay
                    'diser_net_pay' => '',
                ];
            }

            $additionaFooter = [
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => '',
                    // disers net pay
                    'diser_net_pay' => '',
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'CLH :',
                    // disers net pay
                    'diser_net_pay' => $total_clh,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'CLH FEE :',
                    // disers net pay
                    'diser_net_pay' => $total_clh_transaction_fee,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'EASTWEST :',
                    // disers net pay
                    'diser_net_pay' => $total_eastwest,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'GCASH :',
                    // disers net pay
                    'diser_net_pay' => $total_Gcash,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'GCASH FEE :',
                    // disers net pay
                    'diser_net_pay' => $total_Gcash_transaction_fee,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'RCBC :',
                    // disers net pay
                    'diser_net_pay' => $total_rcbc,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'RCBC E-WALLET :',
                    // disers net pay
                    'diser_net_pay' => $total_rcbcwallet,
                ],
                (object)[
                    'account' => '', 'hc' => '', 'coordinator' => '', 'employee_name' => '', 'handled_store' => '','region' => '', 'old_rate' => '', 
                    'actual_days_rendered'  => '', 'payone' =>  '', 'region as second_region' => '', 'actual_days_rendered_wri' => '', 'paytwo' => '',
                    // SIL / 13TH MONTH
                    'sil_13th_month' => '', 'thirteen_month' => '',
                    // fuy
                    // OLD RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday' => '', 'a' => '', 'special_rates_wdo' => '', 'b' => '', 'special_rates_special_holiday_falling_on_rest_day' => '', 'c' => '', 
                    
                    'special_rates_legal_holiday' => '', 'd' => '', 'special_rates_legal_holiday_falling_on_rest_day' => '', 'e' => '', 
                    'special_rates_double_pay' => '', 'f' => '', 'special_rates_double_pay_falling_on_rest_day' => '', 'g' => '',

                    // OVERTIME
                    'overtime_regular_day' => '','h' => '', 'overtime_special_holiday' => '', 'i' => '', 'overtime_wdo' => '', 'j' => '', 'overtime_special_holiday_falling_on_rest_day' => '', 'k' => '',

                    'overtime_legal_holiday' => '','l' => '', 'overtime_legal_holiday_falling_on_rest_day' => '', 'm' => '', 'overtime_double_pay' => '', 'n' => '', 'overtime_double_pay_falling_on_rest_day' => '', 'o' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day' => '', 'p' => '', 'night_differential_special_holiday' => '', 'q' => '', 'night_differential_wdo' => '', 'r' => '', 'night_differential_special_holiday_falling_on_rest_day' => '', 's' => '',

                    'night_differential_legal_holiday' => '', 't' => '', 'night_differential_legal_holiday_falling_on_rest_day' =>'', 'u' => '', 'night_differential_double_pay' => '', 'v' => '', 'night_differential_double_pay_falling_on_rest_day' => '', 'w' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day' => '', 'x' => '', 'overtime_with_night_differential_special_holiday' => '', 'y' => '', 'overtime_with_night_differential_wdo' => '', 'z' => '', 'overtime_with_night_differential_special_holiday_rest_day' => '', 'aa' => '',

                    'overtime_with_night_differential_legal_holiday' => '', 'bb' => '', 'overtime_with_night_differential_legal_holiday_rest_day' => '', 'cc' => '', 'overtime_with_night_differential_double_pay' => '', 'dd' => '', 
                    'overtime_with_night_differential_double_pay_rest_day' => '','ee' => '',

                    // NEW RATE
                    // SPCEIAL RATE
                    'special_rates_special_holiday_wri' => '', 'ff' => '', 'special_rates_wdo_wri' => '',  'ggg' => '', 'special_rates_special_holiday_falling_on_rest_day_wri' => '', 'gg' => '', 

                    'special_rates_legal_holiday_wri' => '', 'hh' => '', 'special_rates_legal_holiday_falling_on_rest_day_wri' => '', 'ii' => '', 'special_rates_double_pay_wri' => '', 'jj' => '', 'special_rates_double_pay_falling_on_rest_day_wri' => '', 'kk' => '',

                    // OVERTIME
                    'overtime_regular_day_wri' => '', 'll' => '', 'overtime_special_holiday_wri' => '','mm' => '', 'overtime_wdo_wri' => '', 'nn' => '', 'overtime_special_holiday_falling_on_rest_day_wri' => '','oo' => '',

                    'overtime_legal_holiday_wri' => '', 'pp' => '', 'overtime_legal_holiday_falling_on_rest_day_wri' => '', 'qq' => '', 'overtime_double_pay_wri' => '', 'rr' => '', 'overtime_double_pay_falling_on_rest_day_wri' => '', 'ss' => '',
                    
                    // NIGHT DIFFERENTIAL
                    'night_differential_regular_day_wri' => '', 'tt' => '', 'night_differential_special_holiday_wri' => '', 'uu' => '', 'night_differential_wdo_wri' => '', 'qqq' => '', 'night_differential_special_holiday_falling_on_rest_day_wri' => '', 'vv' => '',

                    'night_differential_legal_holiday_wri' => '', 'ww' => '', 'night_differential_legal_holiday_falling_on_rest_day_wri' => '', 'xx' => '', 'night_differential_double_pay_wri' => '', 'yy' => '', 'night_differential_double_pay_falling_on_rest_day_wri' => '', 'zz' => '',

                    // OVERTIME WITH NIGHT DIFFERENTIA
                    'overtime_with_night_differential_regular_day_wri' => '', 'aaa' => '', 'overtime_with_night_differential_special_holiday_wri' => '', 'bbb' => '', 'overtime_with_night_differential_wdo_wri' => '', 'ccc' => '', 'overtime_with_night_differential_special_holiday_rest_day_wri' => '', 'ddd' => '',

                    'overtime_with_night_differential_legal_holiday_wri' => '', 'eee' => '', 'overtime_with_night_differential_legal_holiday_rest_day_wri' => '', 'fff' => '', 'overtime_with_night_differential_double_pay_wri' => '', 'gggg' => '', 'overtime_with_night_differential_double_pay_rest_day_wri' => '', 'hhh' => '',
        
                    // adjustment 
                    'adjustment_plus' => '', 'load_allowance' => '', 'transportation' => '', 'mailing' => '', 'supplies' => '', 'lodging' => '', 

                    // gross pay
                    'net_pay' => '',
                    // late
                    'late' => '', 
                    'late_deduction' => '', 
                    'late_wri' => '', 
                    'late_wri_deduction' => '',
                    // corruption
                    'goverment_dues_sss' => '', 
                    'goverment_dues_phic' => '', 
                    'goverment_dues_hdmf' => '',
                    // deduction 
                    'sss_loan' => '', 
                    'pagibig_loan' => '', 
                    'adjustment_minus' => '', 
                    'mga_meal' => '',
                    // net pay 
                    'new_net_pay' => '',
                    // mode of payment
                    'mode_of_payment' => '', 
                    'transaction_fee' => 'TOTAL PAY-OUT :',
                    // disers net pay
                    'diser_net_pay' => $eugenepogi,
                ],

            ];
                
            //    dd($total_clh);
            //    dd($total_eastwest);
            //    dd($total_Gcash);
            //    dd($total_rcbc);
            //    dd($total_rcbcwallet);

            //    dd($test);
            // calculate footer ends here 
            return $test->merge($footer)->merge($emptyRows)->merge($additionaFooter);
        }


    // public function columnWidths(): array
    // {
    //     return [ 'B' => 45, ];
    // }

    public function headings(): array
    {
        
     return [
            
            // DATATABLE
            // FREEZE FRAME
            'ACCOUNT', 'HC', 'COORDINATOR', 'EMPLOYEE NAME', 'HANDLED STORES', 
            //OLD RATE
            'REGION','RATE APPLIED', 'ACTUAL DAYS RENDERED (OLD RATE)', 'PAY',
            // NEW RATE
            'REGION', 'ACTUAL DAYS RENDERED (NEW RATE)', 'PAY',
            //
            'SIL', '13TH MONTH',
            // SPECIAL RATES
            'SP SPEC HOL.', 'PAY', 'SP SPEC WDO', 'PAY', 'SP SPEC HOL. RD', 'PAY', 
            'SP LEG HOL.', 'PAY', 'SP LEG HOL. RD', 'PAY', 'SP DOU HOL.', 'PAY', 'SP DOU HOL. RD', 'PAY',
            //  OVER TIME
            'OT REG DAY', 'PAY', 'OT SPEC HOL.', 'PAY', ' OT WDO', 'PAY', 'OT SPEC HOL. RD', 'PAY', 
            'OT LEG HOL.', 'PAY', 'OT LEG HOL. RD', 'PAY', 'OT DOU HOL.', 'PAY', 'OT DOU HOL. RD', 'PAY',
            // NIGHT DIFFERENTIAL
            'ND REG DAY', 'PAY', 'ND SPEC HOL.', 'PAY', 'ND WDO', 'PAY', 'ND SPEC HOL. RD', 'PAY', 
            'ND LEG HOL.', 'PAY', 'ND LEG HOL. RD', 'PAY', 'ND DOU HOL.', 'PAY', 'ND DOU HOL. RD', 'PAY',
            // OVERTIME WITH NIGHT DIFFERENTIAL
            'OTND REG DAY', 'PAY', 'OTND SPEC HOL.', 'PAY', 'OTND WDO', 'PAY', 'OTND SPEC HOL. RD', 'PAY', 
            'OTND LEG HOL.', 'PAY', 'OTND LEG HOL. RD', 'PAY', 'OTND DOU HOL.', 'PAY', 'OTND DOU HOL. RD', 'PAY',
            
            // SPECIAL RATES WRI
            'SP SPEC HOL. (new rate)', 'PAY', 'SP WDO (new rate)', 'PAY', 'SP SPEC HOL. RD (new rate)', 'PAY', 
            'SP LEG HOL. (new rate)', 'PAY', 'SP LEG HOL. RD (new rate)', 'PAY', 'SP DOU HOL. (new rate)', 'PAY', 'SP DOU HOL. RD (new rate)', 'PAY',
            //  OVER TIME
            'OT REG DAY (new rate)', 'PAY', 'OT SPEC HOL. (new rate)', 'PAY', 'OT WDO (new rate)', 'PAY', 'OT SPEC HOL. RD (new rate)', 'PAY', 
            'OT LEG HOL. (new rate)', 'PAY', 'OT LEG HOL. RD (new rate)', 'PAY', 'OT DOU HOL. (new rate)', 'PAY', 'OT DOU HOL. RD (new rate)', 'PAY',
            // NIGHT DIFFERENTIAL
            'ND REG DAY (new rate)', 'PAY', 'ND SPEC HOL. (new rate)', 'PAY', 'ND WDO (new rate)', 'PAY', 'ND SPEC HOL. RD (new rate)', 'PAY', 
            'ND LEG HOL. (new rate)', 'PAY', 'ND LEG HOL. RD (new rate)', 'PAY', 'ND DOU HOL. (new rate)', 'PAY', 'ND DOU HOL. RD (new rate)', 'PAY',
            // OVERTIME WITH NIGHT DIFFERENTIAL
            'OTND REG DAY (new rate)', 'PAY', 'OTND SPEC HOL. (new rate)', 'PAY', 'OTND WDO (new rate)', 'PAY', 'OTND SPEC HOL. RD (new rate)', 'PAY', 
            'OTND LEG HOL. (new rate)', 'PAY', 'OTND LEG HOL. RD (new rate)', 'PAY', 'OTND DOU HOL. (new rate)', 'PAY', 'OTND DOU HOL. RD (new rate)', 'PAY',
            // ADJUSTMENT
            'ADJUSTMENT (+)',
            // REIMBURSEMENT 
            'LOAD ALLOWANCE', 'TRANSPORTATION', 'MAILINGS', 'SUPPLIES', 'LODGING',
            // GROSS PAY
            'GROSS PAY',
            // DEDUCTIONS
            'LATE / UNDERTIME', 'LATE / UNDERTIME AMOUNT', 
            'LATE / UNDERTIME (new rate)', 'LATE / UNDERTIME AMOUNT (new rate)',  
            // GOV DUES
            'SSS', 'PHIC', 'HDMF',
            // LOAN DEDUCTIONS
            'SSS LOAN', 'PAG-IBIG LOAN', 'ADJUSTMENT (-)', ' MGA MEAL',
            // NET PAY
            'NET PAY',
            // TRANSACTION FEE
            'MODE OF PAYMENT',
            'TRANSACTION FEE',
            // DISER'S NET PAY
            'DISERS NET PAY',
        ];
    }

    
    public function styles(Worksheet $sheet)
{
    // Header style array
    $headerStyleArray = [
        'font' => [
            'bold' => true,
            'size' => 14,
            'color' => ['argb' => '000000'], // Black font color
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => ['argb' => 'FFFF00'], // Yellow background
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                'color' => ['argb' => '000000'], // Black borders
            ],
        ],
    ];

    // Apply header styles
    $sheet->getStyle('A1:FD1')->applyFromArray($headerStyleArray);
    $sheet->getRowDimension(1)->setRowHeight(40);

    // Dynamically determine the footer row index
    $footerRowIndex = $sheet->getHighestRow(); // Get the last row with data

    // 1. Remove Yellow Background from any unnecessary rows (like row 22)
    $sheet->getStyle('A22:K22')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE);

    // 2. Apply Yellow Background to the new footer row
    $sheet->getStyle('H' . $footerRowIndex . ':FD' . $footerRowIndex)
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('FFFF00'); // Yellow background
}

    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Freeze the first row
                $event->sheet->freezePane('E2'); // Freezes the row below the header
    
                // Auto-fit columns from A to the last column with data
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
    
                foreach (range('A', $highestColumn) as $columnID) {
                    $event->sheet->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
    

    
    public function defaultStyles(Style $defaultStyle)
    {
        return [
            // 'fill' => [
            //     'fillType'   => Fill::FILL_SOLID,
            //     'startColor' => ['argb' => 'FBA834'],
            // ],
            
        ];
    }

    public function actions(Request $request)
    {
        return [
            new DownloadExcel(),
        ];
    }

}

