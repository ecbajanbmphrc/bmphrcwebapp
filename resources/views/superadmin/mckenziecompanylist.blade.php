<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="/asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/user/css/bootstrap.css">
    <link rel="stylesheet" href="/asset/user/css2/superadmin.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- end: CSS -->
    <title>Admin</title>
    <style>
        .button-image1{
    cursor: pointer;
        }
        .button-image2{
    cursor: pointer;
        }
        </style>
</head>

<body>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-dark border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-light fs-4">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item">
                <a href="{{ route('superadmin.view.dashboard') }}">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Dashboard
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item has-dropdown mt-2">
                <a href="#">
                    <i class="ri-user-line sidebar-menu-item-icon"></i>Accounts
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.accountsupervisor') }}">Account Supervisor</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.superadmin') }}">Admin</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.payrollhead') }}">Payroll Head</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('superadmin.view.payrollofficer') }}">Payroll Officer</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.treasury') }}">Treasury</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-building-line sidebar-menu-item-icon mt-2"></i>Clients
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('superadmin.view.efc') }}">EFC</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.mckenzie') }}">MCKENZIE</a>
                    </li>
                    <!-- <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.rfm') }}">RFM</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.magis') }}">MAGIS</a>
                    </li> -->
                </ul>
            </li>
            <li class="sidebar-menu-item mt-2">
                <a href="{{ route('logout') }}">
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
                <h5 class="fw-bold mb-0 me-auto">Client</h5>
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


            <div style="height:2vh;">
            </div>

            <div class="card">
                <div class="card-header" style="height:5vh">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mt-2">MCkenzie Store Lists</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createUserModal" id="hitme" name="hitme">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill mb-1" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                                </svg> ADD
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="mckenzie" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="display:none">ID</th>
                                <th>Account</th>
                                <th>Region</th>
                                <th>Area</th>
                                <th>Store Name</th>
                                <th>Store Address</th>
                                <!-- <th>Coordinator</th>
                                <th>Company</th> -->
                                <!-- <th>Type of Deployment</th> -->
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

          
            <!-- end: Navbar -->
            </div>
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- create user modal -->
    <div class="modal fade" id="createAccountModal" name="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="createAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">New message</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="{{route('superadmin.mckenzie-list.register')}}" method="POST">
                    @csrf
                    @if (session('create-failed'))
                <div style="background-color:rgba(255,255,255,0)" class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

        <div class="row">
            <div class="form-group col-md-6">
                <label for="c_account" class="col-form-label">Account:</label>
                <select class="form-select" id="c_account" name="c_account" >
                <option  value="" >---Select Account---</option>
                    <option  value="AFPCES" @if(old('c_account') == "AFPCES") {{'selected'}} @endif>AFPCES</option>
                    <option  value="ALTA" @if(old('c_account') == "Alta") {{'selected'}} @endif>ALTA</option>
                    <option  value="ALTURAS GROUP" @if(old('c_account') == "ALTURAS GROUP") {{'selected'}} @endif>ALTURAS GROUP</option>
                    <option  value="BOHOL QUALITY STORE" @if(old('c_account') == "BOHOL QUALITY STORE") {{'selected'}} @endif>BOHOL QUALITY STORE</option>
                    <option  value="BUDGET MART" @if(old('c_account') == "BUDGET MART") {{'selected'}} @endif>BUDGET MART</option>
                    <option  value="CASH & CARRY SUPERMARKET" @if(old('c_account') == "CASH & CARRY SUPERMARKET") {{'selected'}} @endif>CASH & CARRY SUPERMARKET</option>
                    <option  value="CLIGAN MART" @if(old('c_account') == "CLIGAN MART") {{'selected'}} @endif>CLIGAN MART</option>
                    <option  value="DIPOLOG FRIENDLY MART INC." @if(old('c_account') == "DIPOLOG FRIENDLY MART INC.") {{'selected'}} @endif>DIPOLOG FRIENDLY MART INC.</option>
                    <option  value="DIVI MART CORP." @if(old('c_account') == "DIVI MART CORP.") {{'selected'}} @endif>DIVI MART CORP.</option>
                    <option  value="EVER SUPERMARKET GROUP" @if(old('c_account') == "EVER SUPERMARKET GROUP") {{'selected'}} @endif>EVER SUPERMARKET GROUP</option>
                    <option  value="FINDS CONVENIENCE STORES INC." @if(old('c_account') == "FINDS CONVENIENCE STORES INC.") {{'selected'}} @endif>FINDS CONVENIENCE STORES INC.</option>
                    <option  value="FISHERFOODS CORPORATION" @if(old('c_account') == "FISHERFOODS CORPORATION") {{'selected'}} @endif>FISHERFOODS CORPORATION</option>
                    <option  value="FORTUNES MART" @if(old('c_account') == "FORTUNES MART") {{'selected'}} @endif>FORTUNES MART</option>
                    <option  value="GAISANO BROTHERS GROUP" @if(old('c_account') == "GAISANO BROTHERS GROUP") {{'selected'}} @endif>GAISANO BROTHERS GROUP</option>
                    <option  value="GAISANO CAPITAL GROUP" @if(old('c_account') == "GAISANO CAPITAL GROUP") {{'selected'}} @endif>GAISANO CAPITAL GROUP</option>
                    <option  value="GAISANO GRAND/SOUTH GROUP" @if(old('c_account') == "GAISANO GRAND/SOUTH GROUP") {{'selected'}} @endif>GAISANO GRAND/SOUTH GROUP</option>
                    <option  value="GAISANO METRO GROUP" @if(old('c_account') == "GAISANO METRO GROUP") {{'selected'}} @endif>GAISANO METRO GROUP</option>
                    <option  value="GARBEZ DIZON S/M" @if(old('c_account') == "GARBEZ DIZON S/M") {{'selected'}} @endif>GARBEZ DIZON S/M</option>
                    <option  value="HILTON MART" @if(old('c_account') == "HILTON MART") {{'selected'}} @endif>HILTON MART</option>
                    <option  value="ISETANN" @if(old('c_account') == "ISETANN") {{'selected'}} @endif>ISETANN</option>
                    <option  value="JENRA INC." @if(old('c_account') == "JENRA INC.") {{'selected'}} @endif>JENRA INC.</option>
                    <option  value="JHONNYS SUPERMARKET" @if(old('c_account') == "JHONNYS SUPERMARKET") {{'selected'}} @endif>JHONNYS SUPERMARKET</option>
                    <option  value="KAREILA MANAGEMENT CORP." @if(old('c_account') == "KAREILA MANAGEMENT CORP.") {{'selected'}} @endif>KAREILA MANAGEMENT CORP.</option>
                    <option  value="KCC MALL" @if(old('c_account') == "KCC MALL") {{'selected'}} @endif>KCC MALL</option>
                    <option  value="KEMP MART GROUP" @if(old('c_account') == "KEMP MART GROUP") {{'selected'}} @endif>KEMP MART GROUP</option>
                    <option  value="L.P.T. MARKETING COMPANY INC.- GEN TRIAS" @if(old('c_account') == "L.P.T. MARKETING COMPANY INC.- GEN TRIAS") {{'selected'}} @endif>L.P.T. MARKETING COMPANY INC.- GEN TRIAS</option>
                    <option  value="L.P.T. MARKETING COMPANY INC- FELOMINA" @if(old('c_account') == "L.P.T. MARKETING COMPANY INC- FELOMINA") {{'selected'}} @endif>L.P.T. MARKETING COMPANY INC- FELOMINA</option>
                    <option  value="L.P.T. MARKETING COMPANY INC." @if(old('c_account') == "L.P.T. MARKETING COMPANY INC.") {{'selected'}} @endif>L.P.T. MARKETING COMPANY INC.</option>
                    <option  value="KIDAPAWAN MEGACENTER CORP." @if(old('c_account') == "KIDAPAWAN MEGACENTER CORP.") {{'selected'}} @endif>KIDAPAWAN MEGACENTER CORP.</option>
                    <option  value="LANDMARK" @if(old('c_account') == "LANDMARK") {{'selected'}} @endif>LANDMARK</option>
                    <option  value="LION COMMERCIAL CORPORATION" @if(old('c_account') == "LION COMMERCIAL CORPORATION") {{'selected'}} @endif>LION COMMERCIAL CORPORATION</option>
                    <!-- <option  value="METRO" @if(old('c_account') == "Metro") {{'selected'}} @endif>METRO</option> -->
                    <option  value="M&W TOWNSTORES, INC." @if(old('c_account') == "M&W TOWNSTORES, INC.") {{'selected'}} @endif>M&W TOWNSTORES, INC.</option>
                    <option  value="MANDARIN SUPERMARKET PHILS. INC" @if(old('c_account') == "MANDARIN SUPERMARKET PHILS. INC") {{'selected'}} @endif>MANDARIN SUPERMARKET PHILS. INC</option>
                    <option  value="MANNA TRADING" @if(old('c_account') == "MANNA TRADING") {{'selected'}} @endif>MANNA TRADING</option>
                    <option  value="MARKET SQUARE" @if(old('c_account') == "MARKET SQUARE") {{'selected'}} @endif>MARKET SQUARE</option>
                    <option  value="MERRYMART GROCERY CENTERS INC." @if(old('c_account') == "MERRYMART GROCERY CENTERS INC.") {{'selected'}} @endif>MERRYMART GROCERY CENTERS INC.</option>
                    <option  value="MITSUKOSHI FEDERAL RETAIL, INC." @if(old('c_account') == "MITSUKOSHI FEDERAL RETAIL, INC.") {{'selected'}} @endif>MITSUKOSHI FEDERAL RETAIL, INC.</option>
                    <option  value="MR. JJ SUPERMARKET" @if(old('c_account') == "MR. JJ SUPERMARKET") {{'selected'}} @endif>MR. JJ SUPERMARKET</option>
                    <option  value="PIONEER CENTRE" @if(old('c_account') == "PIONEER CENTRE") {{'selected'}} @endif>PIONEER CENTRE</option>
                    <option  value="PRINCE GROUP" @if(old('c_account') == "PRINCE GROUP") {{'selected'}} @endif>PRINCE GROUP</option>
                    <option  value="PUREGOLD" @if(old('c_account') == "PUREGOLD") {{'selected'}} @endif>PUREGOLD</option>
                    <option  value="ROBINSON CORP INC" @if(old('c_account') == "ROBINSONS CORP INC") {{'selected'}} @endif>ROBINSONS CORP INC</option>
                    <option  value="SAN ROQUE SUPERMARKET" @if(old('c_account') == "SAN ROQUE SUPERMARKET") {{'selected'}} @endif>SAN ROQUE SUPERMARKET</option>
                    <option  value="SANFORD MARKETING CORPORATION" @if(old('c_account') == "SANFORD MARKETING CORPORATION") {{'selected'}} @endif>SANFORD MARKETING CORPORATION</option>
                    <option  value="SHOPPERS MART" @if(old('c_account') == "SHOPPERS MART") {{'selected'}} @endif>SHOPPERS MART</option>
                    <option  value="SME SUPERMART" @if(old('c_account') == "SME SUPERMART") {{'selected'}} @endif>SME SUPERMART</option>
                    <option  value="SOUTH SUPERMARKET" @if(old('c_account') == "SOUTH SUPERMARKET") {{'selected'}} @endif>SOUTH SUPERMARKET</option>
                    <option  value="SOUTHEASTASIA RETAIL INC." @if(old('c_account') == "SOUTHEASTASIA RETAIL INC.") {{'selected'}} @endif>SOUTHEASTASIA RETAIL INC.</option>
                    <option  value="SUPER 8 RETAIL SYSTEMS, INC." @if(old('c_account') == "SUPER 8 RETAIL SYSTEMS, INC.") {{'selected'}} @endif>SUPER 8 RETAIL SYSTEMS, INC.</option>
                    <option  value="SUPER MIGHTEE MART" @if(old('c_account') == "SUPER MIGHTEE MART") {{'selected'}} @endif>SUPER MIGHTEE MART</option>
                    <option  value="SUPER SHOPPING MARKET INC." @if(old('c_account') == "SUPER SHOPPING MARKET INC.") {{'selected'}} @endif>SUPER SHOPPING MARKET INC.</option>
                    <option  value="SUPERAMA COTABATO" @if(old('c_account') == "SUPERAMA COTABATO") {{'selected'}} @endif>SUPERAMA COTABATO</option>
                    <option  value="SUPERVALUE INC." @if(old('c_account') == "SUPERVALUE INC.") {{'selected'}} @endif>SUPERVALUE INC.</option>
                    <option  value="SUSAN SY GROCERY" @if(old('c_account') == "SUSAN SY GROCERY") {{'selected'}} @endif>SUSAN SY GROCERY</option>
                    <option  value="TOPWAY SUPERMARKET" @if(old('c_account') == "TOPWAY SUPERMARKET") {{'selected'}} @endif>TOPWAY SUPERMARKET</option>
                    <option  value="TOWER 6789 CORPORATION" @if(old('c_account') == "TOWER 6789 CORPORATION") {{'selected'}} @endif>TOWER 6789 CORPORATION</option>
                    <option  value="TROPICAL HUT" @if(old('c_account') == "TROPICAL HUT") {{'selected'}} @endif>TROPICAL HUT</option>
                    <option  value="ULTRAMEGA" @if(old('c_account') == "ULTRAMEGA") {{'selected'}} @endif>ULTRAMEGA</option>
                    <option  value="UNIMART SUPERMARKET" @if(old('c_account') == "UNIMART SUPERMARKET") {{'selected'}} @endif>UNIMART SUPERMARKET</option>
                    <option  value="UNIMEC" @if(old('c_account') == "UNIMEC") {{'selected'}} @endif>UNIMEC</option>
                    <option  value="UNIMART SUPERMARKET" @if(old('c_account') == "UNIMART SUPERMARKET") {{'selected'}} @endif>UNIMART SUPERMARKET</option>
                    <option  value="WALTERMART SUPERMARKET" @if(old('c_account') == "Waltermart supermarket") {{'selected'}} @endif>WALTERMART SUPERMARKET</option>
                    <option  value="WRAP & CARRY GROCERY" @if(old('c_account') == "WRAP & CARRY GROCERY") {{'selected'}} @endif>WRAP & CARRY GROCERY</option> 
                </select>
            </div>    
       
            <div class="form-group col-md-6">
                <label for="c_region" class="col-form-label">Region:</label>
                <select class="form-select" id="c_region" name="c_region">
                <option  value="">---Select Region---</option>
                    <option  value="Region 1" @if(old('c_region') == "Region 1") {{'selected'}} @endif>Region 1 (ILOCOS REGION)</option>
                    <option  value="Region 2" @if(old('c_region') == "Region 2") {{'selected'}} @endif>Region 2 (CAGAYAN VALLEY)</option>
                    <option  value="Region 3" @if(old('c_region') == "Region 3") {{'selected'}} @endif>Region 3 (CENTRAL LUZON)</option> 
                    <option  value="Region 4A" @if(old('c_region') == "Region 4A") {{'selected'}} @endif>Region 4A (CALABARZON)</option>
                    <option  value="Region 4B" @if(old('c_region') == "Region 4B") {{'selected'}} @endif>Region 4B (MIMAROPA)</option>
                    <option  value="Region 5" @if(old('c_region') == "Region 5") {{'selected'}} @endif>Region 5 (BICOL REGION)</option>
                    <option  value="Region 6" @if(old('c_region') == "Region 6") {{'selected'}} @endif>Region 6 (WESTERN VISAYAS)</option>
                    <option  value="Region 7" @if(old('c_region') == "Region 7") {{'selected'}} @endif>Region 7 (CENTRAL VISAYAS)</option>
                    <option  value="Region 7B" @if(old('c_region') == "Region 7B") {{'selected'}} @endif>Region 7B (CENTRAL VISAYAS)</option>
                    <option  value="Region 8" @if(old('c_region') == "Region 8") {{'selected'}} @endif>Region 8 (EASTERN VISAYAS)</option>
                    <option  value="Region 9" @if(old('c_region') == "Region 9") {{'selected'}} @endif>Region 9 (ZAMBOANGA PENINSULA)</option>
                    <option  value="Region 10" @if(old('c_region') == "Region 10") {{'selected'}} @endif>Region 10 (NORTHERN MINDANAO)</option>
                    <option  value="Region 11" @if(old('c_region') == "Region 11") {{'selected'}} @endif>Region 11 (DAVAO REGION)</option>
                    <option  value="Region 12" @if(old('c_region') == "Region 12") {{'selected'}} @endif>Region 12 (SOCCSKSARGEN)</option>
                    <option  value="Region 13" @if(old('c_region') == "Region 13") {{'selected'}} @endif>Region 13 (CARAGA)</option>
                    <option  value="NCR" @if(old('c_region') == "NCR") {{'selected'}} @endif>NCR (NATIONAL CAPITAL REGION)</option>
                    <option  value="CAR" @if(old('c_region') == "CAR") {{'selected'}} @endif>CAR (CORDILLERA ADMIN REGION)</option>
                    <option  value="BARMM" @if(old('c_region') == "BARMM") {{'selected'}} @endif>BARMM (BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO)</option>
                </select>
            </div>
        </div>  


        <div class="row mt-2">
            <div class="form-group col-md-6">
                <label for="c_area" class="col-form-label">Area:</label>
                <select class="form-select" id="c_area" name="c_area">
                <option  value="">---Select Area---</option>
                        <option  value="NORTH LUZON" @if(old('c_area') == "NORTH LUZON") {{'selected'}} @endif>NORTH LUZON</option>
                        <option  value="CENTRAL LUZON" @if(old('c_area') == "CENTRAL LUZON") {{'selected'}} @endif>CENTRAL LUZON</option>
                        <option  value="GMA" @if(old('c_area') == "GMA") {{'selected'}} @endif>GMA</option>
                        <option  value="SOUTH LUZON" @if(old('c_area') == "SOUTH LUZON") {{'selected'}} @endif>SOUTH LUZON</option>
                        <option  value="VISAYAS" @if(old('c_area') == "VISAYAS") {{'selected'}} @endif>VISAYAS</option>
                        <option  value="MINDANAO" @if(old('c_area') == "MINDANAO") {{'selected'}} @endif>MINDANAO</option>
                </select>
            </div> 
          
          <div class="form-group col-md-6">
                <label for="c_account_branch" class="col-form-label">Store Name:</label>
                <input type="text" class="form-control" id="c_store_name" name="c_store_name" value="{{ old('c_store_name') }}" required>
            </div>
        </div>  

        <div class="row mt-2">
            <div class="form-group col-md-6">
                <label for="c_store_address" class="col-form-label">Store Address:</label>
                <input type="text" class="form-control" id="c_store_address" name="c_store_address" value="{{ old('c_store_address') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="c_sup" class="col-form-label">Account Supervisor:</label>
                <select class="form-select" id="c_sup" name="c_sup">
                <option value="">---Select Payroll Officer---</option>
                @foreach ($account_supervisor as $id => $value)
                <option value="{{ $id }}">{{ $value }}</option>
                @endforeach
                </select>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="hide-modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
