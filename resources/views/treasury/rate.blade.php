<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="/asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/user/css2/payrolloff.css">
    <!-- end: CSS -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <title>BMPHRC</title>
</head>

<body>


<style>
    table {
        border-collapse: collapse;
        border-radius: 6px;
        width: 100%;
    }
    th, td {
        border: .1rem solid #eeee;
        padding: 8px;
        text-align: left;
    }
</style>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-light fs-4">Treasury</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item">
                <a href="{{route('treasury.view.dashboard')}}">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Dashboard
                </a>
            </li>
           
            
            
           
            <li class="sidebar-menu-item active">
                <a href="{{route('treasury.view.rate')}}">
                    <i class="ri-bill-line sidebar-menu-item-icon"></i>
                    Rate
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#">
                    <i class="ri-calendar-line sidebar-menu-item-icon"></i>
                    Calendar
                </a>
            </li>
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
                <h5 class="fw-bold mb-0 me-auto">Rates</h5>
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


            
            <!-- new content starts here -->

            <div style="height:2vh;"> </div>

                <div class="card">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title mb-2">Treasury table</h5>
                            </div>
                            <div class="col-md-6 text-end mb-2">
                                <button type="button" class="btn btn-secondary" id="addratecardModalButton">Add</button>
                            </div>
                        </div>
                        <table id="tabletwo" class="table table-hover border" style="width:100%">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th style="display:none">ID</th>
                                  <th>Region</th>
                                  <!-- <th>Rate Type</th> -->
                                  <th>Rate Per Day</th>
                                  <th>Rate Per Hour</th>
                                  <!-- <th>Special Holiday</th>
                                  <th>WDO</th>
                                  <th>Special Holiday Rest Day</th>
                                  <th>Legal Holliday</th>
                                  <th>Legal Holiday Rest Day</th>
                                  <th>Double Pay</th>
                                  <th>Double Pay Rest Day</th> -->
                                  <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                    </div>
                </div>

            <!-- new content ends here -->

        <!-- new modal for adding rate card starts here -->
        
        <div class="modal fade" id="addratecardModal" tabindex="-1" role="dialog"  aria-labelledby="addratecardModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" >New Rate</h5>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('treasury.rate-card-list.save-ratecard') }}" method="POST">
                        @csrf
                        @if (session('create-failed'))
                        <div style="background-color:rgba(255,255,255,0)" class="alert alert-danger">
                            <ul>
                                @foreach ($error->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- rows starts here -->
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Region *</label>
                                <select type="text" class="form-select" id="a_region" name = "a_region" value="{{ old('a_region') }}" required>
                                <option  value="">---Select Region---</option>
                                    <option  value="Region 1" @if(old('a_region') == "Region 1") {{'selected'}} @endif>Region 1</option>
                                    <option  value="Region 2" @if(old('a_region') == "Region 2") {{'selected'}} @endif>Region 2</option>
                                    <option  value="Region 3" @if(old('a_region') == "Region 3") {{'selected'}} @endif>Region 3</option>
                                    <option  value="Region 4" @if(old('a_region') == "Region 4") {{'selected'}} @endif>Region 4</option>
                                    <option  value="Region 5" @if(old('a_region') == "Region 5") {{'selected'}} @endif>Region 5</option>
                                    <option  value="Region 6" @if(old('a_region') == "Region 6") {{'selected'}} @endif>Region 6</option>
                                    <option  value="Region 7" @if(old('a_region') == "Region 7") {{'selected'}} @endif>Region 7</option>
                                    <option  value="Region 8" @if(old('a_region') == "Region 8") {{'selected'}} @endif>Region 8</option>
                                    <option  value="Region 9" @if(old('a_region') == "Region 9") {{'selected'}} @endif>Region 9</option>
                                    <option  value="Region 10" @if(old('a_region') == "Region 10") {{'selected'}} @endif>Region 10</option>
                                    <option  value="Region 11" @if(old('a_region') == "Region 11") {{'selected'}} @endif>Region 11</option>
                                    <option  value="Region 12" @if(old('a_region') == "Region 12") {{'selected'}} @endif>Region 12</option>
                                    <option  value="Region 13" @if(old('a_region') == "Region 13") {{'selected'}} @endif>Region 13</option>
                                    <option  value="NCR" @if(old('a_region') == "NCR") {{'selected'}} @endif>NCR</option>
                                    <option  value="MIMAROPA" @if(old('a_region') == "MIMAROPA") {{'selected'}} @endif>MIMAROPA</option>
                                    <option  value="CAR" @if(old('a_region') == "CAR") {{'selected'}} @endif>CAR</option>
                                    <option  value="BARMM" @if(old('a_region') == "BARMM") {{'selected'}} @endif>BARMM</option>
                                </select>
                            </div>

                            <!-- <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Rate Type *</label>
                                <select type="text" class="form-select" id="a_rate_type" name = "a_rate_type" value="{{ old('a_rate_type') }}" required>
                                <option  value="">---Select Rate Type---</option>
                                    <option  value="Special Rate" @if(old('a_rate_type') == "Special Rate") {{'selected'}} @endif>Special Rate</option>
                                    <option  value="OverTime" @if(old('a_rate_type') == "OverTime") {{'selected'}} @endif>OverTime</option>
                                    <option  value="Night Differential" @if(old('a_rate_type') == "Night Differential") {{'selected'}} @endif>Night Differential</option>
                                    <option  value="OverTime with Night Differential" @if(old('a_rate_type') == "OverTime with Night Diffetial") {{'selected'}} @endif>OverTime with Night Differential</option>
                                </select>
                            </div> -->

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Rate Per Day *</label>
                                <input type="text" class="form-control" name="a_rate_per_day" id="a_rate_per_day" value="{{ old('a_rate_per_day') }}"  required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Rate Per Hour *</label>
                                <input type="text" class="form-control" name="a_rate_per_hour" id="a_rate_per_hour" value="{{ old('a_rate_per_hour') }}" readonly>
                            </div>
                        </div>

                        <hr class="w-100">
                        <h6>Special Rates :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="a_special_rates_special_holiday" id="a_special_rates_special_holiday" value="{{ old('a_special_rates_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="a_special_rates_wdo" id="a_special_rates_wdo" value="{{ old('a_special_rates_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_special_rates_special_holiday_rest_day" id="a_special_rates_special_holiday_rest_day" value="{{ old('a_special_rates_special_holiday_rest_day') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="a_special_rates_legal_holiday" id="a_special_rates_legal_holiday" value="{{ old('a_special_rates_legal_holiday') }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_special_rates_legal_holiday_rest_day" id="a_special_rates_legal_holiday_rest_day" value="{{ old('a_special_rates_legal_holiday_rest_day') }}" readonly>
                            </div>  
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="a_special_rates_double_pay" id="a_special_rates_double_pay" value="{{ old('a_special_rates_double_pay') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="a_special_rates_double_pay_rest_day" id="a_special_rates_double_pay_rest_day" value="{{ old('a_special_rates_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <hr class="w-100">
                        <h6>Overtime :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Regular Day * </label>
                                <input type="text" class="form-control" name="a_overtime_regular_day" id="a_overtime_regular_day" value="{{ old('a_regular_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="a_overtime_special_holiday" id="a_overtime_special_holiday" value="{{ old('a_overtime_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="a_overtime_wdo" id="a_overtime_wdo" value="{{ old('a_overtime_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_overtime_special_holiday_rest_day" id="a_overtime_special_holiday_rest_day" value="{{ old('a_overtime_special_holiday_rest_day') }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="a_overtime_legal_holiday" id="a_overtime_legal_holiday" value="{{ old('a_overtime_legal_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_overtime_legal_holiday_rest_day" id="a_overtime_legal_holiday_rest_day" value="{{ old('a_overtime_legal_holiday_rest_day') }}" readonly>
                            </div>  
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="a_overtime_double_pay" id="a_overtime_double_pay" value="{{ old('a_overtime_double_pay') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="a_overtime_double_pay_rest_day" id="a_overtime_double_pay_rest_day" value="{{ old('a_overtime_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <hr class="w-100">
                        <h6>Night Differential :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Regular Day *</label>
                                <input type="text" class="form-control" name="a_night_differential_regular_day" id="a_night_differential_regular_day" value="{{ old('a_night_differential_regular_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="a_night_differential_special_holiday" id="a_night_differential_special_holiday" value="{{ old('a_night_differential_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="a_night_differential_wdo" id="a_night_differential_wdo" value="{{ old('a_night_differential_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_night_differential_special_holiday_rest_day" id="a_night_differential_special_holiday_rest_day" value="{{ old('a_night_differential_special_holiday_rest_day') }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="a_night_differential_legal_holiday" id="a_night_differential_legal_holiday" value="{{ old('a_night_differential_legal_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_night_differential_legal_holiday_rest_day" id="a_night_differential_legal_holiday_rest_day" value="{{ old('a_night_differential_legal_holiday_rest_day') }}" readonly>
                            </div>  
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="a_night_differential_double_pay" id="a_night_differential_double_pay" value="{{ old('a_night_differential_double_pay') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="a_night_differential_double_pay_rest_day" id="a_night_differential_double_pay_rest_day" value="{{ old('a_night_differential_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <hr class="w-100">
                        <h6>Overtime with night differential :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Regular Day *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_regular_day" id="a_overtime_with_night_differential_regular_day" value="{{ old('a_overtime_with_night_differential_regular_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_special_holiday" id="a_overtime_with_night_differential_special_holiday" value="{{ old('a_overtime_with_night_differential_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_wdo" id="a_overtime_with_night_differential_wdo" value="{{ old('a_overtime_with_night_differential_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_special_holiday_rest_day" id="a_overtime_with_night_differential_special_holiday_rest_day" value="{{ old('a_overtime_with_night_differential_special_holiday_rest_day') }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_legal_holiday" id="a_overtime_with_night_differential_legal_holiday" value="{{ old('a_overtime_with_night_differential_legal_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_legal_holiday_rest_day" id="a_overtime_with_night_differential_legal_holiday_rest_day" value="{{ old('a_overtime_with_night_differential_legal_holiday_rest_day') }}" readonly>
                            </div>  
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_double_pay" id="a_overtime_with_night_differential_double_pay" value="{{ old('a_overtime_with_night_differential_double_pay') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="a_overtime_with_night_differential_double_pay_rest_day" id="a_overtime_with_night_differential_double_pay_rest_day" value="{{ old('a_overtime_with_night_differential_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>
                        
                        <!-- rows ends here -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="ModalButton">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
        
        <!-- new modal for adding rate card ends here -->


    <!-- new code button starts here -->
    <div class="modal fade" id="ratecardModal" name ="ratecardModal" tabindex="-1" role="dialog"  aria-labelledby="ratecardModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="ratecardModalLabel">Update Rate Card</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('treasury.rate-card-list.update-ratecard') }}" method="POST">
                        @csrf
                        @if (session('create-failed'))
                        <div style="background-color:rgba(255,255,255,0)" class="alert alert-danger">
                            <ul>
                                @foreach ($error->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- rows starts here -->
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Region *</label>
                                <select type="text" class="form-select" id="u_region" name = "u_region" value="{{ old('u_region') }}" required>
                                <option  value="">---Select Region---</option>
                                    <option  value="Region 1" @if(old('u_region') == "Region 1") {{'selected'}} @endif>Region 1</option>
                                    <option  value="Region 2" @if(old('u_region') == "Region 2") {{'selected'}} @endif>Region 2</option>
                                    <option  value="Region 3" @if(old('u_region') == "Region 3") {{'selected'}} @endif>Region 3</option>
                                    <option  value="Region 4" @if(old('u_region') == "Region 4") {{'selected'}} @endif>Region 4</option>
                                    <option  value="Region 5" @if(old('u_region') == "Region 5") {{'selected'}} @endif>Region 5</option>
                                    <option  value="Region 6" @if(old('u_region') == "Region 6") {{'selected'}} @endif>Region 6</option>
                                    <option  value="Region 7" @if(old('u_region') == "Region 7") {{'selected'}} @endif>Region 7</option>
                                    <option  value="Region 8" @if(old('u_region') == "Region 8") {{'selected'}} @endif>Region 8</option>
                                    <option  value="Region 9" @if(old('u_region') == "Region 9") {{'selected'}} @endif>Region 9</option>
                                    <option  value="Region 10" @if(old('u_region') == "Region 10") {{'selected'}} @endif>Region 10</option>
                                    <option  value="Region 11" @if(old('u_region') == "Region 11") {{'selected'}} @endif>Region 11</option>
                                    <option  value="Region 12" @if(old('u_region') == "Region 12") {{'selected'}} @endif>Region 12</option>
                                    <option  value="Region 13" @if(old('u_region') == "Region 13") {{'selected'}} @endif>Region 13</option>
                                    <option  value="NCR" @if(old('u_region') == "NCR") {{'selected'}} @endif>NCR</option>
                                    <option  value="MIMAROPA" @if(old('u_region') == "MIMAROPA") {{'selected'}} @endif>MIMAROPA</option>
                                    <option  value="CAR" @if(old('u_region') == "CAR") {{'selected'}} @endif>CAR</option>
                                    <option  value="BARMM" @if(old('u_region') == "BARMM") {{'selected'}} @endif>BARMM</option>
                                </select>
                            </div>

                            <!-- <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Rate Type *</label>
                                <select type="text" class="form-select" id="u_rate_type" name = "u_rate_type" value="{{ old('u_rate_type') }}" required>
                                <option  value="">---Select Rate Type---</option>
                                    <option  value="Special Rate" @if(old('u_rate_type') == "Special Rate") {{'selected'}} @endif>Special Rate</option>
                                    <option  value="OverTime" @if(old('u_rate_type') == "OverTime") {{'selected'}} @endif>OverTime</option>
                                    <option  value="Night Differential" @if(old('u_rate_type') == "Night Differential") {{'selected'}} @endif>Night Differential</option>
                                    <option  value="OverTime with Night Differential" @if(old('u_rate_type') == "OverTime with Night Diffetial") {{'selected'}} @endif>OverTime with Night Differential</option>
                                </select>
                            </div> -->

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Rate Per Day *</label>
                                <input type="text" class="form-control" name="u_rate_per_day" id="u_rate_per_day" value="{{ old('u_rate_per_day') }}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Rate Per Hour *</label>
                                <input type="text" class="form-control" name="u_rate_per_hour" id="u_rate_per_hour" value="{{ old('u_rate_per_hour') }}" required>
                            </div>
                        </div>

                        <!-- Special rate starts here -->
                        <hr class="w-100">
                        <h6>Special Rate :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="u_special_rates_special_holiday" id="u_special_rates_special_holiday" value="{{ old('u_special_rates_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="u_special_rates_wdo" id="u_special_rates_wdo" value="{{ old('u_special_rates_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_special_rates_special_holiday_rest_day" id="u_special_rates_special_holiday_rest_day" value="{{ old('u_special_rates_special_holiday_rest_day') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="u_special_rates_legal_holiday" id="u_special_rates_legal_holiday" value="{{ old('u_special_rates_legal_holiday') }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_special_rates_legal_holiday_rest_day" id="u_special_rates_legal_holiday_rest_day" value="{{ old('u_special_rates_legal_holiday_rest_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="u_special_rates_double_pay" id="u_special_rates_double_pay" value="{{ old('u_special_rates_double_pay') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="u_special_rates_double_pay_rest_day" id="u_special_rates_double_pay_rest_day" value="{{ old('u_special_rates_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <!-- overtime starts here -->
                        <hr class="w-100">
                        <h6>Overtime :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Regular Day *</label>
                                <input type="text" class="form-control" name="u_overtime_special_regular_day" id="u_overtime_regular_day" value="{{ old('u_overtime_regular_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="u_overtime_special_holiday" id="u_overtime_special_holiday" value="{{ old('u_overtime_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="u_overtime_wdo" id="u_overtime_wdo" value="{{ old('u_overtime_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_overtime_special_holiday_rest_day" id="u_overtime_special_holiday_rest_day" value="{{ old('u_overtime_special_holiday_rest_day') }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="u_overtime_legal_holiday" id="u_overtime_legal_holiday" value="{{ old('u_overtime_legal_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_overtime_legal_holiday_rest_day" id="u_overtime_legal_holiday_rest_day" value="{{ old('u_overtime_legal_holiday_rest_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="u_overtime_double_pay" id="u_overtime_double_pay" value="{{ old('u_overtime_double_pay') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="u_overtime_double_pay_rest_day" id="u_overtime_double_pay_rest_day" value="{{ old('u_overtime_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <!-- night differential starts here -->
                        <hr class="w-100">
                        <h6>Night Differential :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Regular Rate *</label>
                                <input type="text" class="form-control" name="u_night_differential_regular_day" id="u_night_differential_regular_day" value="{{ old('u_night_differential_regular_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="u_night_differential_special_holiday" id="u_night_differential_special_holiday" value="{{ old('u_night_differential_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="u_night_differential_wdo" id="u_night_differential_wdo" value="{{ old('u_night_differential_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_night_differential_special_holiday_rest_day" id="u_night_differential_special_holiday_rest_day" value="{{ old('u_night_differential_special_holiday_rest_day') }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="u_night_differential_legal_holiday" id="u_night_differential_legal_holiday" value="{{ old('u_night_differential_legal_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_night_differential_legal_holiday_rest_day" id="u_night_differential_legal_holiday_rest_day" value="{{ old('u_night_differential_legal_holiday_rest_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="u_night_differential_double_pay" id="u_night_differential_double_pay" value="{{ old('u_night_differential_double_pay') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="u_night_differential_double_pay_rest_day" id="u_night_differential_double_pay_rest_day" value="{{ old('u_night_differential_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <!-- overtime with night differential starts here -->
                        <hr class="w-100">
                        <h6>Night Differential with :</h6>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Regular Day *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_regular_day" id="u_overtime_with_night_differential_regular_day" value="{{ old('u_overtime_with_night_differential_regular_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_special_holiday" id="u_overtime_with_night_differential_special_holiday" value="{{ old('u_overtime_with_night_differential_special_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">WDO *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_wdo" id="u_overtime_with_night_differential_wdo" value="{{ old('u_overtime_with_night_differential_wdo') }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Special Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_special_holiday_rest_day" id="u_overtime_with_night_differential_special_holiday_rest_day" value="{{ old('u_overtime_with_night_differential_special_holiday_rest_day') }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_legal_holiday" id="u_overtime_with_night_differential_legal_holiday" value="{{ old('u_overtime_with_night_differential_legal_holiday') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Legal Holiday Rest Day *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_legal_holiday_rest_day" id="u_overtime_with_night_differential_legal_holiday_rest_day" value="{{ old('u_overtime_with_night_differential_legal_holiday_rest_day') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_double_pay" id="u_overtime_with_night_differential_double_pay" value="{{ old('u_overtime_with_night_differential_double_pay') }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Double Pay Rest Day *</label>
                                <input type="text" class="form-control" name="u_overtime_with_night_differential_double_pay_rest_day" id="u_overtime_with_night_differential_double_pay_rest_day" value="{{ old('u_overtime_with_night_differential_double_pay_rest_day') }}" readonly>
                            </div>
                        </div>

                        <!-- rows ends here -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="add">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- new code action modal ends here -->


    <!-- new code view details starts here -->
    <div class="modal fade"  id="viewratecardModal" name = "viewratecardModal" tabindex="-1" role="dialog" aria-labelledby="viewratecardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 40%;  margin: 1.75rem auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="viewratecardModalTitle">View Rate Card Details</h5>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Region:</label>
                            <p class="h6" name="v_region" id="v_region" name="v_region"></p>
                        </div>
                        <!-- <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Rate Type:</label>
                            <p class="h6" name="v_rate_type" id="v_rate_type" name="v_rate_type"></p>
                        </div> -->
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Rate Per Day:</label>
                            <p class="h6" name="v_rate_per_day" id="v_rate_per_day" name="v_rate_per_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Rate Per Hour:</label>
                            <p class="h6" name="v_rate_per_hour" id="v_rate_per_hour" name="v_rate_per_hour"></p>
                        </div>
                    </div>    

                    <!-- special rate starts here -->
                    <hr class="w-100 mt-3 mb-1">
                    <h6 class="mt-3">SPECIAL RATE</h6>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday:</label>
                            <p class="h6" name="v_special_rates_special_holiday" id="v_special_rates_special_holiday" name="v_special_rates_special_holiday"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">WDO:</label>
                            <p class="h6" name="v_special_rates_wdo" id="v_special_rates_wdo" name="v_special_rates_wdo"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday Rest Day:</label>
                            <p class="h6" name="v_special_rates_special_holiday_rest_day" id="v_special_rates_special_holiday_rest_day" name="v_special_rates_special_holiday_rest_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday:</label>
                            <p class="h6" name="v_special_rates_legal_holiday" id="v_special_rates_legal_holiday" name="v_special_rates_legal_holiday"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday Rest Day:</label>
                            <p class="h6" name="v_special_rates_legal_holiday_rest_day" id="v_special_rates_legal_holiday_rest_day" name="v_special_rates_legal_rest_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay:</label>
                            <p class="h6" name="v_special_rates_double_pay" id="v_special_rates_double_pay" name="v_special_rates_double_pay"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay Rest Day:</label>
                            <p class="h6" name="v_special_rates_double_pay_rest_day" id="v_special_rates_double_pay_rest_day" name="v_special_rates_double_pay_rest_day"></p>
                        </div>
                    </div>                          

                    <!-- overtime starts here -->
                    <hr class="w-100 mt-3 mb-1">
                    <h6 class="mt-3">OVERTIME</h6>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Regular Day:</label>
                            <p class="h6" name="v_overtime_regular_day" id="v_overtime_regular_day" name="v_overtime_regular_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday:</label>
                            <p class="h6" name="v_overtime_special_holiday" id="v_overtime_special_holiday" name="v_overtime_special_holiday"></p>
                        </div>
                    
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">WDO:</label>
                            <p class="h6" name="v_overtime_wdo" id="v_overtime_wdo" name="v_overtime_wdo"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday Rest Day:</label>
                            <p class="h6" name="v_overtime_special_holiday_rest_day" id="v_overtime_special_holiday_rest_day" name="v_overtime_special_holiday_rest_day"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday:</label>
                            <p class="h6" name="v_overtime_legal_holiday" id="v_overtime_legal_holiday" name="v_overtime_legal_holiday"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday Rest Day:</label>
                            <p class="h6" name="v_overtime0_legal_holiday_rest_day" id="v_overtime_legal_holiday_rest_day" name="v_overtime_legal_holiday_rest_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay:</label>
                            <p class="h6" name="v_overtime_double_pay" id="v_overtime_double_pay" name="v_overtime_double_pay"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay Rest Day:</label>
                            <p class="h6" name="v_overtime_double_pay_rest_day" id="v_overtime_double_pay_rest_day" name="v_overtime_double_pay_rest_day"></p>
                        </div>
                    </div>
                    
                    <!-- night differential starts here -->                 
                    <hr class="w-100 mt-3 mb-1">
                    <h6 class="mt-3">NIGHT DIFFERENTIAL</h6>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Regular Day:</label>
                            <p class="h6" name="v_night_differential_regular_day" id="v_night_differential_regular_day" name="v_night_differential_regular_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday:</label>
                            <p class="h6" name="v_night_differential_special_holiday" id="v_night_differential_special_holiday" name="v_night_differential_special_holiday"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">WDO:</label>
                            <p class="h6" name="v_night_differential_wdo" id="v_night_differential_wdo" name="v_night_differential_wdo"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday Rest Day:</label>
                            <p class="h6" name="v_night_differential_special_holiday_rest_day" id="v_night_differential_special_holiday_rest_day" name="v_night_differential_special_holiday_rest_day"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday:</label>
                            <p class="h6" name="v_night_differential_legal_holiday" id="v_night_differential_legal_holiday" name="v_night_differential_legal_holiday"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday Rest Day:</label>
                            <p class="h6" name="v_night_differential_legal_holiday_rest_day" id="v_night_differential_legal_holiday_rest_day" name="v_night_differential_holiday_rest_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay:</label>
                            <p class="h6" name="v_night_differential_double_pay" id="v_night_differential_double_pay" name="v_night_differential_double_pay"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay Rest Day:</label>
                            <p class="h6" name="v_night_differential_double_pay_rest_day" id="v_night_differential_double_pay_rest_day" name="v_night_differential_double_pay_rest_day"></p>
                        </div>
                    </div>

                    <!-- overtime with night diffential starts here -->
                    <hr class="w-100 mt-3 mb-1">
                    <h6 class="mt-3">OVERTIME WITH NIGHT DIFFERENTIAL</h6>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Regular Day:</label>
                            <p class="h6" name="v_overtime_with_night_differential_regular_day" id="v_overtime_with_night_differential_regular_day" name="v_overtime_with_night_differential_regular_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday:</label>
                            <p class="h6" name="v_overtime_with_night_differential_special_holiday" id="v_overtime_with_night_differential_special_holiday" name="v_overtime_with_night_differential_special_holiday"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">WDO:</label>
                            <p class="h6" name="v_overtime_with_night_differential_wdo" id="v_overtime_with_night_differential_wdo" name="v_overtime_with_night_differential_wdo"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Special Holiday Rest Day:</label>
                            <p class="h6" name="v_overtime_with_night_differential_special_holiday_rest_day" id="v_overtime_with_night_differential_special_holiday_rest_day" name="v_overtime_with_night_differential_special_holiday_rest_day"></p>
                        </div>
                    </div>    

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday:</label>
                            <p class="h6" name="v_overtime_with_night_differential_legal_holiday" id="v_overtime_with_night_differential_legal_holiday" name="v_overtime_with_night_differential_legal_holiday"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Legal Holiday Rest Day:</label>
                            <p class="h6" name="v_overtime_with_night_differential_legal_holiday_rest_day" id="v_overtime_with_night_differential_legal_holiday_rest_day" name="v_overtime_with_night_differential_legal_holiday_rest_day"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay:</label>
                            <p class="h6" name="v_overtime_with_night_differential_double_pay" id="v_overtime_with_night_differential_double_pay" name="v_overtime_with_night_differential_double_pay"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Double Pay Rest Day:</label>
                            <p class="h6" name="v_overtime_with_night_differential_double_pay_rest_day" id="v_overtime_with_night_differential_double_pay_rest_day" name="v_overtime_with_night_differential_double_pay_rest_day"></p>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="view">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- new code view details ends here -->




            </div>
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->

   



    
    <script src="/asset/user/js/bootstrap.bundle.min.js"></script>

    <script src="/asset/user/js/jquery.min.js"></script>

    <script src="/asset/user/js/script.js"></script>


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- new cdn link added ends here -->
    @include('sweetalert::alert')


    <script>
        $(document).ready(function(){
            var dataTable = $('#tabletwo').DataTable({
                ajax: {
                    url: '/treasury/rate-card-list/fetch-data',
                    dataSrc: 'datadata'
                },
                columns: [
                    { data: '#' },
                    { data: 'id', visible: false },
                    { data: 'region' },
                    // { data: 'rate_type' },
                    { data: 'rate_per_day' },
                    { data: 'rate_per_hour' },
                    // { data: 'special_holiday' visible: false },
                    // { data: 'wdo' visible: false },
                    // { data: 'special_holiday_rest_day' visible: false },
                    // { data: 'legal_holiday' visible: false },
                    // { data: 'legal_holiday_rest_day' visible: false },
                    // { data: 'double_pay' visible: false },
                    // { data: 'double_pay_rest_day' },                    
                    { data: 'actions', orderable: false }
                ]
            });


            
        $("#addratecardModalButton").click(function(){
            console.log("yes");
            $("#addratecardModal").modal('show');
        });    
        $('#ModalButton').click(function() {
            $('#addratecardModal').modal('hide');
        });
            
        
        // add rate card Modal fetch function starts here

       

        // add rate card modal fetch functions ends here
        
        // modal clicking funtion stars here+
        $('#view').click(function() {
            $('#viewratecardModal').modal('hide');
        });

        $('#tabletwo tbody').on('click', 'img.button-image1', function (e) {
        e.preventDefault();

        console.log("test");
        
        $('#viewratecardModal').modal('show');
      
            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;
            $.ajax({
            url: '/treasury/rate-card/list/retrieve-view/' + id ,
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // new code added starts here
            success: function(response){
                //response = Json.parse(response);
                
                //special rate
                $('#v_region').text(response.region);
                // $('#v_rate_type').text(response.rate_type);
                $('#v_rate_per_day').text(response.rate_per_day);
                $('#v_rate_per_hour').text(response.rate_per_hour);
                $('#v_special_rates_special_holiday').text(response.special_rate_special_holiday);
                $('#v_special_rates_wdo').text(response.special_rate_wdo);
                $('#v_special_rates_special_holiday_rest_day').text(response.special_rate_special_holiday_rest_day);
                $('#v_special_rates_legal_holiday').text(response.special_rate_legal_holiday);
                $('#v_special_rates_legal_holiday_rest_day').text(response.special_rate_legal_holiday_rest_day);
                $('#v_special_rates_double_pay').text(response.special_rate_double_pay);
                $('#v_special_rates_double_pay_rest_day').text(response.special_rate_double_pay_rest_day);


                //overtime starts here

                // $('#v_region').text(response.region);
                // $('#v_rate_type').text(response.rate_type);
                // $('#v_rate_per_day').text(response.rate_per_day);
                // $('#v_rate_per_hour').text(response.rate_per_hour);
                $('#v_overtime_regular_day').text(response.overtime_regular_day);
                $('#v_overtime_special_holiday').text(response.overtime_special_holiday);
                $('#v_overtime_wdo').text(response.overtime_wdo);
                $('#v_overtime_special_holiday_rest_day').text(response.overtime_special_holiday_rest_day);
                $('#v_overtime_legal_holiday').text(response.overtime_legal_holiday);
                $('#v_overtime_legal_holiday_rest_day').text(response.overtime_legal_holiday_rest_day);
                $('#v_overtime_double_pay').text(response.overtime_double_pay);
                $('#v_overtime_double_pay_rest_day').text(response.overtime_double_pay_rest_day);


                //night differential starts here 

                // $('#v_region').text(response.region);
                // $('#v_rate_type').text(response.rate_type);
                // $('#v_rate_per_day').text(response.rate_per_day);
                // $('#v_rate_per_hour').text(response.rate_per_hour);
                $('#v_night_differential_regular_day').text(response.night_differential_regular_day);
                $('#v_night_differential_special_holiday').text(response.night_differential_special_holiday);
                $('#v_night_differential_wdo').text(response.night_differential_wdo);
                $('#v_night_differential_special_holiday_rest_day').text(response.night_differential_special_holiday_rest_day);
                $('#v_night_differential_legal_holiday').text(response.night_differential_legal_holiday);
                $('#v_night_differential_legal_holiday_rest_day').text(response.night_differential_legal_holiday_rest_day);
                $('#v_night_differential_double_pay').text(response.night_differential_double_pay);
                $('#v_night_differential_double_pay_rest_day').text(response.night_differential_double_pay_rest_day);
                

                //overtime with night differential start here

                // $('#v_region').text(response.region);
                // $('#v_rate_type').text(response.rate_type);
                // $('#v_rate_per_day').text(response.rate_per_day);
                // $('#v_rate_per_hour').text(response.rate_per_hour);
                $('#v_overtime_with_night_differential_regular_day').text(response.overtime_with_night_differential_regular_day);
                $('#v_overtime_with_night_differential_special_holiday').text(response.overtime_with_night_differential_special_holiday);
                $('#v_overtime_with_night_differential_wdo').text(response.overtime_with_night_differential_wdo);
                $('#v_overtime_with_night_differential_special_holiday_rest_day').text(response.overtime_with_night_differential_special_holiday_rest_day);
                $('#v_overtime_with_night_differential_legal_holiday').text(response.overtime_with_night_differential_legal_holiday);
                $('#v_overtime_with_night_differential_legal_holiday_rest_day').text(response.overtime_with_night_differential_legal_holiday_rest_day);
                $('#v_overtime_with_night_differential_double_pay').text(response.overtime_with_night_differential_double_pay);
                $('#v_overtime_with_night_differential_double_pay_rest_day').text(response.overtime_with_night_differential_double_pay_rest_day);

                

            }   

           
            })
        });
      
   

  


    // modal clicking functions ends here

    $('#add').click(function() {
            $('#ratecardModal').modal('hide');
        });
    // addratecard modal starts here
    $('#tabletwo tbody').on('click', 'img.button-image2', function (e) {
        e.preventDefault();

        $('#ratecardModal').modal('show');
        
        console.log("test11");


        

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;
            $.ajax({
                
            url: '/treasury/rate-card/list/retrieve-view/' + id ,
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },  
            // new code added starts here
            success: function(response){
                //response = Json.parse(response);

                $('#u_region').val(response.region);
                // $('#u_rate_type').val(response.rate_type);
                $('#u_rate_per_day').val(response.rate_per_day);
                $('#u_rate_per_hour').val(response.rate_per_hour);
                
                // special rate
                $('#u_special_rates_special_holiday').val(response.special_rate_special_holiday);
                $('#u_special_rates_wdo').val(response.special_rate_wdo);
                $('#u_special_rates_special_holiday_rest_day').val(response.special_rate_special_holiday_rest_day);
                $('#u_special_rates_legal_holiday').val(response.special_rate_legal_holiday);
                $('#u_special_rates_legal_holiday_rest_day').val(response.special_rate_legal_holiday_rest_day);
                $('#u_special_rates_double_pay').val(response.special_rate_double_pay);
                $('#u_special_rates_double_pay_rest_day').val(response.special_rate_double_pay_rest_day);

                // overtime
                $('#u_overtime_regular_day').val(response.overtime_regular_day);
                $('#u_overtime_special_holiday').val(response.overtime_special_holiday);
                $('#u_overtime_wdo').val(response.overtime_wdo);
                $('#u_overtime_special_holiday_rest_day').val(response.overtime_special_holiday_rest_day);
                $('#u_overtime_legal_holiday').val(response.overtime_legal_holiday);
                $('#u_overtime_legal_holiday_rest_day').val(response.overtime_legal_holiday_rest_day);
                $('#u_overtime_double_pay').val(response.overtime_double_pay);
                $('#u_overtime_double_pay_rest_day').val(response.overtime_double_pay_rest_day);

                // night differential
                $('#u_night_differential_regular_day').val(response.night_differential_regular_day);
                $('#u_night_differential_special_holiday').val(response.night_differential_special_holiday);
                $('#u_night_differential_wdo').val(response.night_differential_wdo);
                $('#u_night_differential_special_holiday_rest_day').val(response.night_differential_special_holiday_rest_day);
                $('#u_night_differential_legal_holiday').val(response.night_differential_legal_holiday);
                $('#u_night_differential_legal_holiday_rest_day').val(response.night_differential_legal_holiday_rest_day);
                $('#u_night_differential_double_pay').val(response.night_differential_double_pay);
                $('#u_night_differential_double_pay_rest_day').val(response.night_differential_double_pay_rest_day);

                // overtime with night differential
                $('#u_overtime_with_night_differential_regular_day').val(response.overtime_with_night_differential_regular_day);
                $('#u_overtime_with_night_differential_special_holiday').val(response.overtime_with_night_differential_special_holiday);
                $('#u_overtime_with_night_differential_wdo').val(response.overtime_with_night_differential_wdo);
                $('#u_overtime_with_night_differential_special_holiday_rest_day').val(response.overtime_with_night_differential_special_holiday_rest_day);
                $('#u_overtime_with_night_differential_legal_holiday').val(response.overtime_with_night_differential_legal_holiday);
                $('#u_overtime_with_night_differential_legal_holiday_rest_day').val(response.overtime_with_night_differential_legal_holiday_rest_day);
                $('#u_overtime_with_night_differential_double_pay').val(response.overtime_with_night_differential_double_pay);
                $('#u_overtime_with_night_differential_double_pay_rest_day').val(response.overtime_with_night_differential_double_pay_rest_day);


            }

        })
        });

        // rate type automation starts here

       
        $('#u_rate_per_day').on("change keyup paste", function(){
             
            let ratePerDay = $(this).val();
            console.log('test', ratePerDay);
            var ratePerHour = ratePerDay / 8;
            console.log('rate per hr' , ratePerHour);
            
            // Special Rate
            var special_rate_specialHoliday = ( ratePerDay * 1.3 * 1.1 ) / 8;
            var special_rate_wDo = ( ratePerDay * 1.3 ) /8;
            var special_rate_specialHolidayRestDay = ( ratePerDay * 1.5 ) / 8;
            var special_rate_legalHoliday = ratePerDay / 8;
            var special_rate_legalHolidayRestDay = ( ratePerDay * 1.6 ) / 8;
            var special_rate_doublePay = ( ratePerDay * 2 ) / 8;
            var special_rate_doublePayRestDay = ( ratePerDay * 2.9 ) / 8;
            // Over Time
            var overtime_ratePerHour = ( ratePerDay * 1.25 ) / 8;
            var overtime_regularDay = ( ratePerDay * 1.25 ) / 8;
            var overtime_specialHoliday = ( ratePerDay * 1.3 ) / 8 * 1.3;
            var overtime_wDo = (( ratePerDay * 1.3 ) / 8 * 1.3); 
            var overtime_specialHolidayRestDay = (( ratePerDay * 1.5 ) / 8 * 1.3);
            var overtime_legalHoliday = (( ratePerDay / 8 ) * 1.3 );
            var overtime_legalHolidayRestDay = (( ratePerDay * 1.6 ) / 8 * 1.3 );
            var overtime_doublePay = (( ratePerDay * 2 ) / 8 * 1.3 );
            var overtime_doublePayRestDay = (( ratePerDay * 2.9 ) / 8 * 1.3);
            // Night Differential
            var night_Differential_ratePerHour = ( ratePerDay / 8 ) * .1;
            var night_Differential_regularDay = (ratePerDay / 8 ) * .1 ;
            var night_Differential_specialHoliday = (( ratePerDay * 1.3 ) / 8 * .1);
            var night_Differential_wDo = ( ratePerDay * 1.3 ) / 8 * .1 ; 
            var night_Differential_rate_specialHolidayRestDay = ( ratePerDay * 1.5 ) / 8 * .1;
            var night_Differential_legalHoliday = ( ratePerDay / 8 ) * .1;
            var night_Differential_legalHolidayRestDay = ( ratePerDay * 1.6 ) / 8 * .1;
            var night_Differential_doublePay = ( ratePerDay * 2 ) / 8 * .1; 
            var night_Differential_doublePayRestDay = ( ratePerDay * 2.9 ) / 8 * .1;
            // Over Time with Night Differential
            var overTime_With_Night_Differential_ratePerHour = ( ratePerDay * 1.25 ) / 8 * .1;
            var overTime_With_Night_Differential_regularDay = (ratePerDay * 1.25 ) / 8 * .1;
            var overTime_With_Night_Differential_specialHoliday =  (( ratePerDay * 1.3 ) / 8 ) * 1.3 * .1 ;
            var overTime_With_Night_Differential_wDo = (( ratePerDay * 1.3 ) / 8) * 1.3 * .1; 
            var overTime_With_Night_Differential_specialHolidayRestDay = (( ratePerDay * 1.5 ) / 8) * 1.3 * .1 ;
            var overTime_With_Night_Differential_legalHoliday = (( ratePerDay / 8) * 1.3 ) * .1;
            var overTime_With_Night_Differential_legalHolidayRestDay = (( ratePerDay * 1.6 ) / 8 * 1.3 ) * .1 ;
            var overTime_With_Night_Differential_doublePay = (( ratePerDay * 2 ) / 8 * 1.3 ) * .1 ;
            var overTime_With_Night_Differential_special_rate_ratePerHour = doublePayRestDay =  (( ratePerDay * 2.9)/ 8 * 1.3 ) * .1;

            // special rate
            $('#u_rate_per_hour').val(ratePerHour.toFixed(2));
            $('#u_special_rates_special_holiday').val(special_rate_specialHoliday.toFixed(2));
            $('#u_special_rates_wdo').val(special_rate_wDo.toFixed(2));      
            $('#u_special_rates_special_holiday_rest_day').val(special_rate_specialHolidayRestDay.toFixed(2));
            $('#u_special_rates_legal_holiday').val(special_rate_legalHoliday.toFixed(2));
            $('#u_special_rates_legal_holiday_rest_day').val(special_rate_legalHolidayRestDay.toFixed(2));     
            $('#u_special_rates_double_pay').val(special_rate_doublePay.toFixed(2));
            $('#u_special_rates_double_pay_rest_day').val(special_rate_doublePayRestDay.toFixed(2));
            // overtime
            $('#u_overtime_rate_per_hour').val(overtime_ratePerHour.toFixed(2));
            $('#u_overtime_regular_day').val(overtime_regularDay.toFixed(2));
            $('#u_overtime_special_holiday').val(overtime_specialHoliday.toFixed(2));
            $('#u_overtime_wdo').val(overtime_wDo.toFixed(2));      
            $('#u_overtime_special_holiday_rest_day').val(overtime_specialHolidayRestDay.toFixed(2));
            $('#u_overtime_legal_holiday').val(overtime_legalHoliday.toFixed(2));
            $('#u_overtime_legal_holiday_rest_day').val(overtime_legalHolidayRestDay.toFixed(2));     
            $('#u_overtime_double_pay').val(overtime_doublePay.toFixed(2));
            $('#u_overtime_double_pay_rest_day').val(overtime_doublePayRestDay.toFixed(2));
            // night differential
            $('#u_night_differential_rate_per_hour').val(night_Differential_ratePerHour.toFixed(2));
            $('#u_night_differential_regular_day').val(night_Differential_regularDay.toFixed(2));
            $('#u_night_differential_special_holiday').val(night_Differential_specialHoliday.toFixed(2));
            $('#u_night_differential_wdo').val(night_Differential_wDo.toFixed(2));      
            $('#u_night_differential_special_holiday_rest_day').val(night_Differential_rate_specialHolidayRestDay.toFixed(2));
            $('#u_night_differential_legal_holiday').val(night_Differential_legalHoliday.toFixed(2));
            $('#u_night_differential_legal_holiday_rest_day').val(night_Differential_legalHolidayRestDay.toFixed(2));     
            $('#u_night_differential_double_pay').val(night_Differential_doublePay.toFixed(2));
            $('#u_night_differential_double_pay_rest_day').val(night_Differential_doublePayRestDay.toFixed(2));
            // overtime with night differential
            $('#u_overtime_with_night_differential_rate_per_hour').val(overTime_With_Night_Differential_ratePerHour.toFixed(2));
            $('#u_overtime_with_night_differential_regular_day').val(overTime_With_Night_Differential_regularDay.toFixed(2));
            $('#u_overtime_with_night_differential_special_holiday').val(overTime_With_Night_Differential_specialHoliday.toFixed(2));
            $('#u_overtime_with_night_differential_wdo').val(overTime_With_Night_Differential_wDo.toFixed(2));      
            $('#u_overtime_with_night_differential_special_holiday_rest_day').val(overTime_With_Night_Differential_specialHolidayRestDay.toFixed(2));
            $('#u_overtime_with_night_differential_legal_holiday').val(overTime_With_Night_Differential_legalHoliday.toFixed(2));
            $('#u_overtime_with_night_differential_legal_holiday_rest_day').val(overTime_With_Night_Differential_legalHolidayRestDay.toFixed(2));     
            $('#u_overtime_with_night_differential_double_pay').val(overTime_With_Night_Differential_doublePay.toFixed(2));
            $('#u_overtime_with_night_differential_double_pay_rest_day').val(overTime_With_Night_Differential_special_rate_ratePerHour.toFixed(2));
          

            // var ratePerDay = 610;
            // $('#a_rate_per_day').val(ratePerDay);

            
            // var ratePerHour = ratePerDay / 8;
            // $('#a_rate_per_hour').val(ratePerHour.toFixed(2)); 
                })

       
        //  $('#a_rate_per_day').change(function () {
            
         $('#a_rate_per_day').on("change keyup paste", function(){
            
            
            let ratePerDay = $(this).val();
            console.log('test', ratePerDay);
            var ratePerHour = ratePerDay / 8;
            console.log('rate per hr' , ratePerHour);
            
            // Special Rate
            var special_rate_specialHoliday = ( ratePerDay * 1.3 * 1.1 ) / 8;
            var special_rate_wDo = ( ratePerDay * 1.3 ) /8;
            var special_rate_specialHolidayRestDay = ( ratePerDay * 1.5 ) / 8;
            var special_rate_legalHoliday = ratePerDay / 8;
            var special_rate_legalHolidayRestDay = ( ratePerDay * 1.6 ) / 8;
            var special_rate_doublePay = ( ratePerDay * 2 ) / 8;
            var special_rate_doublePayRestDay = ( ratePerDay * 2.9 ) / 8;
            // Over Time
            var overtime_ratePerHour = ( ratePerDay * 1.25 ) / 8;
            var overtime_regularDay = ( ratePerDay * 1.25 ) / 8;
            var overtime_specialHoliday = ( ratePerDay * 1.3 ) / 8 * 1.3;
            var overtime_wDo = (( ratePerDay * 1.3 ) / 8 * 1.3); 
            var overtime_specialHolidayRestDay = (( ratePerDay * 1.5 ) / 8 * 1.3);
            var overtime_legalHoliday = (( ratePerDay / 8 ) * 1.3 );
            var overtime_legalHolidayRestDay = (( ratePerDay * 1.6 ) / 8 * 1.3 );
            var overtime_doublePay = (( ratePerDay * 2 ) / 8 * 1.3 );
            var overtime_doublePayRestDay = (( ratePerDay * 2.9 ) / 8 * 1.3);
            // Night Differential
            var night_Differential_ratePerHour = ( ratePerDay / 8 ) * .1;
            var night_Differential_regularDay = (ratePerDay / 8 ) * .1 ;
            var night_Differential_specialHoliday = (( ratePerDay * 1.3 ) / 8 * .1);
            var night_Differential_wDo = ( ratePerDay * 1.3 ) / 8 * .1 ; 
            var night_Differential_rate_specialHolidayRestDay = ( ratePerDay * 1.5 ) / 8 * .1;
            var night_Differential_legalHoliday = ( ratePerDay / 8 ) * .1;
            var night_Differential_legalHolidayRestDay = ( ratePerDay * 1.6 ) / 8 * .1;
            var night_Differential_doublePay = ( ratePerDay * 2 ) / 8 * .1; 
            var night_Differential_doublePayRestDay = ( ratePerDay * 2.9 ) / 8 * .1;
            // Over Time with Night Differential
            var overTime_With_Night_Differential_ratePerHour = ( ratePerDay * 1.25 ) / 8 * .1;
            var overTime_With_Night_Differential_regularDay = (ratePerDay * 1.25 ) / 8 * .1;
            var overTime_With_Night_Differential_specialHoliday =  (( ratePerDay * 1.3 ) / 8 ) * 1.3 * .1 ;
            var overTime_With_Night_Differential_wDo = (( ratePerDay * 1.3 ) / 8) * 1.3 * .1; 
            var overTime_With_Night_Differential_specialHolidayRestDay = (( ratePerDay * 1.5 ) / 8) * 1.3 * .1 ;
            var overTime_With_Night_Differential_legalHoliday = (( ratePerDay / 8) * 1.3 ) * .1;
            var overTime_With_Night_Differential_legalHolidayRestDay = (( ratePerDay * 1.6 ) / 8 * 1.3 ) * .1 ;
            var overTime_With_Night_Differential_doublePay = (( ratePerDay * 2 ) / 8 * 1.3 ) * .1 ;
            var overTime_With_Night_Differential_special_rate_ratePerHour = doublePayRestDay =  (( ratePerDay * 2.9)/ 8 * 1.3 ) * .1;

            
            $('#a_rate_per_hour').val(ratePerHour.toFixed(2));
            $('#a_special_rates_special_holiday').val(special_rate_specialHoliday.toFixed(2));
            $('#a_special_rates_wdo').val(special_rate_wDo.toFixed(2));      
            $('#a_special_rates_special_holiday_rest_day').val(special_rate_specialHolidayRestDay.toFixed(2));
            $('#a_special_rates_legal_holiday').val(special_rate_legalHoliday.toFixed(2));
            $('#a_special_rates_legal_holiday_rest_day').val(special_rate_legalHolidayRestDay.toFixed(2));     
            $('#a_special_rates_double_pay').val(special_rate_doublePay.toFixed(2));
            $('#a_special_rates_double_pay_rest_day').val(special_rate_doublePayRestDay.toFixed(2));

            $('#a_overtime_rate_per_hour').val(overtime_ratePerHour.toFixed(2));
            $('#a_overtime_regular_day').val(overtime_regularDay.toFixed(2));
            $('#a_overtime_special_holiday').val(overtime_specialHoliday.toFixed(2));
            $('#a_overtime_wdo').val(overtime_wDo.toFixed(2));      
            $('#a_overtime_special_holiday_rest_day').val(overtime_specialHolidayRestDay.toFixed(2));
            $('#a_overtime_legal_holiday').val(overtime_legalHoliday.toFixed(2));
            $('#a_overtime_legal_holiday_rest_day').val(overtime_legalHolidayRestDay.toFixed(2));     
            $('#a_overtime_double_pay').val(overtime_doublePay.toFixed(2));
            $('#a_overtime_double_pay_rest_day').val(overtime_doublePayRestDay.toFixed(2));

            $('#a_night_differential_rate_per_hour').val(night_Differential_ratePerHour.toFixed(2));
            $('#a_night_differential_regular_day').val(night_Differential_regularDay.toFixed(2));
            $('#a_night_differential_special_holiday').val(night_Differential_specialHoliday.toFixed(2));
            $('#a_night_differential_wdo').val(night_Differential_wDo.toFixed(2));      
            $('#a_night_differential_special_holiday_rest_day').val(night_Differential_rate_specialHolidayRestDay.toFixed(2));
            $('#a_night_differential_legal_holiday').val(night_Differential_legalHoliday.toFixed(2));
            $('#a_night_differential_legal_holiday_rest_day').val(night_Differential_legalHolidayRestDay.toFixed(2));     
            $('#a_night_differential_double_pay').val(night_Differential_doublePay.toFixed(2));
            $('#a_night_differential_double_pay_rest_day').val(night_Differential_doublePayRestDay.toFixed(2));

            $('#a_overtime_with_night_differential_rate_per_hour').val(overTime_With_Night_Differential_ratePerHour.toFixed(2));
            $('#a_overtime_with_night_differential_regular_day').val(overTime_With_Night_Differential_regularDay.toFixed(2));
            $('#a_overtime_with_night_differential_special_holiday').val(overTime_With_Night_Differential_specialHoliday.toFixed(2));
            $('#a_overtime_with_night_differential_wdo').val(overTime_With_Night_Differential_wDo.toFixed(2));      
            $('#a_overtime_with_night_differential_special_holiday_rest_day').val(overTime_With_Night_Differential_specialHolidayRestDay.toFixed(2));
            $('#a_overtime_with_night_differential_legal_holiday').val(overTime_With_Night_Differential_legalHoliday.toFixed(2));
            $('#a_overtime_with_night_differential_legal_holiday_rest_day').val(overTime_With_Night_Differential_legalHolidayRestDay.toFixed(2));     
            $('#a_overtime_with_night_differential_double_pay').val(overTime_With_Night_Differential_doublePay.toFixed(2));
            $('#a_overtime_with_night_differential_double_pay_rest_day').val(overTime_With_Night_Differential_special_rate_ratePerHour.toFixed(2));
          

            // var ratePerDay = 610;
            // $('#a_rate_per_day').val(ratePerDay);

            
            // var ratePerHour = ratePerDay / 8;
            // $('#a_rate_per_hour').val(ratePerHour.toFixed(2)); 
                })
         
        // });

    });



        // rate type automation ends here

       
    
    //addratecard modal ends here 

    // add button modal starts here


      

       

    // add button modal ends here


    </script>

</body>

</html>