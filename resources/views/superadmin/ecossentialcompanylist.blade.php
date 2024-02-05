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
            <li class="sidebar-menu-item">
                <a href="#">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Sample
                </a>
            </li>
            <li class="sidebar-menu-item has-dropdown mt-2">
                <a href="#">
                    <i class="ri-user-line sidebar-menu-item-icon"></i>Accounts
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.superadmin') }}">Admin</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">Payroll Head</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.superadmin') }}">Payroll Officer</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('superadmin.view.accountsupervisor') }}">Account Supervisor</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown mt-2">
                <a href="#">
          
                    <i class="ri-building-line sidebar-menu-item-icon"></i>Companies
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('superadmin.view.efc') }}">EFC</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.mckenzie')}}">MCKENZIE</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.ecossential') }}">ECOSSENTIAL</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.rfm') }}">RFM</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.madis') }}">MADIS</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item">
                <a href="{{ route('logout')}}">
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
                <h5 class="fw-bold mb-0 me-auto">Company Ecossential List</h5>
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
  <div class="card-header">
  <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal" id="hitme" name="hitme">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
</svg>
  ADD</button>
  </div>
  <div class="card-body">
    <h5 class="card-title">Account List</h5>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    
    <table id="ecossential" class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th style="display:none">ID</th>
                <th>Account</th>
                <th>Region</th>
                <th>Account Branch</th>
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
                    <form action="{{route('superadmin.ecossential-list.register')}}" method="POST">
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
                <option  value="Ever" @if(old('c_account') == "Ever") {{'selected'}} @endif>Ever</option>
                <option  value="Puregold" @if(old('c_account') == "Puregold") {{'selected'}} @endif>Puregold</option>
                <option  value="Robinson" @if(old('c_account') == "Robinson") {{'selected'}} @endif>Robinson</option>
                <option  value="Super 8" @if(old('c_account') == "Super 8") {{'selected'}} @endif>Super 8</option>
                <option  value="Ultramega" @if(old('c_account') == "Ultramega") {{'selected'}} @endif>Ultramega</option>
                <option  value="Waltermart" @if(old('c_account') == "Waltermart") {{'selected'}} @endif>Waltermart</option>
            </select>
          </div>    
       

          <div class="form-group col-md-6">
            <label for="c_region" class="col-form-label">Region:</label>
            <select class="form-select" id="c_region" name="c_region">
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
            <label for="c_area" class="col-form-label">Area:</label>
            <select class="form-select" id="c_area" name="c_area">
            <option  value="">---Select Area---</option>
                <option  value="GMA" @if(old('c_area') == "GMA") {{'selected'}} @endif>GMA</option>
                <option  value="MIN" @if(old('c_area') == "MIN") {{'selected'}} @endif>MIN</option>
                <option  value="NOL" @if(old('c_area') == "NOL") {{'selected'}} @endif>NOL</option>
                <option  value="SOL" @if(old('c_area') == "SOL") {{'selected'}} @endif>SOL</option>
                <option  value="VIS" @if(old('c_area') == "VIS") {{'selected'}} @endif>VIS</option>
            </select>
          </div> 
          
          <div class="form-group col-md-6">
            <label for="c_account_branch" class="col-form-label">Account Branch:</label>
            <input type="text" class="form-control" id="c_account_branch" name="c_account_branch" value="{{ old('c_account_branch') }}" required>
          </div>
        </div>  

        <div class="row">

        <div class="form-group col-md-6">
        
        <label for="c_type_of_deployment" class="col-form-label">Type of Deployment:</label>
        <br>
        <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" name="c_type_of_deployment" id="c_type_stationary" value="Stationary" checked>
         <label class="form-check-label" for="c_type_stationary">Stationary</label>
      </div>
    
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="c_type_of_deployment" id="c_type_roving" value="Roving">
        <label class="form-check-label" for="c_type_roving">Roving</label>
      </div>

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
        <form action="{{route('superadmin.efc-list.update-account')}}" method="POST">

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
          <div class="form-group col-md-6">
            <label for="e_account" class="col-form-label">Account:</label>
            <select class="form-select" id="e_account" name="e_account" >
            <option  value="" >---Select Account---</option>
                <option  value="Ever" @if(old('e_account') == "Ever") {{'selected'}} @endif>Ever</option>
                <option  value="Puregold" @if(old('e_account') == "Puregold") {{'selected'}} @endif>Puregold</option>
                <option  value="Robinson" @if(old('e_account') == "Robinson") {{'selected'}} @endif>Robinson</option>
                <option  value="Super 8" @if(old('e_account') == "Super 8") {{'selected'}} @endif>Super 8</option>
                <option  value="Ultramega" @if(old('e_account') == "Ultramega") {{'selected'}} @endif>Ultramega</option>
                <option  value="Waltermart" @if(old('e_account') == "Waltermart") {{'selected'}} @endif>Waltermart</option>

            </select>
          </div>    
       

          <div class="form-group col-md-6">
            <label for="e_region" class="col-form-label">Region:</label>
            <select class="form-select" id="e_region" name="e_region">
            <option  value="">---Select Region---</option>
                <option  value="Region 1" @if(old('e_region') == "Region 1") {{'selected'}} @endif>Region 1</option>
                <option  value="Region 2" @if(old('e_region') == "Region 2") {{'selected'}} @endif>Region 2</option>
                <option  value="Region 3" @if(old('e_region') == "Region 3") {{'selected'}} @endif>Region 3</option>
                <option  value="Region 4" @if(old('e_region') == "Region 4") {{'selected'}} @endif>Region 4</option>
                <option  value="Region 5" @if(old('e_region') == "Region 5") {{'selected'}} @endif>Region 5</option>
                <option  value="Region 6" @if(old('e_region') == "Region 6") {{'selected'}} @endif>Region 6</option>
                <option  value="Region 7" @if(old('e_region') == "Region 7") {{'selected'}} @endif>Region 7</option>
                <option  value="Region 8" @if(old('e_region') == "Region 8") {{'selected'}} @endif>Region 8</option>
                <option  value="Region 9" @if(old('e_region') == "Region 9") {{'selected'}} @endif>Region 9</option>
                <option  value="Region 10" @if(old('e_region') == "Region 10") {{'selected'}} @endif>Region 10</option>
                <option  value="Region 11" @if(old('e_region') == "Region 11") {{'selected'}} @endif>Region 11</option>
                <option  value="Region 12" @if(old('e_region') == "Region 12") {{'selected'}} @endif>Region 12</option>
                <option  value="Region 13" @if(old('e_region') == "Region 13") {{'selected'}} @endif>Region 13</option>
                <option  value="NCR" @if(old('e_region') == "NCR") {{'selected'}} @endif>NCR</option>
                <option  value="MIMAROPA" @if(old('e_region') == "MIMAROPA") {{'selected'}} @endif>MIMAROPA</option>
                <option  value="CAR" @if(old('e_region') == "CAR") {{'selected'}} @endif>CAR</option>
                <option  value="BARMM" @if(old('e_region') == "BARMM") {{'selected'}} @endif>BARMM</option>
            </select>
          </div>
          
         

        </div>  


        <div class="row">

         <div class="form-group col-md-6">
            <label for="e_area" class="col-form-label">Area:</label>
            <select class="form-select" id="e_area" name="e_area">
            <option  value="">---Select Area---</option>
                <option  value="GMA" @if(old('e_area') == "GMA") {{'selected'}} @endif>GMA</option>
                <option  value="MIN" @if(old('e_area') == "MIN") {{'selected'}} @endif>MIN</option>
                <option  value="NOL" @if(old('e_area') == "NOL") {{'selected'}} @endif>NOL</option>
                <option  value="SOL" @if(old('e_area') == "SOL") {{'selected'}} @endif>SOL</option>
                <option  value="VIS" @if(old('e_area') == "VIS") {{'selected'}} @endif>VIS</option>
            </select>
          </div> 
          
          <div class="form-group col-md-6">
            <label for="e_account_branch" class="col-form-label">Account Branch:</label>
            <input type="text" class="form-control" id="e_account_branch" name="e_account_branch" value="{{ old('e_account_branch') }}" required>
          </div>
          
        </div>  

        <div class="row">

        <div class="form-group col-md-6">
            <label for="e_status" class="col-form-label">Status:</label>
            <select class="form-select" id="e_status" name="e_status">
            <option  value="">---Select Status---</option>
                <option  value="active" @if(old('e_status') == "active") {{'selected'}} @endif>active</option>
                <option  value="inactive" @if(old('e_status') == "inactive") {{'selected'}} @endif>inactive</option>
                <option  value="closed store" @if(old('e_status') == "closed store") {{'selected'}} @endif>closed store</option>
            </select>
          </div> 
          

        <div class="form-group col-md-6">
        
        <label for="e_type_of_deployment" class="col-form-label">Type of Deployment:</label>
        <br>
        <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" name="e_type_of_deployment" id="e_type_stationary" value="Stationary">
         <label class="form-check-label" for="e_type_stationary">Stationary</label>
      </div>
    
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="e_type_of_deployment" id="e_type_roving" value="Roving">
        <label class="form-check-label" for="e_type_roving">Roving</label>
       </div>

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
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

      </div>
      <div class="modal-body">

      <div class="row">
          <div class="form-group col-md-6">
            <label for="v_first_name" class="col-form-label">First Name:</label>
            <p class="h6" id="v_first_name" name="v_first_name"></p>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="v_last_name" class="col-form-label">Last Name:</label>
            <p class="h6" id="v_last_name" name="v_last_name"></p>
          </div> 
        </div> 
        
        <div class="row">
          <div class="form-group col-md-6">
            <label for="v_contact_number" class="col-form-label">Contact Number:</label>
            <p class="h6" id="v_contact_number" name="v_contact_number"></p>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="v_email" class="col-form-label">Email:</label>
            <p class="h6" id="v_email" name="v_email"></p>
          </div> 
        </div>

    

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="vhide-modal">Close</button>
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
        var dataTable = $('#ecossential').DataTable({
            ajax: {
                url: '/superadmin/ecossential/list/fetch-data',
                dataSrc: 'data'
            },
            columns: [
                { data: '#' },
                { data: 'id', visible: false },
                { data: 'account' },
                { data: 'region' },
                { data: 'account_branch' },
                { data: 'status', orderable: false },
                { data: 'actions', orderable: false }
            ]
        });



    $('#ecossential tbody').on('click', 'img.button-image2', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;

            $.ajax({
            url: '/superadmin/ecossential/list/retrieve-update/' + id ,
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(response){
                // response = JSON.parse(response);
                $('#selectedId').val(id);
                $('#e_account').val(response.account);
                $('#e_region').val(response.region);
                $('#e_area').val(response.area);
                $('#e_account_branch').val(response.account_branch);
                $('#e_status').val(response.status);

                type = response.type_of_deployment;
                // is_type = (type === "stationary" ? "stationary" : "roving");

                if(type === "Stationary"){
                    $("#e_type_stationary").attr('checked', true);
                }else{
                    $("#e_type_roving").attr('checked', true);
                }

           
                $('#editAccountModal').modal('show');
            
            }
     
        })
    });
            

    
   

$('#ecossential tbody').on('click', 'img.button-image1', function (e) {
        e.preventDefault();

    
        var selectedRowData = dataTable.row($(this).closest('tr')).data();
        var myid = selectedRowData.id;
        console.log(myid);

          $.ajax({
        type: 'POST',
        url: '/superadmin/ecossential/list/retrieve-view',
        dataType: 'JSON',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },   
        data: JSON.stringify({id: myid}),
        success: function(response){
            
            $('#v_first_name').text(response.first_name);
            $('#v_last_name').text(response.last_name);
            $('#v_contact_number').text(response.contact_number);
            $('#v_email').text(response.email);   
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