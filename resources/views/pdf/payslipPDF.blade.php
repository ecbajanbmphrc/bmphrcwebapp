<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- for toggle -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <title>{{ $title }}</title>
</head>
<body>
    <style>
        .container-lg {
            border: 5px solid #000;
            padding: 20px;
            margin: 0 auto;   
        }

        .row {
            display: flex;
            /* justify-content: center; */
            margin-top: 10px;
        }

        
        /* .col {
            width: 25%;
            padding: 5px;
        }
        .col-left {
            text-align: left;
        }
        .col-right {
            text-align: right;
        } */

        body {
            font-family: Arial, sans-serif;
        }

        .image{
            padding-top: 10px;
            position: absolute;
        }

        .textone{
            padding-top: 3px;
            margin-bottom: 3px;
            /* margin: 0; */
            text-align: center;
            margin-left: 20px;
        }
        .text-two{
            padding-top: 0;
            margin-bottom: 0;
            margin: 0;
            padding: 5px;
        }
        .text{
            margin: 0;
            text-align: left;
            font-weight: 500;
            /* background-color: green; */
            width: 100%;
            padding: 5px;
            margin-left: 20px;
        }

        /* .text-zero{
            font-weight: 500;
            padding: 5px;
            margin: 0;
            margin-left: 20px;
            font-size: 18px
        } */

        .head{
            margin-top: 0;
            margin-bottom: 0;
            font-size: 20px;
            font-weight: bold;
            margin-left: 20px;
        }

        .signature-line-one {
            position: relative;
            display: inline-block;
            padding-top: 0; 
        }

        .signature-line-one::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 300px;
            border-top: 2px solid black;
        }

        .signature-line {
            position: relative;
            display: inline-block;
            padding-top: 0; 
        }

        .signature-line::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            border-top: 2px solid black;
        }

        .page-break {
            page-break-after: always;
        }

        @page {
        size: A3;
        margin: 1cm; /* Adjust margin as needed */
        }



    </style>

    <div class="container-lg">
       
        <div class="image">
            <img style="width: 100px;" src="/asset/img/BMPower.logo.png" alt="">
        </div>
        <div class="textone ">
            <h3><strong>BMPower Human Resources Inc.</strong></h3>
        </div>  
        @foreach ($transaction_lists as $item)
        <!-- first line starts here -->
        <div class="row justify-content-center mt-3">
            <div class="col-md-2 mt-3 text-start" >
                <p class="" style="margin: 0px;"><strong>Name</strong></p>
                <p class="" style="margin: 0px; font-weight: 500;"><strong>Assigned</strong></p>
                <p class="" style="margin: 0px; font-weight: 500;"><strong>Period</strong></p> 
            </div>
            <div class="col-md-1 mt-3">
                <p class="" style="margin: 0px;">:</p>
                <p class="" style="margin: 0px;">:</p>
                <p class="" style="margin: 0px;">:</p>
            </div>
            <div class="col-md-2 mt-3">
                <p class="" style="margin: 0px; font-weight: 500;">{{$item->employee_name }}</p>
                <p class="" style="margin: 0px; font-weight: 500;">McKenzie</p>
                <p class="" style="margin: 0px; font-weight: 500;">{{$date}}</p>
            </div>
            <div class="col-md-2 mt-3">
                <p class="" style="margin: 0px;">{{$item->region }}</p>
                <!-- <p class="" style="margin: 0px;">NCR new rate</p> -->
            </div>
        </div>
        <!-- first line ends here -->

        <hr class="mt-3 mb-3">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <p class="" style="margin-top: 28px; margin-left: 25px;"><strong>Rendered Days :</strong></p>
                        <p class="" style="margin-left: 25px;"><strong>Rendered Days wri :</strong></p>
                    </div>

                    <div class="col-md-3">
                        <h6 style="font-weight: 700; font-size: 20px;">Days</h6>
                        <p style="font-weight: 500;">{{$item->actual_days_rendered }}</p> 
                        <p style="font-weight: 500;">{{$item->actual_days_rendered_wri }}</p> 
                    </div>
                    @foreach ($rate_cards as $rate)
                    <div class="col-md-3">
                        <h6 style="font-weight: 700; font-size: 20px;">Rate</h6>
                        <p style="font-weight: 500;">{{$rate->rate_per_day }}</p>
                        <p style="font-weight: 500;">{{$rate->new_rate_per_day }}</p>
                        <!-- I need to get the id of region for the rate to show -->
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <!-- <div class="break-pages"></div> -->
        <div class="row mt-2"> <!-- first row starts here -->
            <div class="col-md-7"><!-- first column starts here -->
                <div class="row mt-3"> <!-- first row inside whole row stars here -->
                    <div class="col-md-4"> <!-- col-md-5 starts here -->
                        <p class="head text-dark">Regular</p>
                        <p class="text text-dark">Special Holiday</p>
                        <p class="text text-dark">WDO</p>
                        <p class="text text-dark">Special Hol. RD</p>
                        <p class="text text-dark">Legal Holiday</p>
                        <p class="text text-dark">Legal Holiday RD</p>
                        <p class="text text-dark">Double Holiday</p>
                        <p class="text text-dark">Double Holiday RD</p>
                        <p class="head text-dark">Overtime</p>
                        <p class="text text-dark">Regular Day</p>
                        <p class="text text-dark">Special Holiday</p>
                        <p class="text text-dark">WDO</p>
                        <p class="text text-dark">Special Holiday RD</p>
                        <p class="text text-dark">Legal Holiday</p>
                        <p class="text text-dark">Legal Holiday RD</p>
                        <p class="text text-dark">Double Holiday</p>
                        <p class="text text-dark">Double Holiday RD</p>
                        <p class="head text-dark">Night Diff</p>
                        <p class="text text-dark">Regular Day</p>
                        <p class="text text-dark">Special Holiday</p>
                        <p class="text text-dark">WDO</p>
                        <p class="text text-dark">Special Holiday RD</p>
                        <p class="text text-dark">Legal Holiday</p>
                        <p class="text text-dark">Legal Holiday RD</p>
                        <p class="text text-dark">Double Holiday</p>
                        <p class="text text-dark">Double Holiday RD</p>
                        <p class="head text-dark">OT ND</p>
                        <p class="text text-dark">Regular Day</p>
                        <p class="text text-dark">Special Holiday</p>
                        <p class="text text-dark">WDO</p>
                        <p class="text text-dark">Special Holiday RD</p>
                        <p class="text text-dark">Legal Holiday</p>
                        <p class="text text-dark">Legal Holiday RD</p>
                        <p class="text text-dark">Double Holiday</p>
                        <p class="text text-dark">Double Holiday RD</p>
                        <p class="head text-dark">Adjustment</p>
                        <p class="text">Transportation</p>
                        <p class="text">Adjustment</p>
                        <p class="text">SIL</p>
                        <p class="text" style="margin-top: 50px; font-weight: 600;">Gross Pay</p>
                    </div> <!-- col-md-5 ends here -->

                    <div class="col-md-2"> <!-- second col-md-1 start here -->
                        <p class="head text-dark">Old</p>
                        <p class="text text-dark">{{$item->special_rates_special_holiday }}</p>
                        <p class="text text-dark">{{$item->special_rates_wdo }}</p>
                        <p class="text text-dark">{{$item->special_rates_special_holiday_falling_on_rest_day }}</p>
                        <p class="text text-dark">{{$item->special_rates_legal_holiday }}</p>
                        <p class="text text-dark">{{$item->special_rates_legal_holiday_falling_on_rest_day }}</p>
                        <p class="text text-dark">{{$item->special_rates_double_pay }}</p>
                        <p class="text text-dark">{{$item->special_rates_double_pay_falling_on_rest_day }}</p>
                        <!-- <p class="head text-light">Overtime</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->overtime_regular_day }}</p>
                        <p class="text text-dark">{{$item->overtime_special_holiday }}</p>
                        <p class="text text-dark">{{$item->overtime_wdo }}</p>
                        <p class="text text-dark">{{$item->overtime_special_holiday_falling_on_rest_day }}</p>
                        <p class="text text-dark">{{$item->overtime_legal_holiday }}</p>
                        <p class="text text-dark">{{$item->overtime_legal_holiday_falling_on_rest_day }}</p>
                        <p class="text text-dark">{{$item->overtime_double_pay }}</p>
                        <p class="text text-dark">{{$item->overtime_double_pay_falling_on_rest_day }}</p>
                        <!-- <p class="head text-light">Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->night_differential_regular_day }}</p>
                        <p class="text text-dark">{{$item->night_differential_special_holiday }}</p>
                        <p class="text text-dark">{{$item->night_differential_wdo }}</p>
                        <p class="text text-dark">{{$item->night_differential_special_holiday_falling_on_rest_day }}</p>
                        <p class="text text-dark">{{$item->night_differential_legal_holiday }}</p>
                        <p class="text text-dark">{{$item->night_differential_legal_holiday_falling_on_rest_day }}</p>
                        <p class="text text-dark">{{$item->night_differential_double_pay }}</p>
                        <p class="text text-dark">{{$item->night_differential_double_pay_falling_on_rest_day }}</p>
                        <!-- <p class="head text-light">Overtime with Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->overtime_with_night_differential_regular_day }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_special_holiday }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_wdo }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_special_holiday_rest_day }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_legal_holiday }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_legal_holiday_rest_day }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_double_pay }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_double_pay_rest_day }}</p>
                        <!-- <p class="head text-light">Adjustment</p> -->
                        <p class="text" style="margin-top: 30px">{{$item->transportation }}</p>
                        <p class="text text-dark">{{$item->adjustment_plus }}</p>
                        <p class="text text-dark">{{$item->sil_13th_month }}</p>

                        <p class="text" style="margin-top: 50px;"><u>{{$grossPay }}</u></p> <!-- gross pay -->
                    </div> <!-- second col-md-1 ends here -->
                    
                    <div class="col-md-2"> <!-- col-md-3 starts here -->
                        <p class="head text-dark">Rate</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.5 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.6 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2.9 / 8 }}</p>
                        <!-- <p class="head text-light">Overtime</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$rate->rate_per_day * 1.25 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.5 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.6 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2.9 * 1.3 / 8 }}</p>
                        <!-- <p class="head text-light">Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$rate->rate_per_day / 8 * 0.1 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.5 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day / 8 * 0.1 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.6 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2.9 * 0.1 / 8 }}</p>
                        <!-- <p class="head text-light">Overtime with Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$rate->rate_per_day * 1.25 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.5 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 1.6 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->rate_per_day * 2.9 *1.3 * 0.1 / 8 }}</p>
                        <!-- <p class="head text-light">Adjustment</p> -->
                        <p class="text" style="margin-top: 30px">-</p>
                        <p class="text">-</p>
                        <p class="text">-</p>

                        <p class="text" style="margin-top: 140px; font-weight: 700;">Net Pay : </p>
                    </div> <!-- col-md-3 ends here -->

                    <div class="col-md-2"> <!-- third col-md-1 starts here -->
                        <!-- <p class="head text-light">Regular</p> -->
                        <p class="head text-dark">New</p>
                        <p class="text text-dark">{{$item->special_rates_special_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->special_rates_wdo_wri }}</p>
                        <p class="text text-dark">{{$item->special_rates_special_holiday_falling_on_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->special_rates_legal_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->special_rates_legal_holiday_falling_on_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->special_rates_double_pay_wri }}</p>
                        <p class="text text-dark">{{$item->special_rates_double_pay_falling_on_rest_day_wri }}</p>
                        <!-- <p class="head text-light">Overtime</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->overtime_regular_day_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_special_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_wdo_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_special_holiday_falling_on_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_legal_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_legal_holiday_falling_on_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_double_pay_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_double_pay_falling_on_rest_day_wri }}</p>
                        <!-- <p class="head text-light">Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->night_differential_regular_day_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_special_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_wdo_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_special_holiday_falling_on_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_legal_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_legal_holiday_falling_on_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_double_pay_wri }}</p>
                        <p class="text text-dark">{{$item->night_differential_double_pay_falling_on_rest_day_wri }}</p>
                        <!-- <p class="head text-light">Overtime with Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->overtime_with_night_differential_regular_day_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_special_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_wdo_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_special_holiday_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_legal_holiday_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_legal_holiday_rest_day_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_double_pay_wri }}</p>
                        <p class="text text-dark">{{$item->overtime_with_night_differential_double_pay_rest_day_wri }}</p>
                        <!-- <p class="head text-light">Adjustment</p> -->
                        <p class="text" style="margin-top: 30px">-</p>
                        <p class="text">-</p>
                        <p class="text">-</p>
                        <p class="text" style="margin-top: 139px;"><u>{{$netPay}}</u></p>
                    </div> <!-- third col-md-1 ends here -->

                    <div class="col-md-2"> <!-- col-md-3 starts here -->
                        <p class="head text-dark">Rate</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.5 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.6 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2.9 / 8 }}</p>
                        <!-- <p class="head text-light">Overtime</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$rate->new_rate_per_day * 1.25 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.5 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.6 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2 * 1.3 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2.9 * 1.3 / 8 }}</p>
                        <!-- <p class="head text-light">Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$rate->new_rate_per_day / 8 * 0.1 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.5 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day / 8 * 0.1 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.6 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2.9 * 0.1 / 8 }}</p>
                        <!-- <p class="head text-light">Overtime with Night Differential</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$rate->new_rate_per_day  * 1.25 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.5 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 1.6 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2 * 1.3 * 0.1 / 8 }}</p>
                        <p class="text text-dark">{{$rate->new_rate_per_day * 2.9 * 1.3 * 0.1 / 8 }}</p>
                        <!-- <p class="head text-light">Adjustment</p> -->
                        <p class="text" style="margin-top: 30px">-</p>
                        <p class="text">-</p>
                        <p class="text">-</p>
                    </div> <!-- col-md-3 ends here -->
                </div> <!-- first row inside whole row ends here -->
            </div> <!-- first column ends here -->

            <!-- second row col starts here -->
            <div class="col-md-5" style="margin-top: 6px;"> <!-- second row col-md-6 starts here -->
                <div class="row"> <!-- second row starts here -->
                    <div class="col-md-4"> <!-- second row col-md-3-->
                        <p class="head text-dark">Deductions</p>
                        <p class="text text-dark">SSS Prem</p>
                        <p class="text text-dark">Phil Health</p>
                        <p class="text text-dark">Pag-ibig</p>
                        <p class="text text-dark">Late/U.Time</p>
                        <p class="text text-dark">Pag-ibig Loan</p>
                        <p class="text text-dark">SSS Loan</p>
                        <p class="text text-dark">Over Salary</p>
                        <p class="text text-dark">MGA Meal</p>

                        <p class="text" style="margin-top: 1055px; font-weight: 600;">Total Deb.</p>
                    </div>

                    <div class="col-md-2">
                        <!-- <p class="head text-light">Regular</p> -->
                        <p class="text text-dark" style="margin-top: 30px">:</p>
                        <p class="text text-dark">:</p>
                        <p class="text text-dark">:</p>
                        <p class="text text-dark">:</p>
                        <p class="text text-dark">:</p>
                        <p class="text text-dark">:</p>
                        <p class="text text-dark">:</p>
                        <p class="text text-dark">:</p>

                        <p class="text text-dark" style="margin-top: 1055px">:</p>
                    </div>

                    <div class="col-md-4" style="margin: 0;">
                        <!-- <p class="head text-light">Regular</p> -->
                        <p class="text text-dark" style="margin-top: 30px">{{$item->goverment_dues_sss }}</p>
                        <p class="text text-dark">{{$item->goverment_dues_phic }}</p>
                        <p class="text text-dark">{{$item->goverment_dues_hdmf }}</p>
                        <p class="text text-dark">{{$lateU }}</p>
                        <p class="text text-dark">{{$item->pagibig_loan }}</p>
                        <p class="text text-dark">{{$item->sss_loan }}</p>
                        <p class="text text-dark">{{$item->adjustment_minus }}</p>
                        <p class="text text-dark">{{$item->mga_meal }}</p>

                        <p class="text text-dark" style="margin-top: 1055px"><u>{{$sum }}</u></p>
                        <!-- sum -->
                    </div>
                </div>
            </div>
        </div> <!-- firsts row ends here -->

        <div class="footer mt-5">
            <p style="margin-left: 20px;"><span style="font-weight: 600;">RECIEVED</span> the above amount from 
            <span style="font-weight: 600;">BMPOWER HUMAN RESOURCES CORP.</span>
            </br>as full compensation for my services as of pay period stated.
            </p>

        <div class="row mt-5">
            <div class="col-md-6">
                <p class="signature-line-one" style="margin-left: 20px;">Signature of Employee / Date</p>
            </div>
            <div class="col-md-6 text-md-right" >
                <p class="signature-line mr-3">Prepared by: Sir Ricc</p>
            </div>
        </div>        
    </div>
    
    </div> <!-- container -->
    <div class="page-break"></div>
    @endforeach
    @endforeach



</body>
</html>