</div>


      <!-- edit user modal -->
<div class="modal fade" id="editAccountModal" name = "editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAccountModalLabel">Edit Details</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

      </div>
      <div class="modal-body">
        <form action="{{route('superadmin.mckenzie-list.update-account')}}" method="POST">

        @csrf
                  <!-- First Name and Last name Input -->

        @if (session('update-failed'))

        <div style="background-color:rgba(255,255,255,0)" class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        
        @endif
    
        <div class="row">
            <div class="form-group col-md-4">
                <label for="e_account" class="col-form-label">Account:</label>
                <select class="form-select" id="e_account" name="e_account" value="{{ old('e_account') }}">
                <option  value="{{ old('e_account') }}" >---Select Account---</option>
                    <option  value="AFPCES" @if(old('e_account') == "AFPCES") {{'selected'}} @endif>AFPCES</option>
                    <option  value="ALTA" @if(old('e_account') == "Alta") {{'selected'}} @endif>ALTA</option>
                    <option  value="ALTURAS GROUP" @if(old('e_account') == "ALTURAS GROUP") {{'selected'}} @endif>ALTURAS GROUP</option>
                    <option  value="BOHOL QUALITY STORE" @if(old('e_account') == "BOHOL QUALITY STORE") {{'selected'}} @endif>BOHOL QUALITY STORE</option>
                    <option  value="BUDGET MART" @if(old('e_account') == "BUDGET MART") {{'selected'}} @endif>BUDGET MART</option>
                    <option  value="CASH & CARRY SUPERMARKET" @if(old('e_account') == "CASH & CARRY SUPERMARKET") {{'selected'}} @endif>CASH & CARRY SUPERMARKET</option>
                    <option  value="CLIGAN MART" @if(old('e_account') == "CLIGAN MART") {{'selected'}} @endif>CLIGAN MART</option>
                    <option  value="DIPOLOG FRIENDLY MART INC." @if(old('e_account') == "DIPOLOG FRIENDLY MART INC.") {{'selected'}} @endif>DIPOLOG FRIENDLY MART INC.</option>
                    <option  value="DIVI MART CORP." @if(old('e_account') == "DIVI MART CORP.") {{'selected'}} @endif>DIVI MART CORP.</option>
                    <option  value="EVER SUPERMARKET GROUP" @if(old('e_account') == "EVER SUPERMARKET GROUP") {{'selected'}} @endif>EVER SUPERMARKET GROUP</option>
                    <option  value="FINDS CONVENIENCE STORES INC." @if(old('e_account') == "FINDS CONVENIENCE STORES INC.") {{'selected'}} @endif>FINDS CONVENIENCE STORES INC.</option>
                    <option  value="FISHERFOODS CORPORATION" @if(old('e_account') == "FISHERFOODS CORPORATION") {{'selected'}} @endif>FISHERFOODS CORPORATION</option>
                    <option  value="FORTUNES MART" @if(old('e_account') == "FORTUNES MART") {{'selected'}} @endif>FORTUNES MART</option>
                    <option  value="GAISANO BROTHERS GROUP" @if(old('e_account') == "GAISANO BROTHERS GROUP") {{'selected'}} @endif>GAISANO BROTHERS GROUP</option>
                    <option  value="GAISANO CAPITAL GROUP" @if(old('e_account') == "GAISANO CAPITAL GROUP") {{'selected'}} @endif>GAISANO CAPITAL GROUP</option>
                    <option  value="GAISANO GRAND/SOUTH GROUP" @if(old('e_account') == "GAISANO GRAND/SOUTH GROUP") {{'selected'}} @endif>GAISANO GRAND/SOUTH GROUP</option>
                    <option  value="GAISANO METRO GROUP" @if(old('e_account') == "GAISANO METRO GROUP") {{'selected'}} @endif>GAISANO METRO GROUP</option>
                    <option  value="GARBEZ DIZON S/M" @if(old('e_account') == "GARBEZ DIZON S/M") {{'selected'}} @endif>GARBEZ DIZON S/M</option>
                    <option  value="HILTON MART" @if(old('e_account') == "HILTON MART") {{'selected'}} @endif>HILTON MART</option>
                    <option  value="ISETANN" @if(old('e_account') == "ISETANN") {{'selected'}} @endif>ISETANN</option>
                    <option  value="JENRA INC." @if(old('e_account') == "JENRA INC.") {{'selected'}} @endif>JENRA INC.</option>
                    <option  value="JHONNYS SUPERMARKET" @if(old('e_account') == "JHONNYS SUPERMARKET") {{'selected'}} @endif>JHONNYS SUPERMARKET</option>
                    <option  value="KAREILA MANAGEMENT CORP." @if(old('e_account') == "KAREILA MANAGEMENT CORP.") {{'selected'}} @endif>KAREILA MANAGEMENT CORP.</option>
                    <option  value="KCC" @if(old('e_account') == "kcc") {{'selected'}} @endif>KCC</option>
                    <option  value="KEMP MART GROUP" @if(old('e_account') == "KEMP MART GROUP") {{'selected'}} @endif>KEMP MART GROUP</option>
                    <option  value="L.P.T. MARKETING COMPANY INC.- GEN TRIAS" @if(old('e_account') == "L.P.T. MARKETING COMPANY INC.- GEN TRIAS") {{'selected'}} @endif>L.P.T. MARKETING COMPANY INC.- GEN TRIAS</option>
                    <option  value="L.P.T. MARKETING COMPANY INC- FELOMINA" @if(old('e_account') == "L.P.T. MARKETING COMPANY INC- FELOMINA") {{'selected'}} @endif>L.P.T. MARKETING COMPANY INC- FELOMINA</option>
                    <option  value="L.P.T. MARKETING COMPANY INC." @if(old('e_account') == "L.P.T. MARKETING COMPANY INC.") {{'selected'}} @endif>L.P.T. MARKETING COMPANY INC.</option>
                    <option  value="KIDAPAWAN MEGACENTER CORP." @if(old('e_account') == "KIDAPAWAN MEGACENTER CORP.") {{'selected'}} @endif>KIDAPAWAN MEGACENTER CORP.</option>
                    <option  value="LANDMARK" @if(old('e_account') == "LANDMARK") {{'selected'}} @endif>LANDMARK</option>
                    <option  value="LION COMMERCIAL CORPORATION" @if(old('e_account') == "LION COMMERCIAL CORPORATION") {{'selected'}} @endif>LION COMMERCIAL CORPORATION</option>
                    <!-- <option  value="METRO" @if(old('c_account') == "Metro") {{'selected'}} @endif>METRO</option> -->
                    <option  value="M&W TOWNSTORES, INC." @if(old('e_account') == "M&W TOWNSTORES, INC.") {{'selected'}} @endif>M&W TOWNSTORES, INC.</option>
                    <option  value="MANDARIN SUPERMARKET PHILS. INC" @if(old('e_account') == "MANDARIN SUPERMARKET PHILS. INC") {{'selected'}} @endif>MANDARIN SUPERMARKET PHILS. INC</option>
                    <option  value="MANNA TRADING" @if(old('e_account') == "MANNA TRADING") {{'selected'}} @endif>MANNA TRADING</option>
                    <option  value="MARKET SQUARE" @if(old('e_account') == "MARKET SQUARE") {{'selected'}} @endif>MARKET SQUARE</option>
                    <option  value="MERRYMART GROCERY CENTERS INC." @if(old('e_account') == "MERRYMART GROCERY CENTERS INC.") {{'selected'}} @endif>MERRYMART GROCERY CENTERS INC.</option>
                    <option  value="MITSUKOSHI FEDERAL RETAIL, INC." @if(old('e_account') == "MITSUKOSHI FEDERAL RETAIL, INC.") {{'selected'}} @endif>MITSUKOSHI FEDERAL RETAIL, INC.</option>
                    <option  value="MR. JJ SUPERMARKET" @if(old('e_account') == "MR. JJ SUPERMARKET") {{'selected'}} @endif>MR. JJ SUPERMARKET</option>
                    <option  value="PIONEER CENTRE" @if(old('e_account') == "PIONEER CENTRE") {{'selected'}} @endif>PIONEER CENTRE</option>
                    <option  value="PRINCE GROUP" @if(old('e_account') == "PRINCE GROUP") {{'selected'}} @endif>PRINCE GROUP</option>
                    <option  value="PUREGOLD" @if(old('e_account') == "PUREGOLD") {{'selected'}} @endif>PUREGOLD</option>
                    <option  value="ROBINSON CORP INC" @if(old('e_account') == "ROBINSONS CORP INC") {{'selected'}} @endif>ROBINSONS CORP INC</option>
                    <option  value="SAN ROQUE SUPERMARKET" @if(old('e_account') == "SAN ROQUE SUPERMARKET") {{'selected'}} @endif>SAN ROQUE SUPERMARKET</option>
                    <option  value="SANFORD MARKETING CORPORATION" @if(old('e_account') == "SANFORD MARKETING CORPORATION") {{'selected'}} @endif>SANFORD MARKETING CORPORATION</option>
                    <option  value="SHOPPERS MART" @if(old('e_account') == "SHOPPERS MART") {{'selected'}} @endif>SHOPPERS MART</option>
                    <option  value="SOUTH SUPERMARKET" @if(old('e_account') == "SOUTH SUPERMARKET") {{'selected'}} @endif>SOUTH SUPERMARKET</option>
                    <option  value="SOUTHEASTASIA RETAIL INC." @if(old('e_account') == "SOUTHEASTASIA RETAIL INC.") {{'selected'}} @endif>SOUTHEASTASIA RETAIL INC.</option>
                    <option  value="SUPER 8 RETAIL SYSTEMS, INC." @if(old('e_account') == "SUPER 8 RETAIL SYSTEMS, INC.") {{'selected'}} @endif>SUPER 8 RETAIL SYSTEMS, INC.</option>
                    <option  value="SUPER MIGHTEE MART" @if(old('e_account') == "SUPER MIGHTEE MART") {{'selected'}} @endif>SUPER MIGHTEE MART</option>
                    <option  value="SUPER SHOPPING MARKET INC." @if(old('e_account') == "SUPER SHOPPING MARKET INC.") {{'selected'}} @endif>SUPER SHOPPING MARKET INC.</option>
                    <option  value="SUPERAMA COTABATO" @if(old('e_account') == "SUPERAMA COTABATO") {{'selected'}} @endif>SUPERAMA COTABATO</option>
                    <option  value="SUPERVALUE INC." @if(old('e_account') == "SUPERVALUE INC.") {{'selected'}} @endif>SUPERVALUE INC.</option>
                    <option  value="SUSAN SY GROCERY" @if(old('e_account') == "SUSAN SY GROCERY") {{'selected'}} @endif>SUSAN SY GROCERY</option>
                    <option  value="TOPWAY SUPERMARKET" @if(old('e_account') == "TOPWAY SUPERMARKET") {{'selected'}} @endif>TOPWAY SUPERMARKET</option>
                    <option  value="TOWER 6789 CORPORATION" @if(old('e_account') == "TOWER 6789 CORPORATION") {{'selected'}} @endif>TOWER 6789 CORPORATION</option>
                    <option  value="TROPICAL HUT" @if(old('e_account') == "TROPICAL HUT") {{'selected'}} @endif>TROPICAL HUT</option>
                    <option  value="ULTRAMEGA" @if(old('e_account') == "ULTRAMEGA") {{'selected'}} @endif>ULTRAMEGA</option>
                    <option  value="UNIMART SUPERMARKET" @if(old('e_account') == "UNIMART SUPERMARKET") {{'selected'}} @endif>UNIMART SUPERMARKET</option>
                    <option  value="UNIMEC" @if(old('e_account') == "UNIMEC") {{'selected'}} @endif>UNIMEC</option>
                    <option  value="UNIMART SUPERMARKET" @if(old('e_account') == "UNIMART SUPERMARKET") {{'selected'}} @endif>UNIMART SUPERMARKET</option>
                    <option  value="WALTERMART SUPERMARKET" @if(old('e_account') == "Waltermart supermarket") {{'selected'}} @endif>WALTERMART SUPERMARKET</option>
                    <option  value="WRAP & CARRY GROCERY" @if(old('e_account') == "WRAP & CARRY GROCERY") {{'selected'}} @endif>WRAP & CARRY GROCERY</option>  
                </select>
            </div>    

            <div class="form-group col-md-4">
                <label for="e_region" class="col-form-label">Region:</label>
                <select class="form-select" id="e_region" name="e_region" value="{{ old('e_region') }}">
                <option  value="" >---Select Region---</option> 
                    <option  value="Region 1" @if(old('e_region') == "Region 1") {{'selected'}} @endif>Region 1 (ILOCOS REGION)</option>
                    <option  value="Region 2" @if(old('e_region') == "Region 2") {{'selected'}} @endif>Region 2 (CAGAYAN VALLEY)</option>
                    <option  value="Region 3" @if(old('e_region') == "Region 3") {{'selected'}} @endif>Region 3 (CENTRAL LUZON)</option> 
                    <option  value="Region 4A" @if(old('e_region') == "Region 4A") {{'selected'}} @endif>Region 4A (CALABARZON)</option>
                    <option  value="Region 4B" @if(old('e_region') == "Region 4B") {{'selected'}} @endif>Region 4B (MIMAROPA)</option>
                    <option  value="Region 5" @if(old('e_region') == "Region 5") {{'selected'}} @endif>Region 5 (BICOL REGION)</option>
                    <option  value="Region 6" @if(old('e_region') == "Region 6") {{'selected'}} @endif>Region 6 (WESTERN VISAYAS)</option>
                    <option  value="Region 7" @if(old('e_region') == "Region 7") {{'selected'}} @endif>Region 7 (CENTRAL VISAYAS)</option>
                    <option  value="Region 7B" @if(old('e_region') == "Region 7B") {{'selected'}} @endif>Region 7B (CENTRAL VISAYAS)</option>
                    <option  value="Region 8" @if(old('e_region') == "Region 8") {{'selected'}} @endif>Region 8 (EASTERN VISAYAS)</option>
                    <option  value="Region 9" @if(old('e_region') == "Region 9") {{'selected'}} @endif>Region 9 (ZAMBOANGA PENINSULA)</option>
                    <option  value="Region 10" @if(old('e_region') == "Region 10") {{'selected'}} @endif>Region 10 (NORTHERN MINDANAO)</option>
                    <option  value="Region 11" @if(old('e_region') == "Region 11") {{'selected'}} @endif>Region 11 (DAVAO REGION)</option>
                    <option  value="Region 12" @if(old('e_region') == "Region 12") {{'selected'}} @endif>Region 12 (SOCCSKSARGEN)</option>
                    <option  value="Region 13" @if(old('e_region') == "Region 13") {{'selected'}} @endif>Region 13 (CARAGA)</option>
                    <option  value="NCR" @if(old('e_region') == "NCR") {{'selected'}} @endif>NCR (NATIONAL CAPITAL REGION)</option>
                    <option  value="CAR" @if(old('e_region') == "CAR") {{'selected'}} @endif>CAR (CORDILLERA ADMIN REGION)</option>
                    <option  value="BARMM" @if(old('e_region') == "BARMM") {{'selected'}} @endif>BARMM (BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO)</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="e_area" class="col-form-label">Area:</label>
                <select class="form-select" id="e_area" name="e_area" value="{{ old('e_area') }}">
                    <option  value="" >---Select Area---</option> 
                    <option  value="NORTH LUZON" @if(old('e_area') == "NORTH LUZON") {{'selected'}} @endif>NORTH LUZON</option>
                    <option  value="CENTRAL LUZON" @if(old('e_area') == "CENTRAL LUZON") {{'selected'}} @endif>CENTRAL LUZON</option>
                    <option  value="GMA" @if(old('e_area') == "GMA") {{'selected'}} @endif>GMA</option>
                    <option  value="SOUTH LUZON" @if(old('e_area') == "SOUTH LUZON") {{'selected'}} @endif>SOUTH LUZON</option>
                    <option  value="VISAYAS" @if(old('e_area') == "VISAYAS") {{'selected'}} @endif>VISAYAS</option>
                    <option  value="MINDANAO" @if(old('e_area') == "MINDANAO") {{'selected'}} @endif>MINDANAO</option>
                </select>
            </div> 
        </div>  


        <div class="row mt-2">
            <div class="form-group col-md-4">
                <label for="e_account_branch" class="col-form-label">Account Branch:</label>
                <input type="text" class="form-control" id="e_store_name" name="e_store_name" value="{{ old('e_store_name') }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="e_account_branch" class="col-form-label">Store Address:</label>
                <input type="text" class="form-control" id="e_store_address" name="e_store_address" value="{{ old('e_store_address') }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="e_sup" class="col-form-label">Account Supervisor:</label>
                <select class="form-select" id="e_sup" name="e_sup" value="{{ old('e_sup') }}">
                    <option value="">---Select Payroll Officer---</option>
                    @foreach ($account_supervisor as $id => $value)
                    <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="e_status" class="col-form-label">Status:</label>
                <select class="form-select" id="e_status" name="e_status">
                <option  value="">---Select Status---</option>
                    <option  value="active" @if(old('e_status') == "active") {{'selected'}} @endif>active</option>
                    <option  value="inactive" @if(old('e_status') == "inactive") {{'selected'}} @endif>inactive</option>
                    <option  value="closed store" @if(old('e_status') == "closed store") {{'selected'}} @endif>closed store</option>
                </select>
            </div>   
        </div>  


      </div>
      <input type="hidden" id="selectedId" name="selectedId" />
        
        
     
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="ehide-modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
   
        </form>
        </div>
  
  </div>
