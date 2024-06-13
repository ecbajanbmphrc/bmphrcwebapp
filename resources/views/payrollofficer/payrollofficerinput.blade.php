<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- for toggle -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="/asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/user/css2/payrolloff.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- end: CSS -->
    <title>BMPHRC</title>

    <style>

    table {
        border-collapse: collapse;
        border-radius: 6px;
        width: 100%;
    }
    th, td {
        border: .1rem solid #000;
        padding: 8px;
        text-align: left;
    }

        .arrow-button{
    cursor: pointer;
        }
        .button-image2{
    cursor: pointer;
        }
        .button-image3{
    cursor: pointer;
        } 
        .input_table{
            border: none; 
        outline: none;  
    }    


    /* for toggle */
    .card{
        border: none;
    }

    .btn-with-border {
        /* border: 1px solid #ced4da; 
        border-radius: 0.25rem; 
        padding: 0.375rem 0.75rem;  */
        text-decoration: none !important; 
        color: #fff !important; 
        }

    .btn-text {
        margin-bottom: 0; /* Remove default margin for h6 element */
        }
    /* .btn-btn-secondary{
        border:none;
        shadow: 0;
    } */




    </style>

</head>

<body>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-light fs-4">Payroll Officer</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item ">
                <a href="{{ route('payrollofficer.view.dashboard') }}">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Dashboard
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu p-3 m-0 mb-0">
        <li class="sidebar-menu-item ">
                <a href="{{ route('payrollofficer.view.payrollofficerlist') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Payroll
                </a>
            </li>
            <li class="sidebar-menu-item mt-2">
                <a href="{{ route('payrollofficer.view.payrolltransferlist') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Transfer Payroll
                </a>
            </li>
            <li class="sidebar-menu-item mt-2 active">
                <a href="{{ route('payrollofficer.view.payrollofficerinput') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Payroll Input
                </a>
            <li class="sidebar-menu-item mt-auto">
                <a href="{{ route('logout') }}" style="margin-top: 220px;">
                    <i class="ri-logout-box-line sidebar-menu-item-icon"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Payroll Transaction</h5>
                <div class="dropdown me-3 d-none d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"></i>
                    </div>
                    <div class="dropdown-menu fx-dropdown-menu">
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">{{ session('user')['first_name']}}</span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->


            <!-- New Code For table Starts here -->

            <div style="height:2vh;"> </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">BMPOWER HUMAN RESOURCES CORP</h3>
                                <h5>For the covered period of Month/Days/Year</h5>
                                <h5 class="mb-3">PUREGOLD ACCOUNT<hr class="w-100 mb-3"></h5>
                            </div>
                        </div>
                        <!-- Add this HTML for your button -->
                        <button type="button" class="btn btn-success mb-3" id="generateReportBtn"><i class="bi bi-printer mr-3"></i> Generate Report</button>
                        <div class="table-responsive">
                            <table id="inputtable" class="table " style="width:100%">
                                <thead>
                                    <tr>                            
                                        <th>Full Name</th>                                    
                                        <th>Account</th>
                                        <th>Coordinator</th>                                
                                        <th>Handled Store</th>
                                        <th>Region</th>
                                        <th>Rate Per Day</th>
                                        <th style="display: none;">New Rate</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            <tbody>     
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <!-- payroll modal code starts here -->
                
            <div class="modal fade" id="payrollModal" name="viewpayrollModal" tabindex="-1" role="dialog" aria-labelledby="viewpayrollModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document" style="max-width: 1300px; margin: 1.75rem auto;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"  id=viewpayrollModalTitle>Payroll</h5>
                        </div>
                        <div class="modal-body">

                        <!-- Form action for saving data -->
                        <form action="{{route ('payrollofficer.payrollinput-list.save') }}" method="POST">
                            @csrf
                            @if (session('update-failed'))
                            <divs tyle="background-color:rgba(255,255,255,0)" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Actual Days Rendered:</label>
                                    <input type="number" class="form-control" name="p_actual_rendered_day" id="p_actual_rendered_day" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Actual Days Rendered (WRI):</label>
                                    <input type="number" class="form-control" name="p_actual_rendered_day_wri" id="p_actual_rendered_day_wri" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Total Hours</label>
                                    <input type="number" class="form-control" name="p_total_hours" id="p_total_hours" value="" readonly>                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Total Hours (WRI)</label>
                                    <input type="number" class="form-control" name="p_total_hours_wri" id="p_total_hours_wri" value="" readonly>                                    
                                </div>                               
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">SIL</label>
                                    <input type="number" class="form-control" name="p_sil" id="p_sil" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">13th Month</label>
                                    <input type="number" class="form-control" name="p_month" id="p_month" value="">
                                </div> 
                            </div>


                            <!-- Regular ends here -->
                            <hr class="w-100 mt-3 mb-3">
                            <div class="card mt-3">
                            <button class="btn btn-with-border mb-2" style="background: #3C5B6F;" type="button" data-toggle="collapse" data-target="#collapseZERO" aria-expanded="false" aria-controls="collapseZERO">
                                <h5>Regular</h5>
                            </button>
                            <div id="collapseZERO" class="collapse" aria-labelledby="headingZERO">
                            <!-- Special Rates Starts Here -->
                            <div class="card mt-3">
                                <div class="btn btn-with-border" style="background: #6B8A7A; mb-2">
                                    <h5>Special Rates</h5>
                                </div>
                                <!-- <div id="collapseOne" class="collapse" aria-labelledby="headingOne"> -->
                                    <div class="row mt-3">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Special Holiday:</label>
                                            <input type="number" class="form-control" name="p_special_rates_special_holiday" id="p_special_rates_special_holiday" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">WDO:</label>
                                            <input type="number" class="form-control" name="p_special_rates_wdo" id="p_special_rates_wdo" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Special Holiday Falling on Rest Day</label>
                                            <input type="number" class="form-control" name="p_special_rates_special_holiday_falling_on_rest_day" id="p_special_rates_special_holiday_falling_on_rest_day" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Legal Holiday</label>
                                            <input type="number" class="form-control" name="p_special_rates_legal_holiday" id="p_special_rates_legal_holiday" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                            <input type="number" class="form-control" name="p_special_rates_legal_holiday_falling_on_rest_day" id="p_special_rates_legal_holiday_falling_on_rest_day" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Double Pay:</label>
                                            <input type="number" class="form-control" name="p_special_rates_double_pay" id="p_special_rates_double_pay" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Double Pay Falling on Rest Day</label>
                                            <input type="number" class="form-control" name="p_special_rates_double_pay_falling_on_rest_day" id="p_special_rates_double_pay_falling_on_rest_day" value="">
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- Special Rates Ends Here -->

                            <!-- Overtime Forms Starts Here -->
                            <div class="card mt-3">
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h5>Overtime</h5>
                                </div>
                            <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"> -->
                                <div class="row mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Regular Day:</label>
                                        <input type="number" class="form-control" name="p_overtime_regular_day" id="p_overtime_regular_day" value="" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday:</label>
                                        <input type="number" class="form-control" name="p_overtime_special_holiday" id="p_overtime_special_holiday" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">WDO:</label>
                                        <input type="number" class="form-control" name="p_overtime_wdo" id="p_overtime_wdo" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_overtime_special_holiday_falling_on_rest_day" id="p_overtime_special_holiday_falling_on_rest_day" value="">
                                    </div>                           
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday</label>
                                        <input type="number" class="form-control" name="p_overtime_legal_holiday" id="p_overtime_legal_holiday" value="" >
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                        <input type="number" class="form-control" name="p_overtime_legal_holiday_falling_on_rest_day" id="p_overtime_legal_holiday_falling_on_rest_day" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay:</label>
                                        <input type="number" class="form-control" name="p_overtime_double_pay" id="p_overtime_double_pay" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_overtime_double_pay_falling_on_rest_day" id="p_overtime_double_pay_falling_on_rest_day" value="" >
                                    </div>                          
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- Overtime Forms Ends Here -->
                            
                            <!-- Night Differential Forms Starts Here -->
                            <div class="card mt-3">
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h5>Night Differential</h5>
                                </div>
                            <!-- <div id="collapseThree" class="collapse" aria-labelledby="headingThree"> -->
                                <div class="row mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Regular Day:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_regular_day" id="p_night_differenatial_regular_day" value="" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_special_holiday" id="p_night_differenatial_special_holiday" value="" y>
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">WDO:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_wdo" id="p_night_differenatial_wdo" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_special_holiday_falling_on_rest_day" id="p_night_differenatial_special_holiday_falling_on_rest_day" value="" >
                                    </div>                           
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_legal_holiday" id="p_night_differenatial_legal_holiday" value="" >
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_legal_holiday_falling_on_rest_day" id="p_night_differenatial_legal_holiday_falling_on_rest_day" value="" y >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_double_pay" id="p_night_differenatial_double_pay" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_double_pay_falling_on_rest_day" id="p_night_differenatial_double_pay_falling_on_rest_day" value="" >
                                    </div>                          
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- Night Differential Forms Ends Here -->

                            <!-- Overtime with Night Differential Form Starts Here -->
                            <div class="card mt-3">
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h5>Overtime With Night Differential</h5>
                                </div>
                            <!-- <div id="collapseFour" class="collapse" aria-labelledby="headingFour"> -->
                            <div class="row mt-3">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Regular Day:</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_regular_day" id="p_overtime_with_night_differential_regular_day" value="" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Special Holiday:</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_special_holiday" id="p_overtime_with_night_differential_special_holiday" value="" >
                                </div>                            
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">WDO:</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_wdo" id="p_overtime_with_night_differential_wdo" value="" >
                                </div>                            
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Special Holiday Falling on Rest Day</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_special_holiday_falling_on_rest_day" id="p_overtime_with_night_differential_special_holiday_falling_on_rest_day" value="" >
                                </div>                           
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Legal Holiday</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_legal_holiday" id="p_overtime_with_night_differential_legal_holiday" value="" >
                                </div> 
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_legal_holiday_falling_on_rest_day" id="p_overtime_with_night_differential_legal_holiday_falling_on_rest_day" value="" >
                                </div>                            
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Double Pay:</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_double_pay" id="p_overtime_with_night_differential_double_pay" value="" >
                                </div>                            
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Double Pay Falling on Rest Day</label>
                                    <input type="number" class="form-control" name="p_overtime_with_night_differential_double_pay_falling_on_rest_day" id="p_overtime_with_night_differential_double_pay_falling_on_rest_day" value="">
                                </div>                          
                            </div>
                            </div>
                            <!-- </div> -->


                            </div>
                            </div>
                            <!-- Regular ends here -->


                            <!-- with rate increase starts here -->
                            <hr class="w-100 mt-2 mb-3">
                            <div class="card mt-3">
                            <button class="btn btn-with-border mb-2" style="background: #3C5B6F;" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                                <h5>With Rate Increase</h5>
                            </button>
                            <div id="collapseZero" class="collapse" aria-labelledby="headingZero">
                                
                            <!-- special rate starts here -->
                            <div class="card mt-3">
                            <!-- <hr class="w-100 mt-3 mb-1"> -->
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h6>WRI Special Rates</h6>
                                </div>
                                <!-- <div id="collapseONE" class="collapse" aria-labelledby="headingONE"> -->
                                    <div class="row mt-3">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Special Holiday:</label>
                                            <input type="number" class="form-control" name="p_special_rates_special_holiday_wri" id="p_special_rates_special_holiday_wri" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">WDO:</label>
                                            <input type="number" class="form-control" name="p_special_rates_wdo_wri" id="p_special_rates_wdo_wri" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Special Holiday Falling on Rest Day</label>
                                            <input type="number" class="form-control" name="p_special_rates_special_holiday_falling_on_rest_day_wri" id="p_special_rates_special_holiday_falling_on_rest_day_wri" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Legal Holiday</label>
                                            <input type="number" class="form-control" name="p_special_rates_legal_holiday_wri" id="p_special_rates_legal_holiday_wri" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                            <input type="number" class="form-control" name="p_special_rates_legal_holiday_falling_on_rest_day_wri" id="p_special_rates_legal_holiday_falling_on_rest_day_wri" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Double Pay:</label>
                                            <input type="number" class="form-control" name="p_special_rates_double_pay_wri" id="p_special_rates_double_pay_wri" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Double Pay Falling on Rest Day</label>
                                            <input type="number" class="form-control" name="p_special_rates_double_pay_falling_on_rest_day_wri" id="p_special_rates_double_pay_falling_on_rest_day_wri" value="">
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- special rates ends here -->

                            <!-- Overtime Forms Starts Here -->
                            <div class="card mt-3">
                            <!-- <hr class="w-100 mt-3 mb-1"> -->
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h6>WRI Overtime</h6>
                                </div>
                            <!-- <div id="collapseTWO" class="collapse" aria-labelledby="headingTWO"> -->
                                <div class="row mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Regular Day:</label>
                                        <input type="number" class="form-control" name="p_overtime_regular_day_wri" id="p_overtime_regular_day_wri" value="" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday:</label>
                                        <input type="number" class="form-control" name="p_overtime_special_holiday_wri" id="p_overtime_special_holiday_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">WDO:</label>
                                        <input type="number" class="form-control" name="p_overtime_wdo_wri" id="p_overtime_wdo_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_overtime_special_holiday_falling_on_rest_day_wri" id="p_overtime_special_holiday_falling_on_rest_day_wri" value="">
                                    </div>                           
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday</label>
                                        <input type="number" class="form-control" name="p_overtime_legal_holiday_wri" id="p_overtime_legal_holiday_wri" value="" >
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                        <input type="number" class="form-control" name="p_overtime_legal_holiday_falling_on_rest_day_wri" id="p_overtime_legal_holiday_falling_on_rest_day_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay:</label>
                                        <input type="number" class="form-control" name="p_overtime_double_pay_wri" id="p_overtime_double_pay_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_overtime_double_pay_falling_on_rest_day_wri" id="p_overtime_double_pay_falling_on_rest_day_wri" value="" >
                                    </div>                          
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- Overtime Forms Ends Here -->
                            
                            <!-- Night Differential Forms Starts Here -->
                            <div class="card mt-3">
                            <!-- <hr class="w-100 mt-3 mb-1"> -->
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h6>WRI Night Differential</h6>
                                </div>
                            <!-- <div id="collapseTHREE" class="collapse" aria-labelledby="headingTHREE"> -->
                                <div class="row mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Regular Day:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_regular_day_wri" id="p_night_differenatial_regular_day_wri" value="" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_special_holiday_wri" id="p_night_differenatial_special_holiday_wri" value="" y>
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">WDO:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_wdo_wri" id="p_night_differenatial_wdo_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_special_holiday_falling_on_rest_day_wri" id="p_night_differenatial_special_holiday_falling_on_rest_day_wri" value="" >
                                    </div>                           
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_legal_holiday_wri" id="p_night_differenatial_legal_holiday_wri" value="" >
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_legal_holiday_falling_on_rest_day_wri" id="p_night_differenatial_legal_holiday_falling_on_rest_day_wri" value="" y >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay:</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_double_pay_wri" id="p_night_differenatial_double_pay_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_night_differenatial_double_pay_falling_on_rest_day_wri" id="p_night_differenatial_double_pay_falling_on_rest_day_wri" value="" >
                                    </div>                          
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- Night Differential Forms Ends Here -->

                            <!-- Overtime with Night Differential Form Starts Here -->
                            <div class="card mt-3">
                            <!-- <hr class="w-100 mt-3 mb-1"> -->
                                <div class="btn btn-with-border" style="background: #6B8A7A;">
                                    <h5>WRI Overtime With Night Differential</h5>
                                </div>
                            <!-- <div id="collapseFOUR" class="collapse" aria-labelledby="headingFOUR"> -->
                                <div class="row mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Regular Day:</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_regular_day_wri" id="p_overtime_with_night_differential_regular_day_wri" value="" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday:</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_special_holiday_wri" id="p_overtime_with_night_differential_special_holiday_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">WDO:</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_wdo_wri" id="p_overtime_with_night_differential_wdo_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Special Holiday Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_special_holiday_falling_on_rest_day_wri" id="p_overtime_with_night_differential_special_holiday_falling_on_rest_day_wri" value="" >
                                    </div>                           
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_legal_holiday_wri" id="p_overtime_with_night_differential_legal_holiday_wri" value="" >
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Legal Holiday Falling on Rest Day:</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_legal_holiday_falling_on_rest_day_wri" id="p_overtime_with_night_differential_legal_holiday_falling_on_rest_day_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay:</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_double_pay_wri" id="p_overtime_with_night_differential_double_pay_wri" value="" >
                                    </div>                            
                                    <div class="form-group col-md-3">
                                        <label for="" class="col-form-label">Double Pay Falling on Rest Day</label>
                                        <input type="number" class="form-control" name="p_overtime_with_night_differential_double_pay_falling_on_rest_day_wri" id="p_overtime_with_night_differential_double_pay_falling_on_rest_day_wri" value="">
                                    </div>                          
                                </div>
                            </div>
                            <!-- </div> -->

                            </div>
                            </div>
                            <!-- with rate increase ends here -->

                            <!-- Adjustment (+) -->
                            <hr class="w-100 mt-3 mb-1">
                            <h6 class="mt-3">Adjustment (+)</h6>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Adjustment (+):</label>
                                    <input type="number" class="form-control" name="p_adjustment_adjustment_plus" id="p_adjustment_adjustment_plus" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Transportation:</label>
                                    <input type="number" class="form-control" name="p_adjustment_transportation" id="p_adjustment_transportation" value="">
                                </div>
                            </div>

                            <!-- Goverment Dues -->
                            <hr class="w-100 mt-3 mb-1">
                            <h6 class="mt-3">Goverment Dues </h6>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Select Date</label>
                                    <input type="Date" class="form-control" name="p_datepicker" id="p_datepicker" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">SSS</label>
                                    <input type="number" class="form-control" name="p_goverment_dues_sss" id="p_goverment_dues_sss" value="" readonly> 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">PHIC</label>
                                    <input type="number" class="form-control" name="p_goverment_dues_phic" id="p_goverment_dues_phic" value="" readonly> 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">HDMF</label>
                                    <input type="number" class="form-control" name="p_goverment_dues_hdmf" id="p_goverment_dues_hdmf" value="" readonly> 
                                </div>
                            </div>

                            <!-- decutions  -->
                            <hr class="w-100 mt-3 mb-1">
                            <h6 class="mt-3">New Deduction</h6>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Late:</label>
                                    <input type="number" class="form-control" name="p_new_deduction_late" id="p_new_deduction_late" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Late (WRI):</label>
                                    <input type="number" class="form-control" name="p_new_deduction_late_wri" id="p_new_deduction_late_wri" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Late Deduction:</label>
                                    <input type="number" class="form-control" name="p_new_deduction_late_deduction" id="p_new_deduction_late_deduction" value="" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Late Deduction (WRI):</label>
                                    <input type="number" class="form-control" name="p_new_deduction_late_deduction_wri" id="p_new_deduction_late_deduction_wri" value="" readonly>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">SSS Loan:</label>
                                    <input type="number" class="form-control" name="p_new_deduction_sss_loan" id="p_new_deduction_sss_loan" value="">
                                </div>    
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">PAG-IBIG Loan:</label>
                                    <input type="number" class="form-control" name="p_new_deduction_pagibig_loan" id="p_new_deduction_pagibig_loan" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">MGA Meal:</label>
                                    <input type="number" class="form-control" name="p_new_deduction_meal_deduction" id="p_new_deduction_meal_deduction" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Adjustment (-):</label>
                                    <input type="number" class="form-control" name="new_deduction_adjusment_minus" id="new_deduction_adjusment_minus" value="">
                                </div> 
                            </div>

                            <hr class="w-100 mt-3 mb-1">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Remarks</label>
                                    <select type="text" class="form-select" name="p_remarks_remarks" id="p_remarks_remarks" value="">
                                    <option value="">---Choose Remarks---</option>
                                        <option  value="Regular" @if(old('remarks_remarks') == "Regular") {{'selected'}} @endif>Regular</option>
                                        <option  value="Probationary" @if(old('remarks_remarks') == "Probationary") {{'selected'}} @endif>Probationary</option>
                                        <option  value="New Diser" @if(old('remarks_remarks') == "New Diser") {{'selected'}} @endif>New Diser</option>
                                        <option  value="Reliever" @if(old('remarks_remarks') == "Reliever") {{'selected'}} @endif>Reliever</option>
                                    </select>
                                </div> 
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Mode of Payment:</label>
                                    <select type="text" class="form-select" name="p_mode_of_payment_mode_of_payment" id="p_mode_of_payment_mode_of_payment" value="">
                                    <option value="">---Choose Mode of Payment---</option>
                                        <option  value="East West" @if(old('mode_of_payment_mode_of_payment') == "East West") {{'selected'}} @endif>East West</option>
                                        <option  value="RCBC" @if(old('mode_of_payment_mode_of_payment') == "RCBC") {{'selected'}} @endif>RCBC</option>
                                        <option  value="Cebuana Lhuillier" @if(old('mode_of_payment_mode_of_payment') == "CLH") {{'selected'}} @endif>Cebuana Lhuillier</option>
                                        <option  value="Gcash" @if(old('mode_of_payment_mode_of_payment') == "Gcash") {{'selected'}} @endif>Gcash</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Transaction Fee:</label>
                                    <input type="text" class="form-control" name="p_transaction_fee" id="p_transaction_fee" value="" readonly>
                                </div>                                                                                
                            </div>

                            <hr class="w-100 mt-3 mb-1">
                            <h6 class="mt-3">Total Pay</h6>
                            <div class="row">    
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Net Pay:</label>
                                    <input type="text" class="form-control" name="p_total_pay_net_pay" id="p_total_pay_net_pay" value="" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">Diser's Net Pay:</label>
                                    <input type="text" class="form-control" name="p_total_pay_total_pay" id="p_total_pay_total_pay" value="" readonly>
                                </div>
                            </div>
                            

                            <!-- Overtime with Night Differential Forms Ends Here -->
                            <input type="hidden" id="merchandiser_fullname" name="merchandiser_fullname"/>
                            <input type="hidden" id="account" name="account"/>
                            <input type="hidden" id="hc" name="hc"/>
                            <input type="hidden" id="coordinator_fullname" name="coordinator_fullname"/>
                            <input type="hidden" id="store_name" name="store_name"/>
                            <input type="hidden" id="region" name="region"/>
                            <!-- <input type ="hidden" id="ratings" name="ratings"/> -->

                            <div class="modal-footer mt-3">
                                <button type="submit" class="btn btn-primary" id="save">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="payrollclose">Close</button>
                            </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
                
             <!-- payroll modal code ends here -->



            <!-- New Code for table Ends here -->
            </div>
       
            <!-- end: Content -->
        </div>

    

    </main>
    <!-- end: Main -->
   
    
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
        <!-- start: JS -->
        <script src="/asset/user/js/bootstrap.bundle.min.js"></script>

    <script src="/asset/user/js/jquery.min.js"></script>

    <script src="/asset/user/js/script.js"></script>

    <!-- new library added -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- for toggle -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

    @include('sweetalert::alert')

    <script>
        $(document).ready(function(){
            var dataTable = $('#inputtable').DataTable({
                ajax: {
                    url: '/payrollofficer/payrollofficerinput/list/fetch-data',
                    dataSrc: 'dataone'
                },
                columns: [               
                    { data: 'merchandiser_fullname' },
                    { data: 'account'},
                    { data: 'coordinator_fullname'},
                    { data: 'store_name'},
                    { data: 'region'},
                    { data: 'ratings' },
                    { data: 'newratings', visible: false},
                    { data: 'actions', orderable: false}               
                ]
            });

        
        // modal form button starts here
        
        //**  DECLARED VARIABLES STARTS HERE **//
        // first row variables
        var Ratings = 0;

        var newRatings = 0;
        // var actualDaysWri =  $('#p_actual_rendered_day_wri').val();
        // sil
        var siLHour = 0;
        var siL = 0;
        // 13th month
        var monthHour = 0;
        var month = 0;

        var actualDays = 0;
        var actualDaysWri = 0;

        var selectPayment = "";
        
        // totals pays
        var totalDaysRate = 0;
        var disersPay = 0;
        // special rate
        var specialRatesSpecialHolidayHour = 0;
        var specialRatesSpecialHoliday = 0;
        // wdo
        var specialRatesWdoHour = 0;
        var specialRatesWdo = 0;
        // special holidayfalling on rest day
        var specialRatesSpecialHolidayFallingOnRestDayHour = 0;
        var specialRatesSpecialHolidayFallingOnRestDay = 0;
        // legal holiday
        var specialRatesLegalHolidayHour = 0;
        var specialRatesLegalHoliday = 0;
        // legal holiday falling on rest day
        var specialRatesLegalHolidayFallingOnRestDayHour = 0;
        var specialRatesLegalHolidayFallingOnRestDay = 0;
        // double Pay
        var specialRatesDoublePayHour = 0;
        var specialRatesDoublePay = 0;
        // double Pay falling on rest day
        var specialRatesDoublePayFallingOnRestDayHour = 0;
        var specialRatesDoublePayFallingOnRestDay = 0;

        // overtime
        // Regular day
        var overtimeRegularDayHour = 0;
        var overtimeRegularDay = 0;
        // Special Holiday
        var overtimeSpecialHolidayHour = 0;
        var overtimeSpecialHoliday = 0;
        // wdo
        var overtimewDOHour = 0;
        var overtimewDO = 0;
        // specil holiday falling on rest day
        var overtimeSpecialHolidayFallingOnRestDayHour = 0;
        var overtimeSpecialHolidayFallingOnRestDay = 0;
        // legal holiday
        var overtimeLegalHolidayHour = 0;
        var overtimeLegalHoliday = 0;
        // legal falling on rest day
        var overtimeLegalHolidayFalllingOnRestDayHour = 0;
        var overtimeLegalHolidayFalllingOnRestDay = 0;
        // double pay 
        var overtimeDoublePayHour = 0;
        var overtimeDoublePay = 0;
        // double pay falling on rest day
        var overtimeDoublePayFallingOnRestDayHour = 0;
        var overtimeDoublePayFallingOnRestDay = 0;
        
        // night differential
        // regular day
        var nightdifferentaiRegularDayHour = 0;
        var nightdifferentaiRegularDay = 0;
        // special rates
        var nightdifferentailSpecialHolidayHour = 0;
        var nightdifferentailSpecialHoliday = 0;
        // wdo
        var nightdifferentialwDOHour = 0;
        var nightdifferentialwDO = 0;
        // special holiday falling on rest day
        var nightdifferentialSpecialHolidayFallingOnRestDayHour = 0;
        var nightdifferentialSpecialHolidayFallingOnRestDay = 0;
        // legal holiday
        var nightdifferentialLegalHolidayHour = 0;
        var nightdifferentialLegalHoliday = 0;
        // legal holiday falling on rest day
        var nightdifferentialLegalHolidayFallingOnRestDayHour = 0;
        var nightdifferentialLegalHolidayFallingOnRestDay = 0;
        // double pay
        var nightdifferentialDoublePayHour = 0;
        var nightdifferentialDoublePay = 0;
        // double pay falling on rest day
        var nightdifferentialDoublePayFallingOnRestDayHour = 0;
        var nightdifferentialDoublePayFallingOnRestDay = 0;

        // overtime with night differential
        // regular day
        var overtimewithnightdifferentialRegularDayHour = 0;
        var overtimewithnightdifferentialRegularDay = 0;
        // special holiday
        var overtimewithnightdifferentialSpecialHolidayHour = 0;
        var overtimewithnightdifferentialSpecialHoliday = 0;
        // wdo
        var overtimewithnightdifferentialwDOHour = 0;
        var overtimewithnightdifferentialwDO = 0;
        // spececial holliday falling on rest day
        var overtimewithnightdifferentialSpecialHolidayFallingOnRestDayHour = 0;
        var overtimewithnightdifferentialSpecialHolidayFallingOnRestDay = 0;
        // legal holiday
        var overtimewithnightdifferentialLegalHolidayHour = 0;
        var overtimewithnightdifferentialLegalHoliday = 0;
        // legal holiday falling on rest day
        var overtimewithnightdifferentialLegalHolidayFallingOnRestDayHour = 0;
        var overtimewithnightdifferentialLegalHolidayFallingOnRestDay = 0;
        // double pay
        var overtimewithnightdifferentialDoublePayHour = 0;
        var overtimewithnightdifferentialDoublePay = 0;
        // double pay falling on rest day
        var overtimewithnightdifferentialDoublePayFallingOnRestDayHour = 0;
        var overtimewithnightdifferentialDoublePayFallingOnRestDay = 0;


        //** with rate increase variable starts here */

        // special rate
        var specialRatesSpecialHolidayWriHour = 0;
        var specialRatesSpecialHolidayWri = 0;
        // wdo
        var specialRatesWdoWriHour = 0;
        var specialRatesWdoWri = 0;
        // special holidayfalling on rest day
        var specialRatesSpecialHolidayFallingOnRestDayWriHour = 0;
        var specialRatesSpecialHolidayFallingOnRestDayWri = 0;
        // legal holiday
        var specialRatesLegalHolidayWriHour = 0;
        var specialRatesLegalHolidayWri = 0;
        // legal holiday falling on rest day
        var specialRatesLegalHolidayFallingOnRestDayWriHour = 0;
        var specialRatesLegalHolidayFallingOnRestDayWri = 0;
        // double Pay
        var specialRatesDoublePayWriHour = 0;
        var specialRatesDoublePayWri = 0;
        // double Pay falling on rest day
        var specialRatesDoublePayFallingOnRestDayWriHour = 0;
        var specialRatesDoublePayFallingOnRestDayWri = 0;

        // overtime
        // Regular day
        var overtimeRegularDayWriHour = 0;
        var overtimeRegularDayWri = 0;
        // Special Holiday
        var overtimeSpecialHolidayWriHour = 0;
        var overtimeSpecialHolidayWri = 0;
        // wdo
        var overtimewDOWriHour = 0;
        var overtimewDOWri = 0;
        // specil holiday falling on rest day
        var overtimeSpecialHolidayFallingOnRestDayWriHour = 0;
        var overtimeSpecialHolidayFallingOnRestDayWri = 0;
        // legal holiday
        var overtimeLegalHolidayWriHour = 0;
        var overtimeLegalHolidayWri = 0;
        // legal falling on rest day
        var overtimeLegalHolidayFalllingOnRestDayWriHour = 0;
        var overtimeLegalHolidayFalllingOnRestDayWri = 0;
        // double pay 
        var overtimeDoublePayWriHour = 0;
        var overtimeDoublePayWri = 0;
        // double pay falling on rest day
        var overtimeDoublePayFallingOnRestDayWriHour = 0;
        var overtimeDoublePayFallingOnRestDayWri = 0;
        
        // night differential
        // regular day
        var nightdifferentaiRegularDayWriHour = 0;
        var nightdifferentaiRegularDayWri = 0;
        // special rates
        var nightdifferentailSpecialHolidayWriHour = 0;
        var nightdifferentailSpecialHolidayWri = 0;
        // wdo
        var nightdifferentialwDOWriHour = 0;
        var nightdifferentialwDOWri = 0;
        // special holiday falling on rest day
        var nightdifferentialSpecialHolidayFallingOnRestDayWriHour = 0;
        var nightdifferentialSpecialHolidayFallingOnRestDayWri = 0;
        // legal holiday
        var nightdifferentialLegalHolidayWriHour = 0;
        var nightdifferentialLegalHolidayWri = 0;
        // legal holiday falling on rest day
        var nightdifferentialLegalHolidayFallingOnRestDayWriHour = 0;
        var nightdifferentialLegalHolidayFallingOnRestDayWri = 0;
        // double pay
        var nightdifferentialDoublePayWriHour = 0;
        var nightdifferentialDoublePayWri = 0;
        // double pay falling on rest day
        var nightdifferentialDoublePayFallingOnRestDayWriHour = 0;
        var nightdifferentialDoublePayFallingOnRestDayWri = 0;

        // overtime with night differential
        // regular day
        var overtimewithnightdifferentialRegularDayWriHour = 0;
        var overtimewithnightdifferentialRegularDayWri = 0;
        // special holiday
        var overtimewithnightdifferentialSpecialHolidayWriHour = 0;
        var overtimewithnightdifferentialSpecialHolidayWri = 0;
        // wdo
        var overtimewithnightdifferentialwDOWriHour = 0;
        var overtimewithnightdifferentialwDOWri = 0;
        // spececial holliday falling on rest day
        var overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWriHour = 0;
        var overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWri = 0;
        // legal holiday
        var overtimewithnightdifferentialLegalHolidayWriHour = 0;
        var overtimewithnightdifferentialLegalHolidayWri = 0;
        // legal holiday falling on rest day
        var overtimewithnightdifferentialLegalHolidayFallingOnRestDayWriHour = 0;
        var overtimewithnightdifferentialLegalHolidayFallingOnRestDayWri = 0;
        // double pay
        var overtimewithnightdifferentialDoublePayWriHour = 0;
        var overtimewithnightdifferentialDoublePayWri = 0;
        // double pay falling on rest day
        var overtimewithnightdifferentialDoublePayFallingOnRestDayWriHour = 0;
        var overtimewithnightdifferentialDoublePayFallingOnRestDayWri = 0;

        //** with rate increase variable ends here */
        

        // deduction result
        var deductionValue = 0;
        // late with rate increase
        var deductionValueWriHour = 0;
        var deductionValueWri = 0;
        // deduction regular late
        var deductionLateHour = 0;
        // deductions with rate increase
        var deductionLateWriHour = 0;
        // sss loan
        var sssLoanHour = 0;
        // pagibig loan
        var pagibigLoanHour = 0;
        // MGA meal
        var mgaMealHour = 0;;
        // adjustment minus
        var adjustmentMinusHour = 0;


        // adjustment (+)
        var AdjustmentPlus = 0;
        // transportaion 
        var AdjustmentTransportation = 0;

        var transactioFee = 0;
        modeOfPayment = 0;
        var clh = 0;
        var gcash = 0;
        var rcbc = 0;
        var eastwest = 0;

        // government
        var govermentPhil = 0;
        var governmentHdmf = 0;
        var dayOfMonth = $('#p_datepicker').val();
    

        // var datepicker = "";

       

        




        //**  DECLARED VARIABLES ENDS HERE **//

        // // adjustment (+)
        // var AdjustmentPlus = parseFloat($('#p_adjustment_adjustment_plus').val());
        // var AdjustmentTransportation = parseFloat($('#p_adjustment_transportation').val());

        // // Goverment Dues
        // var govermentSss = $('#p_goverment_dues_sss').val();
        // var govermentPhic = $('#p_goverment_dues_phic').val();
        // var govermentHdmf = $('#p_goverment_dues_hdmf').val();
        


        // // Deduction fees
        // var transactionFee = $('#p_transaction_fee');
            
        // // Total
   
        // var totalPay = $('#p_total_pay_total_pay');
    
        //**  DECLARED VARIABLES ENDS HERE **//



        //** PARSEFLOAT STARTS HERE **//

        // deduction parsefloat
        // var sssLoan = parseFloat($('#p_new_deduction_sss_loan').val());
        // var pagibigLoan = parseFloat($('#p_new_deduction_pagibig_loan').val());
        // var mealDeduction = parseFloat($('#p_new_deduction_meal_deduction').val());
        // var adjustmentMinus = parseFloat($('#new_deduction_adjusment_minus').val());

        // total parsefloat

        var totalNetPay = parseFloat($('#p_total_pay_net_pay').val());
        var disersPay = parseFloat($('#p_total_pay_total_pay'));

        //** PARSEFLOAT ENDS HERE **// 
       
       // ** --------------------------- **//


        // CHANGE KEYUP FUNCTION STARTS HERE
       

        //** CALCULATE FUNCTION STARTS HERE **// 
        $(document).ready(async function() {

            async function calculate() {
                totalHours = actualDays * 8;
                totalHoursWri = actualDaysWri * 8;

          
                let deductTransactionFee = 0;
                let govermentSss = 180;
                // let governmentPhil = 0;
                // let governmentHdmf = 180;  

                const totalDaysRate = actualDays * Ratings;
                // special rates equations
                specialRatesSpecialHoliday = specialRatesSpecialHolidayHour * (Ratings * 1.3 / 8).toFixed(2);
                specialRatesWdo = specialRatesWdoHour * (Ratings * 1.3 / 8).toFixed(2);
                specialRatesSpecialHolidayFallingOnRestDay = specialRatesSpecialHolidayFallingOnRestDayHour * (Ratings * 1.5 / 8).toFixed(2);
                specialRatesLegalHoliday = specialRatesLegalHolidayHour * (Ratings / 8).toFixed(2);
                specialRatesLegalHolidayFallingOnRestDay = specialRatesLegalHolidayFallingOnRestDayHour * (Ratings * 1.6 / 8).toFixed(2);
                specialRatesDoublePay = specialRatesDoublePayHour * (Ratings * 2 / 8).toFixed(2);
                specialRatesDoublePayFallingOnRestDay = specialRatesDoublePayFallingOnRestDayHour * (Ratings * 2.9 / 8).toFixed(2);
                // overtime eqauations
                overtimeRegularDay = overtimeRegularDayHour * (Ratings * 1.25 / 8).toFixed(2);
                overtimeSpecialHoliday = overtimeSpecialHolidayHour * (Ratings * 1.3 * 1.3 / 8).toFixed(2);
                overtimewDO = overtimewDOHour * (Ratings * 1.3 * 1.3 / 8).toFixed(2);
                overtimeSpecialHolidayFallingOnRestDay = overtimeSpecialHolidayFallingOnRestDayHour * (Ratings * 1.5 * 1.3 / 8).toFixed(2);
                overtimeLegalHoliday = overtimeLegalHolidayHour * (Ratings * 1.3 / 8).toFixed(2); 
                overtimeLegalHolidayFalllingOnRestDay = overtimeLegalHolidayFalllingOnRestDayHour * (Ratings * 1.6 * 1.3 / 8).toFixed(2);
                overtimeDoublePay = overtimeDoublePayHour * (Ratings * 2 * 1.3 / 8).toFixed(2);
                overtimeDoublePayFallingOnRestDay = overtimeDoublePayFallingOnRestDayHour * (Ratings * 2.9 * 1.3 / 8).toFixed(2);
                // night differential
                nightdifferentaiRegularDay = nightdifferentaiRegularDayHour * (Ratings / 8 * 0.1).toFixed(2);
                nightdifferentailSpecialHoliday = nightdifferentailSpecialHolidayHour * (Ratings * 1.3 * 0.1 / 8).toFixed(2);
                nightdifferentialwDO = nightdifferentialwDOHour * (Ratings * 1.3 * 0.1 / 8).toFixed(2);
                nightdifferentialSpecialHolidayFallingOnRestDay = nightdifferentialSpecialHolidayFallingOnRestDayHour * (Ratings * 1.5 * 0.1 / 8).toFixed(2);
                nightdifferentialLegalHoliday = nightdifferentialLegalHolidayHour * (Ratings / 8 * 0.1).toFixed(2);
                nightdifferentialLegalHolidayFallingOnRestDay = nightdifferentialLegalHolidayFallingOnRestDayHour * (Ratings * 1.6 * 0.1 / 8).toFixed(2);
                nightdifferentialDoublePay = nightdifferentialDoublePayHour * (Ratings * 2 * 0.1 / 8).toFixed(2);
                nightdifferentialDoublePayFallingOnRestDay = nightdifferentialDoublePayFallingOnRestDayHour * (Ratings * 2.9 * 0.1 / 8).toFixed(2);
                // overtime with night differential
                overtimewithnightdifferentialRegularDay = overtimewithnightdifferentialRegularDayHour * (Ratings * 1.25 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialSpecialHoliday = overtimewithnightdifferentialSpecialHolidayHour * (Ratings * 1.3 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialwDO = overtimewithnightdifferentialwDOHour * (Ratings * 1.3 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialSpecialHolidayFallingOnRestDay = overtimewithnightdifferentialSpecialHolidayFallingOnRestDayHour * (Ratings * 1.5 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialLegalHoliday = overtimewithnightdifferentialLegalHolidayHour * (Ratings * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialLegalHolidayFallingOnRestDay = overtimewithnightdifferentialLegalHolidayFallingOnRestDayHour * (Ratings * 1.6 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialDoublePay = overtimewithnightdifferentialDoublePayHour * (Ratings * 2 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialDoublePayFallingOnRestDay = overtimewithnightdifferentialDoublePayFallingOnRestDayHour * (Ratings * 2.9 * 1.3 * 0.1 / 8).toFixed(2);


                //** WITH RATE INCREASE VARIABLE AND EQUATIONS STARTS HERE */

                // with rate increase special rates equations
                specialRatesSpecialHolidayWri = specialRatesSpecialHolidayWriHour * (newRatings * 1.3 / 8).toFixed(2);
                specialRatesWdoWri = specialRatesWdoWriHour * (newRatings * 1.3 / 8).toFixed(2);
                specialRatesSpecialHolidayFallingOnRestDayWri = specialRatesSpecialHolidayFallingOnRestDayWriHour * (newRatings * 1.5 / 8).toFixed(2);
                specialRatesLegalHolidayWri = specialRatesLegalHolidayWriHour * (newRatings / 8).toFixed(2);
                specialRatesLegalHolidayFallingOnRestDayWri = specialRatesLegalHolidayFallingOnRestDayWriHour * (newRatings * 1.6 / 8).toFixed(2);
                specialRatesDoublePayWri = specialRatesDoublePayWriHour * (newRatings * 2 / 8).toFixed(2);
                specialRatesDoublePayFallingOnRestDayWri = specialRatesDoublePayFallingOnRestDayWriHour * (newRatings * 2.9 / 8).toFixed(2);
                // with rate increase overtime eqauations
                overtimeRegularDayWri = overtimeRegularDayWriHour * (newRatings * 1.25 / 8).toFixed(2);
                overtimeSpecialHolidayWri = overtimeSpecialHolidayWriHour * (newRatings * 1.3 * 1.3 / 8).toFixed(2);
                overtimewDOWri = overtimewDOWriHour * (newRatings * 1.3 * 1.3 / 8).toFixed(2);
                overtimeSpecialHolidayFallingOnRestDayWri = overtimeSpecialHolidayFallingOnRestDayWriHour * (newRatings * 1.5 * 1.3 / 8).toFixed(2);
                overtimeLegalHolidayWri = overtimeLegalHolidayWriHour * (newRatings * 1.3 / 8).toFixed(2); 
                overtimeLegalHolidayFalllingOnRestDayWri = overtimeLegalHolidayFalllingOnRestDayWriHour * (newRatings * 1.6 * 1.3 / 8).toFixed(2);
                overtimeDoublePayWri = overtimeDoublePayWriHour * (newRatings * 2 * 1.3 / 8).toFixed(2);
                overtimeDoublePayFallingOnRestDayWri = overtimeDoublePayFallingOnRestDayWriHour * (newRatings * 2.9 * 1.3 / 8).toFixed(2);
                // with rate increase night differential
                nightdifferentaiRegularDayWri = nightdifferentaiRegularDayWriHour * (newRatings / 8 * 0.1).toFixed(2);
                nightdifferentailSpecialHolidayWri = nightdifferentailSpecialHolidayWriHour * (newRatings * 1.3 * 0.1 / 8).toFixed(2);
                nightdifferentialwDOWri = nightdifferentialwDOWriHour * (newRatings * 1.3 * 0.1 / 8).toFixed(2);
                nightdifferentialSpecialHolidayFallingOnRestDayWri = nightdifferentialSpecialHolidayFallingOnRestDayWriHour * (newRatings * 1.5 * 0.1 / 8).toFixed(2);
                nightdifferentialLegalHolidayWri = nightdifferentialLegalHolidayWriHour * (newRatings / 8 * 0.1).toFixed(2);
                nightdifferentialLegalHolidayFallingOnRestDayWri = nightdifferentialLegalHolidayFallingOnRestDayWriHour * (newRatings * 1.6 * 0.1 / 8).toFixed(2);
                nightdifferentialDoublePayWri = nightdifferentialDoublePayWriHour * (newRatings * 2 * 0.1 / 8).toFixed(2);
                nightdifferentialDoublePayFallingOnRestDayWri = nightdifferentialDoublePayFallingOnRestDayWriHour * (newRatings * 2.9 * 0.1 / 8).toFixed(2);
                // with rate increase overtime with night differential
                overtimewithnightdifferentialRegularDayWri = overtimewithnightdifferentialRegularDayWriHour * (newRatings * 1.25 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialSpecialHolidayWri = overtimewithnightdifferentialSpecialHolidayWriHour * (newRatings * 1.3 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialwDOWri = overtimewithnightdifferentialwDOWriHour * (newRatings * 1.3 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWri = overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWriHour * (newRatings * 1.5 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialLegalHolidayWri = overtimewithnightdifferentialLegalHolidayWriHour * (newRatings * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialLegalHolidayFallingOnRestDayWri = overtimewithnightdifferentialLegalHolidayFallingOnRestDayWriHour * (newRatings * 1.6 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialDoublePayWri = overtimewithnightdifferentialDoublePayWriHour * (newRatings * 2 * 1.3 * 0.1 / 8).toFixed(2);
                overtimewithnightdifferentialDoublePayFallingOnRestDayWri = overtimewithnightdifferentialDoublePayFallingOnRestDayWriHour * (newRatings * 2.9 * 1.3 * 0.1 / 8).toFixed(2);

                //** WITH RATE INCREASE VARIABLE AND EQUATIONS ENDS HERE */


                // deduction minus
                deductionValue = deductionLateHour * (Ratings / 8 / 60).toFixed(2);
                deductionValueWri = deductionLateWriHour * (newRatings / 8 / 60).toFixed(2);
                const newRateValue = newRatings * actualDaysWri;

      
                // total net pay
                totalNetPay =  ((totalDaysRate + siLHour + monthHour
                + specialRatesSpecialHoliday + specialRatesWdo + specialRatesSpecialHolidayFallingOnRestDay + specialRatesLegalHoliday + specialRatesLegalHolidayFallingOnRestDay 
                + specialRatesDoublePay + specialRatesDoublePayFallingOnRestDay
                + overtimeRegularDay + overtimeSpecialHoliday + overtimewDO + overtimeSpecialHolidayFallingOnRestDay + overtimeLegalHoliday + overtimeLegalHolidayFalllingOnRestDay 
                + overtimeDoublePay + overtimeDoublePayFallingOnRestDay
                + nightdifferentaiRegularDay + nightdifferentailSpecialHoliday + nightdifferentialwDO + nightdifferentialSpecialHolidayFallingOnRestDay + nightdifferentialLegalHoliday 
                + nightdifferentialLegalHolidayFallingOnRestDay + nightdifferentialDoublePay + nightdifferentialDoublePayFallingOnRestDay
                + overtimewithnightdifferentialRegularDay + overtimewithnightdifferentialSpecialHoliday + overtimewithnightdifferentialwDO 
                + overtimewithnightdifferentialSpecialHolidayFallingOnRestDay + overtimewithnightdifferentialLegalHoliday 
                + overtimewithnightdifferentialLegalHolidayFallingOnRestDay + overtimewithnightdifferentialDoublePay 

                + specialRatesSpecialHolidayWri + specialRatesWdoWri + specialRatesSpecialHolidayFallingOnRestDayWri + specialRatesLegalHolidayWri + specialRatesLegalHolidayFallingOnRestDayWri 
                + specialRatesDoublePayWri + specialRatesDoublePayFallingOnRestDayWri
                + overtimeRegularDayWri + overtimeSpecialHolidayWri + overtimewDOWri + overtimeSpecialHolidayFallingOnRestDayWri + overtimeLegalHolidayWri + overtimeLegalHolidayFalllingOnRestDayWri 
                + overtimeDoublePayWri + overtimeDoublePayFallingOnRestDayWri
                + nightdifferentaiRegularDayWri + nightdifferentailSpecialHolidayWri + nightdifferentialwDOWri + nightdifferentialSpecialHolidayFallingOnRestDayWri + nightdifferentialLegalHolidayWri 
                + nightdifferentialLegalHolidayFallingOnRestDayWri + nightdifferentialDoublePayWri + nightdifferentialDoublePayFallingOnRestDayWri
                + overtimewithnightdifferentialRegularDayWri + overtimewithnightdifferentialSpecialHolidayWri + overtimewithnightdifferentialwDOWri 
                + overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWri + overtimewithnightdifferentialLegalHolidayWri 
                + overtimewithnightdifferentialLegalHolidayFallingOnRestDayWri + overtimewithnightdifferentialDoublePayWri + overtimewithnightdifferentialDoublePayFallingOnRestDayWri

                + overtimewithnightdifferentialDoublePayFallingOnRestDay
                + AdjustmentPlus + AdjustmentTransportation)+ (newRateValue)).toFixed(2) ;


                if(selectPayment === "Cebuana Lhuillier") {
                    deductTransactionFee = await transactionFee(totalNetPay);
                }else if(selectPayment === "Gcash"){
                    deductTransactionFee = 15;
                }

                // government dues
                // sss deduction
                if (totalNetPay <= 3001) {
                    govermentSss = 0;
                } else if (totalNetPay > 4249.99) {
                    for (i = 4250; i < totalNetPay; i += 500) {
                        if (govermentSss >= 900) {
                            break;
                        }
                        govermentSss += 22.50;
                    }
                }




                // adjustment minus
                disersPay = (totalNetPay - deductionValue - deductionValueWri - sssLoanHour - pagibigLoanHour - mgaMealHour - adjustmentMinusHour 
                - govermentSss - governmentHdmf - deductTransactionFee).toFixed(2);

                

        


                // goverrment dues
                $("#p_goverment_dues_sss").val(govermentSss);
                $("#p_goverment_dues_phic").val(govermentPhil);
                $("#p_goverment_dues_hdmf").val(governmentHdmf);

                // transaction fee
                $("#p_transaction_fee").val(deductTransactionFee);
                // late
                $("#p_new_deduction_late_deduction").val(deductionValue);
                $("#p_new_deduction_late_deduction_wri").val(deductionValueWri);

                $("#p_total_hours_wri").val(totalHoursWri)
                $("#p_total_hours").val(totalHours);
                $("#p_total_pay_net_pay").val(totalNetPay);
                $("#p_total_pay_total_pay").val(disersPay);
            }

              function transactionFee(totalNetPay) {
                if (totalNetPay >= 0.01 && totalNetPay <= 100) {
                        clh = 7;
                    } else if (totalNetPay >= 100.01 && totalNetPay <= 200.00) {
                        clh = 13;
                    } else if (totalNetPay  >= 200.01 && totalNetPay  <= 300.00){
                    clh = 18;
                    }
                    else if (totalNetPay  >= 300.01 && totalNetPay  <= 400.00){
                        clh = 20;
                    }
                    else if (totalNetPay  >= 400.01 && totalNetPay  <= 500.00){
                        clh = 25;
                    }
                    else if (totalNetPay  >= 500.01 && totalNetPay  <= 600.00){
                        clh = 30;
                    }
                    else if (totalNetPay  >= 800.01 && totalNetPay  <= 900.00){
                        clh = 40;
                    }
                    else if (totalNetPay  >= 900.01 && totalNetPay  <= 1000.00){
                        clh = 45;
                    }
                    else if (totalNetPay  >= 1000.01 && totalNetPay  <= 1500.00){
                        clh = 65;
                    }
                    else if (totalNetPay  >= 1500.01 && totalNetPay  <= 2000.00){
                        clh = 80;
                    }
                    else if (totalNetPay  >= 2000.01 && totalNetPay  <= 2500.00){
                        clh = 100;
                    }
                    else if (totalNetPay  >= 2500.01 && totalNetPay  <= 3000.00){
                        clh = 110;
                    }
                    else if (totalNetPay >= 3000.01 && totalNetPay <= 4000.00){
                        clh = 120;
                    }
                    else if (totalNetPay >= 4000.01 && totalNetPay <= 7000.00){
                        clh = 130;
                    }
                    else if (totalNetPay  >= 7000.01 && totalNetPay  <= 10000.00){
                        clh = 140;
                    }
                    else if (totalNetPay  >= 10000.01 && totalNetPay  <= 14000.00){
                        clh = 150;
                    }
                    else if (totalNetPay  >= 14000.01 && totalNetPay  <= 15000.00){
                        clh = 160;
                    }
                    else if (totalNetPay  >= 15000.01 && totalNetPay  <= 20000.00){
                        clh = 200;
                    }
                    else if (totalNetPay  >= 20000.01 && totalNetPay  <= 25000.00){
                        clh = 250;
                    }
                    else if (totalNetPay  >= 25000.01 && totalNetPay  <= 30000.00){
                        clh = 300;
                    }    
                    
                    return clh;

            }


                
                // PAGIBIG / HDMF
                $("#p_datepicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    onSelect: function(dateText, inst) {
                        var selectedDate = new Date(dateText);
                        dayOfMonth = selectedDate.getDate();
                        if (dayOfMonth >= 1 && dayOfMonth <= 15) {
                            if (totalNetPay >= 3001) { 
                                governmentHdmf = 200;
                                govermentPhil = 0;
                               
                            }
                        } 
                        else if (dayOfMonth >= 16 && dayOfMonth <= 31){
                            if (totalNetPay >= 3001) { 
                                govermentPhil = 399.77;
                                governmentHdmf =  0;
                                
                            }
                        }
                        
                        calculate();
                        
                    }
                }); 


                //** key change starts here */
                $("#p_actual_rendered_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    actualDays = parseFloat($(this).val())
                    :
                    actualDays = 0  
                    )   
                    calculate();
                });

                // acutal rendered days with rate increase
                $("#p_actual_rendered_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    actualDaysWri = parseFloat($(this).val())
                    :
                    actualDaysWri = 0  
                    )   
                    calculate();
                });
                // SIL / 13th monthpay
                $("#p_sil").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    siLHour = parseFloat($(this).val())
                    :
                    siLHour = 0  
                    )
                    calculate(); 
                });
                // 13th month
                $("#p_month").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    monthHour = parseFloat($(this).val())
                    :
                    monthHour = 0  
                    )
                    calculate(); 
                });


           
                // special rates
                // special holiday
                $("#p_special_rates_special_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());             
                    (checkValue? 
                    specialRatesSpecialHolidayHour = parseFloat($(this).val())
                    :
                    specialRatesSpecialHolidayHour = 0  
                    )              
                    calculate();  
                });
                // wdo
                $("#p_special_rates_wdo").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesWdoHour = parseFloat($(this).val())
                    :
                    specialRatesWdoHour = 0  
                    )
                    calculate(); 
                });
                // special holiday falling on rest day rates
                $("#p_special_rates_special_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesSpecialHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    specialRatesSpecialHolidayFallingOnRestDayHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday
                $("#p_special_rates_legal_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesLegalHolidayHour = parseFloat($(this).val())
                    :
                    specialRatesLegalHolidayHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday falling on rest day
                $("#p_special_rates_legal_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesLegalHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    specialRatesLegalHolidayFallingOnRestDayHour = 0  
                    )
                    calculate(); 
                });
                // double pay
                $("#p_special_rates_double_pay").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesDoublePayHour = parseFloat($(this).val())
                    :
                    specialRatesDoublePayHour = 0  
                    )
                    calculate(); 
                });
                // double pay falling on rest day
                $("#p_special_rates_double_pay_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesDoublePayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    specialRatesDoublePayFallingOnRestDayHour = 0  
                    )
                    calculate(); 
                });
                

                // overtime
                // regular day
                $("#p_overtime_regular_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeRegularDayHour = parseFloat($(this).val())
                    :
                    overtimeRegularDayHour = 0  
                    )
                    calculate(); 
                });
                // special holiday
                $("#p_overtime_special_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeSpecialHolidayHour = parseFloat($(this).val())
                    :
                    overtimeSpecialHolidayHour = 0  
                    )
                    calculate(); 
                });
                // wdo
                $("#p_overtime_wdo").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewDOHour = parseFloat($(this).val())
                    :
                    overtimewDOHour = 0  
                    )
                    calculate(); 
                });
                // special holiday falling on rest day
                $("#p_overtime_special_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeSpecialHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    overtimeSpecialHolidayFallingOnRestDayHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday
                $("#p_overtime_legal_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeLegalHolidayHour = parseFloat($(this).val())
                    :
                    overtimeLegalHolidayHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday falling on rest day
                $("#p_overtime_legal_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeLegalHolidayFalllingOnRestDayHour = parseFloat($(this).val())
                    :
                    overtimeLegalHolidayFalllingOnRestDayHour = 0  
                    )
                    calculate(); 
                });
                // double pay
                $("#p_overtime_double_pay").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeDoublePayHour = parseFloat($(this).val())
                    :
                    overtimeDoublePayHour = 0  
                    )
                    calculate(); 
                });
                // double pay falling on rest day
                $("#p_overtime_double_pay_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeDoublePayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    overtimeDoublePayFallingOnRestDayHour = 0  
                    )
                    calculate(); 
                });
                
                // night differential
                // regular day
                $("#p_night_differenatial_regular_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentaiRegularDayHour = parseFloat($(this).val())
                    :
                    nightdifferentaiRegularDayHour = 0  
                    )
                    calculate();
                });
                $("#p_night_differenatial_special_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentailSpecialHolidayHour = parseFloat($(this).val())
                    :
                    nightdifferentailSpecialHolidayHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_wdo").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialwDOHour = parseFloat($(this).val())
                    :
                    nightdifferentialwDOHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_special_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialSpecialHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    nightdifferentialSpecialHolidayFallingOnRestDayHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_legal_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialLegalHolidayHour = parseFloat($(this).val())
                    :
                    nightdifferentialLegalHolidayHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_legal_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialLegalHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    nightdifferentialLegalHolidayFallingOnRestDayHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_double_pay").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialDoublePayHour = parseFloat($(this).val())
                    :
                    nightdifferentialDoublePayHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_double_pay_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialDoublePayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    nightdifferentialDoublePayFallingOnRestDayHour = 0  
                    )
                    calculate();
                });         
                

                // overtime with night differential
                // regular day
                $("#p_overtime_with_night_differential_regular_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialRegularDayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialRegularDayHour = 0  
                    )
                    calculate();
                });     
                // special holiday
                $("#p_overtime_with_night_differential_special_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialSpecialHolidayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialSpecialHolidayHour = 0  
                    )
                    calculate();
                });
                // wdo
                $("#p_overtime_with_night_differential_wdo").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialwDOHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialwDOHour = 0  
                    )
                    calculate();
                });
                // special holiday falling on rest day
                $("#p_overtime_with_night_differential_special_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialSpecialHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialSpecialHolidayFallingOnRestDayHour = 0  
                    )
                    calculate();
                });
                // legal holiday
                $("#p_overtime_with_night_differential_legal_holiday").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialLegalHolidayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialLegalHolidayHour = 0  
                    )
                    calculate();
                });
                // legal holiday falling on rest day
                $("#p_overtime_with_night_differential_legal_holiday_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialLegalHolidayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialLegalHolidayFallingOnRestDayHour = 0  
                    )
                    calculate();
                })
                // double pay
                $("#p_overtime_with_night_differential_double_pay").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialDoublePayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialDoublePayHour = 0  
                    )
                    calculate();
                });
                // double pay falling on rest day
                $("#p_overtime_with_night_differential_double_pay_falling_on_rest_day").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialDoublePayFallingOnRestDayHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialDoublePayFallingOnRestDayHour = 0  
                    )
                    calculate();
                });   



                // 
                // 
                //** with rate increase keyup change starts here */


                // special rates
                // special holiday
                $("#p_special_rates_special_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());             
                    (checkValue? 
                    specialRatesSpecialHolidayWriHour = parseFloat($(this).val())
                    :
                    specialRatesSpecialHolidayWriHour = 0  
                    )              
                    calculate();  
                });
                // wdo
                $("#p_special_rates_wdo_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesWdoWriHour = parseFloat($(this).val())
                    :
                    specialRatesWdoWriHour = 0  
                    )
                    calculate(); 
                });
                // special holiday falling on rest day rates
                $("#p_special_rates_special_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesSpecialHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    specialRatesSpecialHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday
                $("#p_special_rates_legal_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesLegalHolidayWriHour = parseFloat($(this).val())
                    :
                    specialRatesLegalHolidayWriHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday falling on rest day
                $("#p_special_rates_legal_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesLegalHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    specialRatesLegalHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate(); 
                    // console.log('test');
                });
                // double pay
                $("#p_special_rates_double_pay_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesDoublePayWriHour = parseFloat($(this).val())
                    :
                    specialRatesDoublePayWriHour = 0  
                    )
                    calculate();
                    // console.log('test');
                });
                // double pay falling on rest day
                $("#p_special_rates_double_pay_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    specialRatesDoublePayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    specialRatesDoublePayFallingOnRestDayWriHour = 0  
                    )
                    calculate(); 
                    // console.log('test');
                });
                

                // overtime
                // regular day
                $("#p_overtime_regular_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeRegularDayWriHour = parseFloat($(this).val())
                    :
                    overtimeRegularDayWriHour = 0  
                    )
                    calculate(); 
                });
                // special holiday
                $("#p_overtime_special_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeSpecialHolidayWriHour = parseFloat($(this).val())
                    :
                    overtimeSpecialHolidayWriHour = 0  
                    )
                    calculate(); 
                });
                // wdo
                $("#p_overtime_wdo_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewDOWriHour = parseFloat($(this).val())
                    :
                    overtimewDOWriHour = 0  
                    )
                    calculate(); 
                });
                // special holiday falling on rest day
                $("#p_overtime_special_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeSpecialHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    overtimeSpecialHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday
                $("#p_overtime_legal_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeLegalHolidayWriHour = parseFloat($(this).val())
                    :
                    overtimeLegalHolidayWriHour = 0  
                    )
                    calculate(); 
                });
                // legal holiday falling on rest day
                $("#p_overtime_legal_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeLegalHolidayFalllingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    overtimeLegalHolidayFalllingOnRestDayWriHour = 0  
                    )
                    calculate(); 
                });
                // double pay
                $("#p_overtime_double_pay_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeDoublePayWriHour = parseFloat($(this).val())
                    :
                    overtimeDoublePayWriHour = 0  
                    )
                    calculate(); 
                });
                // double pay falling on rest day
                $("#p_overtime_double_pay_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimeDoublePayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    overtimeDoublePayFallingOnRestDayWriHour = 0  
                    )
                    calculate(); 
                });
                
                // night differential
                // regular day
                $("#p_night_differenatial_regular_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentaiRegularDayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentaiRegularDayWriHour = 0  
                    )
                    calculate();
                });
                $("#p_night_differenatial_special_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentailSpecialHolidayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentailSpecialHolidayWriHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_wdo_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialwDOWriHour = parseFloat($(this).val())
                    :
                    nightdifferentialwDOWriHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_special_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialSpecialHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentialSpecialHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_legal_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialLegalHolidayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentialLegalHolidayWriHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_legal_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialLegalHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentialLegalHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_double_pay_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialDoublePayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentialDoublePayWriHour = 0  
                    )
                    calculate();
                });    
                $("#p_night_differenatial_double_pay_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    nightdifferentialDoublePayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    nightdifferentialDoublePayFallingOnRestDayWriHour = 0  
                    )
                    calculate();
                });         
                

                // overtime with night differential
                // regular day
                $("#p_overtime_with_night_differential_regular_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialRegularDayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialRegularDayWriHour = 0  
                    )
                    calculate();
                });     
                // special holiday
                $("#p_overtime_with_night_differential_special_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialSpecialHolidayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialSpecialHolidayWriHour = 0  
                    )
                    calculate();
                });
                // wdo
                $("#p_overtime_with_night_differential_wdo_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialwDOWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialwDOWriHour = 0  
                    )
                    calculate();
                });
                // special holiday falling on rest day
                $("#p_overtime_with_night_differential_special_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialSpecialHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate();
                });
                // legal holiday
                $("#p_overtime_with_night_differential_legal_holiday_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialLegalHolidayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialLegalHolidayWriHour = 0  
                    )
                    calculate();
                });
                // legal holiday falling on rest day
                $("#p_overtime_with_night_differential_legal_holiday_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialLegalHolidayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialLegalHolidayFallingOnRestDayWriHour = 0  
                    )
                    calculate();
                })
                // double pay
                $("#p_overtime_with_night_differential_double_pay_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialDoublePayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialDoublePayWriHour = 0  
                    )
                    calculate();
                });
                // double pay falling on rest day
                $("#p_overtime_with_night_differential_double_pay_falling_on_rest_day_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    overtimewithnightdifferentialDoublePayFallingOnRestDayWriHour = parseFloat($(this).val())
                    :
                    overtimewithnightdifferentialDoublePayFallingOnRestDayWriHour = 0  
                    )
                    calculate();
                });   

                //** with rate increase keyup change ends here */
                // 
                // 


                // Deductions
                // late deduction
                $("#p_new_deduction_late").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    deductionLateHour = parseFloat($(this).val())
                    :
                    deductionLateHour = 0  
                    )
                    calculate();
                }); 
                // late deduction with rate increase
                $("#p_new_deduction_late_wri").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    deductionLateWriHour = parseFloat($(this).val())
                    :
                    deductionLateWri = 0  
                    )
                    calculate();
                }); 
                // sss loan
                $("#p_new_deduction_sss_loan").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    sssLoanHour = parseFloat($(this).val())
                    :
                    sssLoanHour = 0  
                    )
                    calculate();
                });
                // pag ibig loan
                $("#p_new_deduction_pagibig_loan").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    pagibigLoanHour = parseFloat($(this).val())
                    :
                    pagibigLoanHour = 0  
                    )
                    calculate();
                });
                // MGA meal
                $("#p_new_deduction_meal_deduction").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    mgaMealHour = parseFloat($(this).val())
                    :
                    mgaMealHour = 0  
                    )
                    calculate();
                });
                // adjustment minus
                $("#new_deduction_adjusment_minus").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    adjustmentMinusHour = parseFloat($(this).val())
                    :
                    adjustmentMinusHour = 0  
                    )
                    calculate();
                });  

                // adjustment (+)
                // adjusmtnet plus
                $("#p_adjustment_adjustment_plus").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    AdjustmentPlus = parseFloat($(this).val())
                    :
                    AdjustmentPlus = 0  
                    )
                    calculate();
                });  
                // transportation
                $("#p_adjustment_transportation").on("change keyup paste", function(){
                    const checkValue = parseFloat($(this).val());
                    (checkValue? 
                    AdjustmentTransportation = parseFloat($(this).val())
                    :
                    AdjustmentTransportation = 0  
                    )
                    calculate();
                });  

                // mode of payment
                $("#p_mode_of_payment_mode_of_payment").change(function() {
                    selectPayment = this.value;
                    calculate();
                });

            
          
        });


        // ** --------------------------- **//
        // MODAL FUCTION STARTS HERE
        $('#inputtable tbody').on('click', 'img.arrow-button', function (e) {
            e.preventDefault();
            var selectedRowData = dataTable.row($(this).closest('tr')).data();
           
            $('#ratings').val(selectedRowData.ratings);
            $('#merchandiser_fullname').val(selectedRowData.merchandiser_fullname);
            $('#account').val(selectedRowData.account);
            $('#coordinator_fullname').val(selectedRowData.coordinator_fullname);
            $('#store_name').val(selectedRowData.store_name);
            $('#region').val(selectedRowData.region);
            Ratings = selectedRowData.ratings
            newRatings = selectedRowData.newratings;
            
            $('#payrollModal').modal('show');
        })
              
        $('#payrollclose').click(function(){
            $('#payrollModal').modal('hide');
        });     
        // MODAL FUNCTION ENDS HERE


        // GENERATE REPORT STARTS HERE
        var generateReportBtn = document.getElementById('generateReportBtn');
        generateReportBtn.addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/payrollinput/export', true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // console.log('Report generated successfully');
                    } else {
                        // console.error('Error generating report: ' + xhr.status);
                    }
                }
            };
            xhr.send();
        });

        // GENERATE REPORT ENDS HERE

        


                                    
        });
        
        // calculations ends herelate

            

    </script>



</body>

</html>




