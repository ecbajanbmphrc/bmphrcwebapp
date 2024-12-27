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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body>

    <style>
        /* new table starts here */
    .table-one{
        width: 100%;
        /* text-align: center; */
    }
    .table-two{
        width: 100%;
        /* max-width: 1000px; */
        /* display: block;
        margin-left: auto;
        margin-right: auto; */
        /* justify-content: center; */
        /* text-align: center; wrong */ 
    }

    .table-two th, .table-two td{
        padding: 2px; /* Adjust padding as needed */
        font-size: 14px;
        word-wrap: break-word; /* Prevent long text from forcing table expansion */
    }

    .table-twoo{
        width: 100%;
        max-width: 1000px;
        align-items: center;
        /* display: block;
        margin-left: auto;
        margin-right: auto; */
        /* justify-content: center; */
        /* text-align: center;  */
    }
    
    .a{
        width: 15%;
        max-width: 1000px;
    }
    .b{
        width: 25%;
        max-width: 1000px;
    }
    .c{
        width: 15%;
        max-width: 1000px;
    }
    .d{
        width: 25%;
        max-width: 1000px;  
    }

    /* new table ends here */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }

    .container-lg {
        border: 2px solid #000; /* Striking border for definition */
        display: block;
        margin-left: auto; /* Automatically adjusts margin for centering */
        margin-right: auto; /* Automatically adjusts margin for centering */
        width: 100%; /* Utilizes full available width */
        max-width: 1000px; /* Optional but stylish max-width */
        padding: 5px; /* Adds a cozy inner spacing */
        box-sizing: border-box; /* Ensures padding and border are included in width */
    }

    .address{ 
        text-align: center;
        margin-top: -9px;
        font-weight: 500;
        font-size: 16px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }

    .table th, .table td {
        border: 2px solid #000;
        /* padding: 5px; */
        font-size: 12px;
        padding: 5px;

    }

    .fixed-column {
        width: 60%;
    }

    .amount-column {
        width: 20%;
    }
    .amount-columnn{
        width: 15%;
    }

    .footer {
        text-align: left;
        font-size: 16px;
        margin-top: 10px;
    }

    /* / */

    .row {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        flex-wrap: nowrap; /* Prevent content from wrapping to a new line */
    }

    * {
    box-sizing: border-box;
    }

    .footer .dd {
        position: relative;
        display: inline-block;
        padding-top: 0; 
        float: right;
        margin-right: 20px;
        font-size: 16px;
    }

    .footer .signature-line-one {
        position: relative;
        display: inline-block;
        padding-top: 0; 
        margin-left: 50px;
        font-size: 12px;
        margin-top: 10px;
    }

    .signature-line-one::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 230px;
        border-top: 2px solid black;
    }

    .footer .signature-line {
        position: relative;
        display: inline-block;
        padding-top: 0; 
        margin-left: 20px;
        font-size: 12px;
        margin-top: 10px;
    }

    .signature-line::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        border-top: 2px solid black;
    }


    @media print {
        @page {
            size: A4 portrait;
            margin: 5mm;
        }
        body {
            margin: 0;
        }
        table {
        width: 100%;
        border-collapse: collapse; /* Make sure this stays to prevent spacing issues */
        /* margin-top: 5px; Add margin above each table */
        }
        /* Alternatively, you can also apply padding if margin is still not working */
        /* table tbody tr:first-child {
            padding-top: 3px;
        }
        footer{
            margin-top: 5px;
        } */
        
    }

    </style>


    <!-- container starts here -->
    <div class="container-lg">
        @foreach ($transaction_lists as $item)
        <table class="table-one" style="text-align: center;">
            <tr>
                <th><h3 style="font-size: 20px; margin-top: 2px;"><strong>Payslip</strong></h3>
                <h4 style="font-size: 16px; margin-top: -7px;"><strong>BMPower Human Resources Inc.</strong></h4>
                <p class="address" style="font-size: 16px;">#7 Sheridan St., Brgy. Highway Hills, Mandaluyong City 1550</p></th>
            </tr>
        </table>
        <table class="table-two">
            <tr>
                <th class="a">Name</th>
                <th class="b" style="font-weight: 600;">: {{$item->employee_name}}</th>
                <th class="c">Region</th>
                <th class="d" style="font-weight: 600;">: {{$item->region}}</th>
            </tr>
            <tr>
                <th class="a">Period</th>
                <th class="b">: {{$item->period}}</th>
                <th class="c">Rate Applied</th>
                <th class="d" style="font-weight: 600;">: {{$item->old_rate}} ^ {{$item->new_rate}}</th>
            </tr>
            <tr>
                <th class="a">Worked Days</th>
                <th class="b" style="font-weight: 600;">: {{$dayss}}</th>
                <th class="c">Coordinator</th>
                <th class="d"style="font-weight: 600;">: {{$item->coordinator}}</th>
            </tr>
        </table>
        <!-- Earnings Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="fixed-column text-light bg-secondary">EARNINGS</td>
                    <td class="amount-column text-light bg-secondary" style="text-align: center;">TOTAL HOURS</td>
                    <td class="amount-column text-light bg-secondary" style="text-align: center;">AMOUNT</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DAYS</td>
                    <td class="amount-column" style="text-align: right;">{{$item->actual_days_rendered}} / {{$item->actual_days_rendered_wri}}</td>
                    <td class="amount-column" style="text-align: right;">{{$Amount}}</td>
                </tr>
                <tr>
                    <td>SPECIAL</td>
                    <td class="amount-column" style="text-align: right;">{{$specialTotalHours}}</td>
                    <td class="amount-column" style="text-align: right;">{{$item->payslip_special}}</td>
                </tr>
                <tr>
                    <td>OVER TIME</td>
                    <td class="amount-column" style="text-align: right;">{{$totalOvertime}}</td>
                    <td class="amount-column" style="text-align: right;">{{$item->payslip_ot}}</td>
                </tr>
                <!-- Continue other earnings rows -->
                <tr>
                    <td>NIGHT DIFFERENTIAL</td>
                    <td class="amount-columnnn" style="text-align: right;">{{$totalNightDifferential}}</td>
                    <td class="amount-column" style="text-align: right;">{{$item->payslip_nd}}</td>
                </tr>
                <tr>
                    <td>OVER TIME NIGHT DIFFERENTIAL</td>
                    <td class="amount-columnnn" style="text-align: right;">{{$totalOTwithNightDiff}}</td>
                    <td class="amount-column" style="text-align: right;">{{$item->payslip_otnd}}</td>
                </tr>
                <tr>
                    <td>13TH MONTH / SIL</td>
                    <td class="amount-columnnn" style="text-align: center;">-</td>
                    <td class="amount-column" style="text-align: right;">{{$Month}}</td>
                </tr>
                <tr>
                    <td>SALARY ADJUSTMENT ( + )</td>
                    <td class="amount-columnnn" style="text-align: center;">-</td>
                    <td class="amount-column" style="text-align: right;">{{$item->adjustment_plus }}</td>
                </tr>
                <tr> 
                    <td>OTHER EARNINGS</td>
                    <td class="amount-columnnn" style="text-align: center;">-</td>
                    <td class="amount-column" style="text-align: right;">{{$otherTotals}}</td>
                </tr>

                <tr>
                    <td style="font-weight: 700;">TOTAL EARNINGS</td>
                    <td style="text-align: center;">-</td>
                    <td class="amount-column" style="font-weight: 700; text-align: right;">{{$totalEarnings}}</td>
                </tr>
            </tbody>
        </table>

        <!-- Deductions Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="fixed-column text-light bg-secondary">DEDUCTIONS</td>
                    <td class="amount-columnn text-light bg-secondary">AMOUNT</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>SSS</td>
                    <td class="amount-columnn" style="text-align: right;">{{$item->goverment_dues_sss}}</td>
                </tr>
                <tr>
                    <td>PHIL.</td>
                    <td class="amount-columnn" style="text-align: right;">{{$item->goverment_dues_phic}}</td>
                </tr>
                <!-- Continue other deductions rows -->
                <tr>
                    <td>HDMF</td>
                    <td class="amount-columnn" style="text-align: right;">{{$item->goverment_dues_hdmf}}</td>
                </tr>
                <tr>
                    <td>LATE / UNDERTIME</td>
                    <td class="amount-columnn" style="text-align: right;">{{$totalLate}}</td>
                </tr>
                <tr>
                    <td>PAG-IBIG LOAN</td>
                    <td class="amount-columnn" style="text-align: right;">{{$item->pagibig_loan}}</td>
                </tr>
                <tr>
                    <td>SSS LOAN</td>
                    <td class="amount-columnn" style="text-align: right;">{{$item->sss_loan}}</td>
                </tr>
                <tr>
                    <td>OTHER DEDUCTIONS</td>
                    <td class="amount-columnn" style="text-align: right;">{{$item->deduction_other}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 700;">TOTAL DEDUCTION</td>
                    <td class="amount-columnn" style="font-weight: 700; text-align: right;">{{$item->deduction_total}}</td>
                </tr>
                <tr>
                    <td style="font-weight: 700;">NET PAY</td>
                    <td class="amount-columnn" style="font-weight: 700; text-align: right;">{{$item->new_net_pay}}</td>
                </tr>
            </tbody>
        </table>

        <!-- Footer and Signatures -->
        <div class="footer">
            <p>
                <span style="font-weight: 600;">RECEIVED</span> the above amount from 
                <span style="font-weight: 600;">BMPOWER HUMAN RESOURCES CORP.</span><br>
                as full compensation for my services for the pay period stated.
            </p>

            <table class="table-two">
                <tr>
                    <th class="signature-line-one">Employer Signature / Date</th>
                    <th class="b"></th>
                    <th class="c"></th>
                    <th class="signature-line">Payroll Officer</th>
                </tr>
            </table>
        </div>
        
        @endforeach
    </div>

    <!-- container ends here -->
</body>
</html>