</div>
</div>


<!-- View user modal -->
    <div class="modal fade" id="viewUserModal" name = "viewUserModal" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editAccountModalLabel">View Details</h5>
        </div>
        <div class="modal-body">

        <div class="row">
            <div class="form-group col-md-4">
                <label for="v_account" class="col-form-label">Account:</label>
                <p class="h6" id="v_account" name="v_account"></p>
            </div>    
        
            <div class="form-group col-md-4">
                <label for="v_region" class="col-form-label">Region:</label>
                <p class="h6" id="v_region" name="v_region"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_area" class="col-form-label">Area:</label>
                <p class="h6" id="v_area" name="v_area"></p>
            </div>   
        </div> 
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="v_account_branch" class="col-form-label">Account Branch:</label>
                <p class="h6" id="v_store_name" name="v_store_name"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_account_branch" class="col-form-label">Store Address:</label>
                <p class="h6" id="v_store_address" name="v_store_address"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_sup" class="col-form-label">Account Supervisor:</label>
                <p class="h6" id="v_sup" name="v_sup  "></p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="v_status" class="col-form-label">Status:</label>
                <p class="h6" id="v_status" name="v_status"></p>
            </div>
        </div>

        <!-- <div class="row">
            <div class="form-group col-md-4">
                <label for="v_type_of_deployment" class="col-form-label">Type of Deployment:</label>
                <p class="h6" id="v_type_of_deployment" name="v_type_of_deployment"></p>  
            </div>
        </div> -->

    

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="vhide-modal">Close</button>
        </div>
     </div>  
    </div>
  </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<script src="/asset/user/js/bootstrap.bundle.min.js"></script>

    <script src="/asset/user/js/jquery.min.js"></script>
   
    <script src="/asset/user/js/script.js"></script>

    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- end: JS -->

    <script>
    $(document).ready(function () {
        var dataTable = $('#mckenzie').DataTable({
            ajax: {
                url: '/superadmin/mckenzie/list/fetch-data',
                dataSrc: 'data'
            },
            columns: [
                { data: '#' },
                { data: 'id', visible: false },
                { data: 'account' },
                { data: 'region' },
                { data: 'area'},
                { data: 'store_name' },
                { data: 'store_address' },
                { data: 'status', orderable: false }, 
                { data: 'actions', orderable: false }
            ] 
        });



    $('#mckenzie tbody').on('click', 'img.button-image2', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;

            $.ajax({
            url: '/superadmin/mckenzie/list/retrieve-update/' + id ,
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(response){
                // response = JSON.parse(response);
                $('#selectedId').val(id);
                $('#e_sup').val(response.supervisor_id);
                $('#e_account').val(response.account);
                $('#e_region').val(response.region);
                $('#e_area').val(response.area);
                $('#e_store_name').val(response.store_name);
                $('#e_store_address').val(response.store_address);
                $('#e_status').val(response.status);

                // type = response.type_of_deployment;
                // // is_type = (type === "stationary" ? "stationary" : "roving");

                // if(type === "Stationary"){
                //     $("#e_type_stationary").attr('checked', true);
                // }else{
                //     $("#e_type_roving").attr('checked', true);
                // }

           
                $('#editAccountModal').modal('show');
            
            }
     
        })
    });

    $('#mckenzie tbody').on('click', 'img.button-image1', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;

            $.ajax({
            url: '/superadmin/mckenzie/list/retrieve-view/' + id ,
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(response){
                // response = JSON.parse(response);
                $('#v_account').text(response.account);
                $('#v_region').text(response.region);
                $('#v_area').text(response.area);
                $('#v_store_name').text(response.store_name);
                $('#v_store_address').text(response.store_address);
                $('#v_status').text(response.status);
                $('#viewUserModal').modal('show');
            
            }
     
        })
    });
            

        



       $("#hitme").click(function(){
 //alert("button inside modal clicked");
    $("#createAccountModal").modal('show');
    console.error();
    });
    $('#createAccountModal').modal({
        backdrop: 'static',
        keyboard: false,
    });

    $("#hide-modal").click(function(){
        $("#createAccountModal").modal('hide');
    });

    $("#ehide-modal").click(function(){
        $("#editAccountModal").modal('hide');
    });

    $("#vhide-modal").click(function(){
        $("#viewUserModal").modal('hide');
    });



     });

 
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

@if (session('create-success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('create-success') }}',
                icon: 'success',
                confirmButtonText: 'OK' 
            }).then((result) => {
        if (result.isConfirmed) {
          
            $("#createAccountModal").trigger("reset");
        }
    });

        </script>
@endif


@if (session('update-success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('update-success') }}',
                icon: 'success',
                confirmButtonText: 'OK' 
            });

        </script>
@endif

@if (session('update-failed'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Update Failed!',
                icon: 'error',
                confirmButtonText: 'OK' 
            }).then((result) => {
        if (result.isConfirmed) {
          
            $('#editAccountModal').modal('show');
        }
    });

        </script>
@endif


@if (session('create-failed'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Account Creation Failed!',
                icon: 'error',
                confirmButtonText: 'OK' 
            }).then((result) => {
        if (result.isConfirmed) {
          
            $('#createAccountModal').modal('show');
        }
    });

        </script>

@endif

@include('sweetalert::alert')
</body>

</html>