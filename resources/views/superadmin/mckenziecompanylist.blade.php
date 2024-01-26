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
                        <a href="#">MCKENZIE</a>
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
                <h5 class="fw-bold mb-0 me-auto">Payroll Officer List</h5>
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
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
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
    
    <table id="superadmin" class="table table-hover" style="width:100%">
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
 <div class="modal fade" id="createUserModal" name = "createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">New message</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form action="{{route('superadmin.super-admin-list.register')}}" method="POST">
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
            <label for="c_first_name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="c_first_name" name="c_first_name" value="{{ old('c_first_name') }}" required>
          </div>    
       

        <div class="form-group col-md-6">
            <label for="c_last_name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="c_last_name" name="c_last_name" value="{{ old('c_last_name') }}" required>
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


        <div class="row">


          <div class="form-group col-md-6">
            <label for="c_password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="c_password" name="c_password" value="{{ old('c_password') }}" required>
          </div>    
       

        <div class="form-group col-md-6">
            <label for="c_confirmPassword" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control" name="c_confirmPassword" id="c_confirm_password">
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
      <div class="modal fade" id="editUserModal" name = "editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit Details</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

      </div>
      <div class="modal-body">
        <form action="{{route('superadmin.super-admin-list.update-account')}}" method="POST">

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
            <label for="e_first_name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="e_first_name" name="e_first_name" value="{{ old('e_first_name') }}" required>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="e_last_name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="e_last_name" name="e_last_name" value="{{ old('e_last_name') }}" required>
          </div> 
        </div>  


        <div class="row">

    

          <div class="form-group col-md-6">
            <label for="e_email" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="e_email" name = "e_email" value="{{ old('e_email') }}" required>
          </div> 

          <div class="form-group col-md-6">
            <label for="e_number" class="col-form-label">Contact Number:</label>
            <input type="text" class="form-control" id="e_number" name="e_number" value="{{ old('e_number') }}" oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11" value="{{ old('number') }}" required>
          </div>    
          <input type="hidden" id="selectedId" name="selectedId" value="{{ old('selectedId') }}">
        </div> 
    </div>
        
        
     
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
        <h5 class="modal-title" id="editUserModalLabel">View Details</h5>
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
        var dataTable = $('#superadmin').DataTable({
            ajax: {
                url: '/superadmin/superadmin/list/fetch-data',
                dataSrc: 'data'
            },
            columns: [
                { data: '#' },
                { data: 'id', visible: false },
                { data: 'first_name' },
                { data: 'email' },
                { data: 'active', orderable: false },
                { data: 'actions', orderable: false }
            ]
        });

        $('#superadmin tbody').on('click', 'a.clickable', function (e) {
            e.preventDefault();

            var data = dataTable.row($(this).parents('tr')).data();
            var id = data.id;
            var newStatus = (data.is_active == 1 ? 0 : 1);

            Swal.fire({
                text: 'Are you sure you want to change the account status?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'Cancel',
               
                preConfirm: function () {
                    return fetch('/superadmin/superadmin/list/update-active-status', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({ id: id, newStatus: newStatus })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            dataTable.ajax.reload();
                            Swal.fire('Active Status Changed!', '', 'success');
                        } else {
                            throw new Error('Failed to update active status.');
                        }
                    })
                    .catch(error => {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    });
                }
            });
        });


    $('#superadmin tbody').on('click', 'img.button-image2', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var myid = selectedRowData.id;

              $.ajax({
            type: 'POST',
            url: '/superadmin/superadmin/list/retrieve-update',
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            data: JSON.stringify({id: myid}),
            success: function(response){
                // response = JSON.parse(response);
                $('#selectedId').val(response.id);
                $('#e_first_name').val(response.first_name);
                $('#e_last_name').val(response.last_name);
                $('#e_number').val(response.contact_number);
                $('#e_email').val(response.email);    
                $('#editUserModal').modal('show');
            
            }
     
        })
    });
            

    
   



      


$('#superadmin tbody').on('click', 'img.button-image1', function (e) {
        e.preventDefault();

    
        var selectedRowData = dataTable.row($(this).closest('tr')).data();
        var myid = selectedRowData.id;
        console.log(myid);

          $.ajax({
        type: 'POST',
        url: '/superadmin/superadmin/list/retrieve-view',
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
//  alert("button inside modal clicked");
    $("#createUserModal").modal('show');
    console.error();
    });

    $("#hide-modal").click(function(){
        $("#createUserModal").modal('hide');
    });

    $("#ehide-modal").click(function(){
        $("#editUserModal").modal('hide');
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
          
            $('#createUserModal')[0].reset();
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
          
            $('#editUserModal').modal('show');
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
          
            $('#createUserModal').modal('show');
        }
    });

        </script>
@endif



        @include('sweetalert::alert')
</body>

</html>