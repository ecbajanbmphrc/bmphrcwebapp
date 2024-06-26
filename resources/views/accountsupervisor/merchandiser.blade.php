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
        <link rel="stylesheet" href="/asset/user/css2/accountsup.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <!-- end: CSS -->
        <title>BMPHRC</title>

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
        <div class="sidebar position-fixed top-0 bottom-0 border-end" style="background-color: #032b23;">
            <div class="d-flex align-items-center p-3">
                <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-light fs-4">Account Supervisor</a>
                <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
            </div>
            <ul class="sidebar-menu p-3 m-0 mb-0 flex-glow-1">
                <li class="sidebar-menu-item ">
                    <a href="{{ route('accountsupervisor.view.dashboard') }}">
                        <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Dashboard
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('accountsupervisor.view.door') }}">
                        <i class="ri-store-line sidebar-menu-item-icon"></i>Store
                    </a>
                </li>
                <li class="sidebar-menu-item ">
                    <a href="{{ route('accountsupervisor.view.coordinator') }}">
                        <i class="ri-account-pin-circle-line sidebar-menu-item-icon"></i>Coordinator
                    </a>
                </li>
                <li class="sidebar-menu-item active">
                    <a href="{{ route('accountsupervisor.view.merchandiser') }}">
                        <i class="ri-account-pin-box-line sidebar-menu-item-icon"></i>Merchandiser
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('accountsupervisor.view.manning') }}">
                        <i class="ri-file-user-line sidebar-menu-item-icon"></i>Manning
                    </a>
                </li>
                <li class="sidebar-menu-item has-dropdown">
                    <a href="#">
                        <i class="ri-pages-line sidebar-menu-item-icon"></i>Reserve Page
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu">
                        <li class="sidebar-dropdown-menu-item">
                            <a href="#">User Profile</a>
                        </li>
                        <li class="sidebar-dropdown-menu-item has-dropdown">
                            <a href="#">Blog<i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                            </a>
                            <ul class="sidebar-dropdown-menu">
                                <li class="sidebar-dropdown-menu-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="sidebar-dropdown-menu-item">
                                    <a href="#">Post</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item has-dropdown">
                    <a href="#">
                        <i class="bi bi-people me-3" style="font-size: 18px; margin-left: 3px;"></i>
                        Accounts
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu">
                        <li class="sidebar-dropdown-menu-item">
                            <a href="#">Payroll Officer</a>
                        </li>
                        <li class="sidebar-dropdown-menu-item">
                            <a href="#">Account Sup</a>
                        </li>
                    </ul>
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
                    <h5 class="fw-bold mb-0 me-auto">MERCHANDISER</h5>
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


            <div style="height:2vh;"> </div>

                <div class="card">
                <div class="card-header">

                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#createMerchandiserModal" id="hitme" name="hitme">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                    </svg>
                ADD</button>
                
                </div>

                    
                <div class="card-body">
                <h5 class="card-title">Merchandiser List</h5>
                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    <table id="merchandiser" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="display:none">ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            
                </div>
                <!-- end: Content -->
        
        </main>
        <!-- end: Main -->

        <!-- edit merchandiser modal -->
    <div class="modal fade" id="editMerchandiserModal" name ="editMerchandiserModal" tabindex="-1" role="dialog"  aria-labelledby="editMerchandiserModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editMerchandiserModalLabel">Edit Merchandiser Details</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div class="modal-body">
            <form action="{{route('accountsupervisor.merchandiser-list.update-account')}}" method="POST">
        @csrf
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
                <label for="e_first_name" class="col-form-label">First Name: *</label>
                <input type="text" class="form-control" id="e_first_name" name="e_first_name" value="{{ old('e_first_name') }}" required>
            </div>    
            
            <div class="form-group col-md-4">
                <label for="e_middle_name" class="col-form-label">Middle Name:</label>
                <input type="text" class="form-control" id="e_middle_name" name="e_middle_name" value="{{ old('e_middle_name') }}">
            </div>

            <div class="form-group col-md-4">
                <label for="e_last_name" class="col-form-label">Last Name: *</label>
                <input type="text" class="form-control" id="e_last_name" name="e_last_name" value="{{ old('e_last_name') }}" required>
            </div>

        </div> 

        <div class="row">

            <div class="form-group col-md-4">
                <label for="e_birthdate" class="col-form-label">Birthdate: *</label>
                <input id="e_birthdate" name="e_birthdate" class="form-control" />
            </div>

            <div class="form-group col-md-4">
                <label for="e_first_name" class="col-form-label">Age: *</label>
                <input type="text" class="form-control" id="e_age" name="e_age" readonly>
            </div>

            <div class="form-group col-md-4">
            
                <label for="e_gender" class="col-form-label">Gender: *</label>
                    <!-- <div style="height:10px;"></div> -->
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="e_gender" id="e_male" value="Male">
                        <label class="form-check-label" for="e_male">Male</label>
                    </div>
        
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="e_gender" id="e_female" value="Female">
                        <label class="form-check-label" for="e_female">Female</label>
                    </div>

            </div>

        </div>
        
        <div class="row">

            <div class="form-group col-md-4">
                <label for="e_address" class="col-form-label">Address: *</label>
                <input type="text" class="form-control" id="e_address" name="e_address" value="{{ old('e_address') }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="e_region" class="col-form-label">Region: *</label>
                <select type="text" class="form-select" id="e_region" name = "e_region" value="{{ old('e_region') }}" required>
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

            <div class="form-group col-md-4">
                <label for="e_number" class="col-form-label">Contact Number: *</label>
                <input type="text" class="form-control" id="e_number" name="e_number" value="{{ old('e_number') }}"  oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11" value="{{ old('number') }}" required>
            </div>

        </div>

        <div class="row"> 

            <div class="form-group col-md-4">
                <label for="e_email" class="col-form-label">Email Address: *</label>
                <input type="email" class="form-control" id="e_email" name = "e_email" value="{{ old('e_email') }}" required>
            </div>
        
            <div class="form-group col-md-4">
                <label for="e_date_started" class="col-form-label">Date Started: *</label>
                <input id="e_date_started" name="e_date_started" class="form-control" />
            </div>

            <div class="form-group col-md-4">
                <label for="e_end_of_contract" class="col-form-label">End of Contract: *</label>
                <input id="e_end_of_contract" name="e_end_of_contract" class="form-control" />
            </div>

        </div>


        <div class="row">

            <div class="form-group col-md-3">
                <label for="e_total_days" class="col-form-label">Total Days: </label>
                <input type="text" class="form-control" id="e_total_days" name="e_total_days" readonly>
            </div>

            <div class="form-group col-md-3">
                <label for="e_remaining_days" class="col-form-label">Remaining Days: </label>
                <input type="text" class="form-control" id="e_remaining_days" name="e_remaining_days" readonly>
            </div>

            <div class="form-group col-md-3">
                <label for="e_remarks" class="col-form-label">Type of Contract: *</label>
                <select type="text" class="form-select" id="e_remarks" name = "e_remarks" value="{{ old('e_remarks') }}" required>
                <option  value="">---Select Remarks---</option>
                    <option  value="Fix-term" @if(old('c_remarks') == "fix-term") {{'selected'}} @endif>Fix-term</option>
                    <option  value="Probasionary" @if(old('c_remarks') == "Probasionary") {{'selected'}} @endif>Probationary</option>
                    <option  value="Regular" @if(old('c_remarks') == "Regular") {{'selected'}} @endif>Regular</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="e_status" class="col-form-label">Status: *</label>
                <select class="form-select" id="e_status" name="e_status">
                <option  value="">---Select Status---</option>
                    <option value="1" @if(old('e_status') == "active") {{'selected'}} @endif>Active</option>
                    <option value="0" @if(old('e_status') == "inactive") {{'selected'}} @endif>Inactive</option>
                </select>
            </div> 

        </div>
            

            

        </div>
        <input type="hidden" id="selectedId" name="selectedId" >
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="ehide-modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>


    <!-- create merchandiser modal -->
    <div class="modal fade" id="createMerchandiserModal" name = "createMerchandiserModal" tabindex="-1" role="dialog"  aria-labelledby="createMerchandiserModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createMerchandiserModalLabel">New Merchandiser</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div class="modal-body">
            <form action="{{route('accountsupervisor.merchandiser-list.register')}}" method="POST">
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
            
            <div class="form-group col-md-4">
                <label for="c_first_name" class="col-form-label">First Name: *</label>
                <input type="text" class="form-control" id="c_first_name" name="c_first_name" value="{{ old('c_first_name') }}" required>
            </div>        
            
            <div class="form-group col-md-4">
                <label for="c_middle_name" class="col-form-label">Middle Name: </label>
                <input type="text" class="form-control" id="c_middle_name" name="c_middle_name" value="{{ old('c_middle_name') }}" >
            </div>

            <div class="form-group col-md-4">
                <label for="c_last_name" class="col-form-label">Last Name: *</label>
                <input type="text" class="form-control" id="c_last_name" name="c_last_name" value="{{ old('c_last_name') }}" required>
            </div>

        </div> 

        <div class="row">

            <div class="form-group col-md-4">
                <label for="c_birthdate" class="col-form-label">Birthdate: *</label>
                <input id="c_birthdate" name="c_birthdate" class="form-control" />
            </div>

            <div class="form-group col-md-4">
                <label for="c_first_name" class="col-form-label">Age: *</label>
                <input type="text" class="form-control" id="c_age" name="c_age" readonly>
            </div>

            <div class="form-group col-md-4">
            
                <label for="c_gender" class="col-form-label">Gender: *</label>
                    <!-- <div style="height:10px;"></div> -->
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="c_gender" id="c_male" value="Male">
                        <label class="form-check-label" for="c_type_stationary">Male</label>
                    </div>
        
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="c_gender" id="c_female" value="Female">
                        <label class="form-check-label" for="c_type_roving">Female</label>
                    </div>

            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-4">
                <label for="c_address" class="col-form-label">Address: *</label>
                <input type="text" class="form-control" id="c_address" name="c_address" value="{{ old('c_address') }}" required>
            </div> 

            <div class="form-group col-md-4">
                <label for="c_region" class="col-form-label">Region: *</label>
                <select type="text" class="form-select" id="c_region" name = "c_region" value="{{ old('c_region') }}" required>
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

            <div class="form-group col-md-4">
                <label for="c_number" class="col-form-label">Contact Number: *</label>
                <input type="text" class="form-control" id="c_number" name="c_number" value="{{ old('c_number') }}"  oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11" value="{{ old('number') }}" required>
            </div>
        
        </div>
        
        <div class="row">

            <div class="form-group col-md-4">
                <label for="c_email" class="col-form-label">Email Address: *</label>
                <input type="email" class="form-control" id="c_email" name = "c_email" value="{{ old('c_email') }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="c_date_started" class="col-form-label">Date Started: *</label>
                <input id="c_date_started" name="c_date_started" class="form-control"/>
            </div>

            <div class="form-group col-md-4">
                <label for="c_end_of_contract" class="col-form-label">End of Contract: *</label>
                <input id="c_end_of_contract" name="c_end_of_contract" class="form-control"/>
            </div>

        </div>

        <div class="row">
            
            <div class="form-group col-md-4">   
                <label for="c_total_days" class="col-form-label">Total Days: </label>
                <input type="text" class="form-control" id="c_total_days" name="c_total_days" readonly>
            </div>

            <div class="form-group col-md-4">
                <label for="c_remaining_days" class="col-form-label">Remaining days: </label>
                <input type="text" class="form-control" id="c_remaining_days" name="c_remaining_days" readonly>
            </div>

            <div class="form-group col-md-4">
                <label for="c_remarks" class="col-form-label">Type of Contract: *</label>
                <select type="text" class="form-select" id="c_remarks" name = "c_remarks" value="{{ old('c_remarks') }}" required>
                <option  value="">---Select Remarks---</option>
                    <option  value="Fix-term" @if(old('c_remarks') == "fix-term") {{'selected'}} @endif>Fix-term</option>
                    <option  value="Probasionary" @if(old('c_remarks') == "Probasionary") {{'selected'}} @endif>Probationary</option>
                    <option  value="Regular" @if(old('c_remarks') == "Regular") {{'selected'}} @endif>Regular</option>
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





        <!-- View user modal -->
    <div class="modal fade" id="viewMerchandiserModal" name = "viewMerchandiserModal" tabindex="-1" role="dialog" aria-labelledby="viewMerchandiserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewAccountModalLabel">View Details</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> -->

        </div>
        <div class="modal-body">

        <div class="row">
            <div class="form-group col-md-4">
                <label for="v_first_name" class="col-form-label">First Name:</label>
                <p class="h6" id="v_first_name" name="v_first_name"></p>
            </div>    
        

            <div class="form-group col-md-4">
                <label for="v_middle_name" class="col-form-label">Middle Name:</label>
                <p class="h6" id="v_middle_name" name="v_middle_name"></p>
            </div>
            
            <div class="form-group col-md-4">
                <label for="v_last_name" class="col-form-label">Last Name:</label>
                <p class="h6" id="v_last_name" name="v_last_name"></p>
            </div>
        </div> 
            
            <hr class="w-100 mt-1 mb-1">
            <div class="row">
            
            <div class="form-group col-md-4">
                <label for="v_birthdate" class="col-form-label">Birthdate:</label>
                <p class="h6" id="v_birthdate" name="v_birthdate"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_age" class="col-form-label">Age:</label>
                <p class="h6" id="v_age" name="v_age"></p>
            </div> 
            
            <div class="form-group col-md-4">
                <label for="v_gender" class="col-form-label">Gender:</label>
                <p class="h6" id="v_gender" name="v_gender"></p>
            </div> 

            </div>

            <hr class="w-100 mt-1 mb-1">
            <div class="row">

            <div class="form-group col-md-4">
                <label for="v_address" class="col-form-label">Address:</label>
                <p class="h6" id="v_address" name="v_address"></p>
            </div>

            <div class="form-group col-md-4">
                <label for="v_region" class="col-form-label
                ">Region:</label>
                <p class="h6" id="v_region" name="v_region"></p>
            </div>

            <div class="form-group col-md-4">
                <label for="v_contact" class="col-form-label">Contact:</label>
                <p class="h6" id="v_contact" name="v_contact"></p>
            </div>

            </div>

            <hr class="w-100 mt-1 mb-1">
            <div class="row"> 

            <div class="form-group col-md-4">
                <label for="v_email" class="col-form-label">Email:</label>
                <p class="h6" id="v_email" name="v_email"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_date_started" class="col-form-label">Date Started:</label>
                <p class="h6" id="v_date_started" name="v_date_started"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_end_of_contract" class="col-form-label">End of Contract:</label>
                <p class="h6" id="v_end_of_contract" name="v_end_of_contract"></p>
            </div> 

            </div>

            <hr class="w-100 mt-1 mb-1">
            <div class="row">

            <div class="form-group col-md-3">
                <label for="v_total_days" class="col-form-label">Total Days:</label>
                <p class="h6" id="v_total_days" name="v_total_days"></p>
            </div>

            <div class="form-group col-md-3">
                <label for="v_remaining_days" class="col-form-label">Remaining Days:</label>
                <p class="h6" id="v_remaining_days" name="v_remaining_days"></p>
            </div>
            
            <div class="form-group col-md-3">
                <label for="v_remarks" class="col-form-label">Type of Contract:</label>
                <p class="h6" id="v_remarks" name="v_remarks"></p>
            </div>

            <div class="form-group col-md-3">
                <label for="v_status" class="col-form-label">Status:</label>
                <p class="h6" id="v_status" name="v_status"></p>     
            </div>

            </div>
                
        
        

        

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="vhide-modal">Close</button>
            </div>

            </div>
        </div>
        </div>
        
    
        

        <!-- start: JS -->
        <script src="/asset/user/js/bootstrap.bundle.min.js"></script>

    <script src="/asset/user/js/jquery.min.js"></script>

    <script src="/asset/user/js/script.js"></script>


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />




        @include('sweetalert::alert')

        <script>
            $(document).ready(function () {

            $('#c_birthdate').datepicker({
                format: "mm/dd/yyyy",
                uiLibrary: 'bootstrap5',
                maxDate: new Date()
            });

            $('#c_date_started').datepicker({
                format: "mm/dd/yyyy",
                uiLibrary: 'bootstrap5',
                maxDate: 0
            });

            $('#c_end_of_contract').datepicker({
                format: "mm/dd/yyyy",
                uiLibrary: 'bootstrap5',
                maxDate: 0
            });

            $("#c_date_started").change(function(){

            var gettimeDs = new Date($('#c_date_started').val()).getTime();    
    
            var gettimeDe = new Date($('#c_end_of_contract').val()).getTime();

            var today = new Date().getTime(); 

            var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

            $('#c_total_days').val(total_days);


            });

            $("#c_end_of_contract").change(function(){

             var gettimeDs = new Date($('#c_date_started').val()).getTime();    
    
            var gettimeDe = new Date($('#c_end_of_contract').val()).getTime();

            var today = new Date().getTime(); 


            var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

            var remaining_days = Math.floor((gettimeDe-today) / (365 * 24  * 10000));




            $('#c_remaining_days').val(remaining_days);

            $('#c_total_days').val(total_days);


            });

            $("#c_birthdate").change(function(){

            var birthDate = $('#c_birthdate').val();    
    
            var bday = new Date(birthDate).getTime();

            var today = new Date().getTime();

            var age = Math.floor((today-bday) / (365.25 * 24 * 60 * 60 * 1000));

            $('#c_age').val(age);


            });


            //birthdate
            $('#e_birthdate').datepicker({
                format: "mm/dd/yyyy",
                uiLibrary: 'bootstrap5',
                maxDate: new Date()
            });

            $("#e_birthdate").change(function(){

            var birthDate = $('#e_birthdate').val();    
    
            var bday = new Date(birthDate).getTime();

            var today = new Date().getTime(); 

            var age = Math.floor((today-bday) / (365.25 * 24 * 60 * 60 * 1000));

        

            $('#e_age').val(age);

        // console.log(age);


            });


            //date started
            $('#e_date_started').datepicker({
                format: "mm/dd/yyyy",
                uiLibrary: 'bootstrap5',
                maxDate: 0
            });

            $("#e_date_started").change(function(){

            var gettimeDs = new Date($('#e_date_started').val()).getTime();    
    
            var gettimeDe = new Date($('#e_end_of_contract').val()).getTime();

            var today = new Date().getTime(); 

            var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

            $('#e_total_days').val(total_days);

            
            });

            //end of contract
            $('#e_end_of_contract').datepicker({
                format: "mm/dd/yyyy",
                uiLibrary: 'bootstrap5',
                maxDate: 0
            });

            $("#e_end_of_contract").change(function(){

            var gettimeDs = new Date($('#e_date_started').val()).getTime();    
    
            var gettimeDe = new Date($('#e_end_of_contract').val()).getTime();

            var today = new Date().getTime(); 


            var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

            var remaining_days = Math.floor((gettimeDe-today) / (365 * 24  * 10000));




            $('#e_remaining_days').val(remaining_days);

            $('#e_total_days').val(total_days);

            });

            
            var dataTable = $('#merchandiser').DataTable({
                ajax: {
                    url: '/accountsupervisor/merchandiser-list/fetch-data',
                    dataSrc: 'data'
                },
                columns: [
                    { data: '#' },
                    { data:  'id', visible: false },
                    { data: 'fullname' },
                    { data: 'email_address' }, 
                    { data: 'actions', orderable: false }
                ]
            });

            function mddyyyy_to_mmmdyyyy(s) {
            var s = s.split(/\D/),
            dt = new Date(s[2], s[0] - 1, s[1]);
            return dt.toLocaleString('en-CA', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
            });
            }

            $('#merchandiser tbody').on('click', 'img.button-image1', function (e) {
            e.preventDefault();

                var selectedRowData = dataTable.row($(this).closest('tr')).data();
                var id = selectedRowData.id;
                $.ajax({
                url: '/accountsupervisor/merchandiser/list/retrieve-view/' + id ,
                type: 'GET', 
                dataType: 'JSON',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },   
                success: function(response){
              
                    var newDate = new Date(response.birthdate).toLocaleDateString()
                    var newDateDs = new Date(response.date_started).toLocaleDateString()
                    var newDateDe = new Date(response.end_of_contract).toLocaleDateString()

                    gettimeDs = new Date(newDateDs).getTime();
                    gettimeDe = new Date(newDateDe).getTime();

                    gettimeTd = new Date().getTime();

                    var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

                    var remaining_days = Math.floor((gettimeDe-gettimeTd) / (365 * 24  * 10000));

                    if (remaining_days < 0){
                        remaining_days = 0;
                    }
                    

                    if(response.middle_name !== null){
                        $('#v_middle_name').text(response.middle_name).css({"font-style" : "regular" , "color" : "black"});
                    
                    }else{
                        
                        $('#v_middle_name').text("NULL").css({"font-style" : "italic" , "color" : "grey"});
                    }
                    $('#v_first_name').text(response.first_name);
                    $('#v_last_name').text(response.last_name);
                    $('#v_birthdate').text(mddyyyy_to_mmmdyyyy(newDate));
                    $('#v_age').text(response.age);
                    $('#v_gender').text(response.gender);
                    $('#v_address').text(response.address);
                    $('#v_region').text(response.region);
                    $('#v_contact').text(response.contact_number);
                    $('#v_email').text(response.email_address);
                    $('#v_date_started').text(mddyyyy_to_mmmdyyyy(newDate));
                    $('#v_end_of_contract').text(mddyyyy_to_mmmdyyyy(newDate));
                    $('#v_remarks').text(response.remarks);
                    $('#v_total_days').text(total_days);
                    $('#v_remaining_days').text(remaining_days);
                    $('#v_store_name').text(response.store_name);
                    $('#v_status').text(response.is_active);

                    $('#viewMerchandiserModal').modal('show');

                    if(response.is_active === 1){
                    $('#v_status').text("active");
                
                }else{




                    $('#v_status').text("inactive");
                }
                }
        
            })
        });


        $('#merchandiser tbody').on('click', 'img.button-image2', function (e) {
            e.preventDefault();

                var selectedRowData = dataTable.row($(this).closest('tr')).data();
                var id = selectedRowData.id;
                $.ajax({
                url: '/accountsupervisor/merchandiser/list/retrieve-update/' + id , 
                type: 'GET', 
                dataType: 'JSON',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },   
                success: function(response){
                
                //  var date = new Date(response.birthdate).toLocaleDateString()
                    // response = JSON.parse(response);
                    var newDate = new Date(response.birthdate).toLocaleDateString()
                    var newDateDs = new Date(response.date_started).toLocaleDateString()
                    var newDateDe = new Date(response.end_of_contract).toLocaleDateString()

                    gettimeDs = new Date(newDateDs).getTime();
                    gettimeDe = new Date(newDateDe).getTime();

                    gettimeTd = new Date().getTime();

                    var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

                    var remaining_days = Math.floor((gettimeDe-gettimeTd) / (365 * 24  * 10000));

                    if (remaining_days < 0){
                        remaining_days = 0;
                    }
                
                    
                    $('#selectedId').val(id);
            
                    $('#e_middle_name').val(response.middle_name);
                
            
                    $('#e_first_name').val(response.first_name);
                    $('#e_last_name').val(response.last_name);
                    $('#e_birthdate').val(newDate);
                    $('#e_age').val(response.age);
                    $('#e_gender').val(response.gender);
                    $('#e_address').val(response.address);
                    $('#e_region').val(response.region);
                    $('#e_contact').val(response.contact_number);
                    $('#e_email').val(response.email_address);
                    $('#e_number').val(response.contact_number);
                    $('#e_date_started').val(newDateDs);
                    $('#e_end_of_contract').val(newDateDe);
                    $('#e_remarks').val(response.remarks);
                    $('#e_total_days').val(total_days);
                    $('#e_remaining_days').val(remaining_days);
                    $('#e_status').val(response.is_active);

                if(response.gender === "Male"){
                    $('#e_male').prop("checked" , true);
                
                }else{
                    $('#e_female').prop("checked" , true);
                }

                    $('#editMerchandiserModal').modal('show');
                
                    
                }
        
            })
        });


        //  $('#createAccountModal').modal({
        // backdrop: 'static',
        // keyboard: false  // to prevent closing with Esc button (if you want this too)
        // });

        $("#createMerchandiserModal").modal({
            show: false,
            backdrop: 'static'
        });

        $("#hitme").click(function(){
            $("#createMerchandiserModal").modal('show');
        });

        $("#ehide-modal").click(function(){
            $("#editMerchandiserModal").modal('hide');
        });

        $("#hide-modal").click(function(){
            $("#createMerchandiserModal").modal('hide');
        });


        $("#vhide-modal").click(function(){
            $("#viewMerchandiserModal").modal('hide');
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
            
                $('#createMerchandiserModal')[0].reset();
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
            
                $('#editMerchandiserModal').modal('show');
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
            
                $('#createMerchandiserModal').modal('show');
            }
        });

            </script>
    @endif


    @include('sweetalert::alert')


    </body>

    </html>