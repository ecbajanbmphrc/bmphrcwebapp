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
            <li class="sidebar-menu-item active">
                <a href="{{ route('accountsupervisor.view.coordinator') }}">
                    <i class="ri-account-pin-circle-line sidebar-menu-item-icon"></i>Coordinator
                </a>
            </li>
            <li class="sidebar-menu-item">
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
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Reserve page
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
                <h5 class="fw-bold mb-0 me-auto">COORDINATOR</h5>
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

            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCoordinatorModal" id="hitme" name="hitme">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                </svg>
            ADD</button>
               
             </div>

                
            <div class="card-body">
            <h5 class="card-title">Coordinator List</h5>
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                <table id="coordinator" class="table table-hover" style="width:100%">
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

     <!-- edit coordinator modal -->
 <div class="modal fade" id="editCoordinatorModal" name ="editCoordinatorModal" tabindex="-1" role="dialog"  aria-labelledby="editCoordinatorModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCoordinatorModalLabel">Edit Coordinator Details</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form action="{{route('accountsupervisor.coordinator-list.update-account')}}" method="POST">
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
            <label for="e_first_name" class="col-form-label">Age:</label>
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

        <div class="form-group col-md-6">
            <label for="e_address" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="e_address" name="e_address" value="{{ old('e_address') }}" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="e_region" class="col-form-label">Region:</label>
            <select type="text" class="form-select" id="e_region" name = "e_region" value="{{ old('e_region') }}" required>
            <option  value="">---Select Region---</option>
                <option  value="Region 1" @if(old('c_region') == "Region 1") {{'selected'}} @endif>Region 1</option>
                <option  value="Region 2" @if(old('c_region') == "Region 2") {{'selected'}} @endif>Region 2</option>
                <option  value="Region 3" @if(old('c_region') == "Region 3") {{'selected'}} @endif>Region 3</option>
                <option  value="Region 4" @if(old('c_region') == "Region 4") {{'selected'}} @endif>Region 4</option>
                <option  value="Region 5" @if(old('c_region') == "Region 5") {{'selected'}} @endif>Region 5</option>
                <option  value="Region 6" @if(old('c_region') == "Region 6") {{'selected'}} @endif>Region 6</option>
                <option  value="Region 7" @if(old('c_region') == "Region 7") {{'selected'}} @endif>Region 7</option>
                <option  value="Region 8" @if(old('c_region') == "Region 8") {{'selected'}} @endif>Region 8</option>
                <option  value="Region 9" @if(old('c_region') == "Region 9") {{'selected'}} @endif>Region 9</option>
                <option  value="Region 10" @if(old('c_region') == "Region 10") {{'selected'}} @endif>Region 10</option>
                <option  value="Region 11" @if(old('c_region') == "Region 11") {{'selected'}} @endif>Region 11</option>
                <option  value="Region 12" @if(old('c_region') == "Region 12") {{'selected'}} @endif>Region 12</option>
                <option  value="Region 13" @if(old('c_region') == "Region 13") {{'selected'}} @endif>Region 13</option>
                <option  value="NCR" @if(old('c_region') == "NCR") {{'selected'}} @endif>NCR</option>
                <option  value="MIMAROPA" @if(old('c_region') == "MIMAROPA") {{'selected'}} @endif>MIMAROPA</option>
                <option  value="CAR" @if(old('c_region') == "CAR") {{'selected'}} @endif>CAR</option>
                <option  value="BARMM" @if(old('c_region') == "BARMM") {{'selected'}} @endif>BARMM</option>
            </select>
        </div>

        
    
    </div>

    <div class="row">

        <div class="form-group col-md-6">
            <label for="e_number" class="col-form-label">Contact Number:</label>
            <input type="text" class="form-control" id="e_number" name="e_number" value="{{ old('e_number') }}"  oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11" value="{{ old('number') }}" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="e_email" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="e_email" name = "e_email" value="{{ old('e_email') }}" required>
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


 <!-- create coordinator modal -->
 <div class="modal fade" id="createCoordinatorModal" name = "createCoordinatorModal" tabindex="-1" role="dialog"  aria-labelledby="createCoordinatorModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCoordinatorModalLabel">New Coordinator</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form action="{{route('accountsupervisor.coordinator-list.register')}}" method="POST">
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
            <label for="c_middle_name" class="col-form-label">Middle Name:</label>
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
            <label for="c_age" class="col-form-label">Age:</label>
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

        <div class="form-group col-md-6">
            <label for="c_address" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="c_address" name="c_address" value="{{ old('c_address') }}" required>
        </div>

        <div class="form-group col-md-6">
            <label for="e_region" class="col-form-label">Region:</label>   
            <select type="text" class="form-select" id="c_region" name = "c_region" value="{{ old('c_region') }}" required>
            <option  value="">---Select Region---</option>
                <option  value="Region 1" @if(old('c_region') == "Region 1") {{'selected'}} @endif>Region 1</option>
                <option  value="Region 2" @if(old('c_region') == "Region 2") {{'selected'}} @endif>Region 2</option>
                <option  value="Region 3" @if(old('c_region') == "Region 3") {{'selected'}} @endif>Region 3</option>
                <option  value="Region 4" @if(old('c_region') == "Region 4") {{'selected'}} @endif>Region 4</option>
                <option  value="Region 5" @if(old('c_region') == "Region 5") {{'selected'}} @endif>Region 5</option>
                <option  value="Region 6" @if(old('c_region') == "Region 6") {{'selected'}} @endif>Region 6</option>
                <option  value="Region 7" @if(old('c_region') == "Region 7") {{'selected'}} @endif>Region 7</option>
                <option  value="Region 8" @if(old('c_region') == "Region 8") {{'selected'}} @endif>Region 8</option>
                <option  value="Region 9" @if(old('c_region') == "Region 9") {{'selected'}} @endif>Region 9</option>
                <option  value="Region 10" @if(old('c_region') == "Region 10") {{'selected'}} @endif>Region 10</option>
                <option  value="Region 11" @if(old('c_region') == "Region 11") {{'selected'}} @endif>Region 11</option>
                <option  value="Region 12" @if(old('c_region') == "Region 12") {{'selected'}} @endif>Region 12</option>
                <option  value="Region 13" @if(old('c_region') == "Region 13") {{'selected'}} @endif>Region 13</option>
                <option  value="NCR" @if(old('c_region') == "NCR") {{'selected'}} @endif>NCR</option>
                <option  value="MIMAROPA" @if(old('c_region') == "MIMAROPA") {{'selected'}} @endif>MIMAROPA</option>
                <option  value="CAR" @if(old('c_region') == "CAR") {{'selected'}} @endif>CAR</option>
                <option  value="BARMM" @if(old('c_region') == "BARMM") {{'selected'}} @endif>BARMM</option>
            </select>
        </div>

    </div>
    
    <div class="row">

        <div class="form-group col-md-6">
            <label for="c_number" class="col-form-label">Contact Number:</label>
            <input type="text" class="form-control" id="c_number" name="c_number" value="{{ old('c_number') }}"  oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11" value="{{ old('number') }}" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="c_email" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="c_email" name = "c_email" value="{{ old('c_email') }}" required>
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





        <!-- View coordinator modal -->
    <div class="modal fade" id="viewCoordinatorModal" name = "viewCoordinatorModal" tabindex="-1" role="dialog" aria-labelledby="viewCoordinatorModalLabel" aria-hidden="true">
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

                <div class="form-group col-md-6">
                    <label for="v_address" class="col-form-label">Address:</label>
                    <p class="h6" id="v_address" name="v_address"></p>
                </div>

                <div class="form-group col-md-6">
                    <label for="v_region" class="col-form-label">Region:</label>
                    <p class="h6" id="v_region" name="v_region"></p>
                </div>
                
            </div>

            <hr class="w-100 mt-1 mb-1">
            <div class="row">
            
            <div class="form-group col-md-4">
                <label for="v_contact" class="col-form-label">Contact:</label>
                <p class="h6" id="v_contact" name="v_contact"></p>
            </div> 

            <div class="form-group col-md-4">
                <label for="v_email" class="col-form-label">Email:</label>
                <p class="h6" id="v_email" name="v_email"></p>
            </div> 
            
            <div class="form-group col-md-4">
                <label for="v_store_name" class="col-form-label">Store Count:</label>
                <p class="h6" id="v_store_name" name="v_store_name"></p>
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

        $("#c_birthdate").change(function(){

        var birthDate = $('#c_birthdate').val();    
   
        var bday = new Date(birthDate).getTime();

        var today = new Date().getTime();


        var age = Math.floor((today-bday) / (365.25 * 24 * 60 * 60 * 1000));

    

        $('#c_age').val(age);

       // console.log(age);


        });


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

        var dataTable = $('#coordinator').DataTable({
            ajax: {
                url: '/accountsupervisor/coordinator-list/fetch-data',
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


        // modal clicking function starts here
        $('#coordinator tbody').on('click', 'img.button-image1', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;
            $.ajax({
            url: '/accountsupervisor/coordinator/list/retrieve-view/' + id ,
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
                

                if(response.middle_name !== null){
                    $('#v_middle_name').text(response.middle_name).css({"font-style" : "regular" , "color" : "black"});
                   
                }else{
                    
                    $('#v_middle_name').text("NULL").css({"font-style" : "italic" , "color" : "gray"});
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
                $('#v_store_name').text(response.store_name);
                $('#v_type_of_deployment').text(response.type_of_deployment);

                $('#viewCoordinatorModal').modal('show');
            
            }
     
        })
     });
    // modal clicking functions starts here


     $('#coordinator tbody').on('click', 'img.button-image2', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;
            $.ajax({
            url: '/accountsupervisor/coordinator/list/retrieve-update/' + id , 
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

              if(response.gender === "Male"){
                $('#e_male').prop("checked" , true);
               
              }else{
                $('#e_female').prop("checked" , true);
              }

                $('#editCoordinatorModal').modal('show');
            
            }
     
        })
     });


    //  $('#createAccountModal').modal({
    // backdrop: 'static',
    // keyboard: false  // to prevent closing with Esc button (if you want this too)
    // });

    $("#createCoordinatorModal").modal({
        show: false,
        backdrop: 'static'
    });

    $("#hitme").click(function(){
        $("#createCoordinatorModal").modal('show');
    });

    $("#ehide-modal").click(function(){
        $("#editCoordinatorModal").modal('hide');
    });

    $("#hide-modal").click(function(){
        $("#createCoordinatorModal").modal('hide');
    });


    $("#vhide-modal").click(function(){
        $("#viewCoordinatorModal").modal('hide');
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
          
            $('#createCoordinatorModal')[0].reset();
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
          
            $('#editCoordinatorModal').modal('show');
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
          
            $('#createCoordinatorModal').modal('show');
        }
    });

        </script>
@endif


@include('sweetalert::alert')

</body>

</html>