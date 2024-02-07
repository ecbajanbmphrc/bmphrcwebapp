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
            <li class="sidebar-menu-item active">
                <a href="{{ route('accountsupervisor.view.door') }}">
                    <i class="ri-store-line sidebar-menu-item-icon"></i>Doors
                </a>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Home
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
                <h5 class="fw-bold mb-0 me-auto">DOOR</h5>
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
                <!-- <div class="card-header">
               
                </div> -->
            <div class="card-body">
            <h5 class="card-title">Door List</h5>
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                <table id="door" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="display:none">ID</th>
                            <th>Account</th>
                            <th>Region</th>
                            <th>Account Branch</th>
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

    <!-- View user modal -->
<div class="modal fade" id="viewDoorModal" name = "viewDoorModal" tabindex="-1" role="dialog" aria-labelledby="viewDoorModalLabel" aria-hidden="true">
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
          <div class="form-group col-md-6">
            <label for="v_account" class="col-form-label">Account:</label>
            <p class="h6" id="v_account" name="v_account"></p>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="v_region" class="col-form-label">Region:</label>
            <p class="h6" id="v_region" name="v_region"></p>
          </div> 
        </div> 
        
        <div class="row">
          <div class="form-group col-md-6">
            <label for="v_area" class="col-form-label">Area:</label>
            <p class="h6" id="v_area" name="v_area"></p>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="v_account_branch" class="col-form-label">Account Branch:</label>
            <p class="h6" id="v_account_branch" name="v_account_branch"></p>
          </div> 
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="v_type_of_deployment" class="col-form-label">Type of Deployment:</label>
            <p class="h6" id="v_type_of_deployment" name="v_type_of_deployment"></p>
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

    @include('sweetalert::alert')

    <script>
        $(document).ready(function () {
        var dataTable = $('#door').DataTable({
            ajax: {
                url: '/accountsupervisor/door-list/fetch-data',
                dataSrc: 'data'
            },
            columns: [
                { data: '#' },
                { data:  'id', visible: false },
                { data: 'account' },
                { data: 'region' },
                { data: 'account_branch' }, 
                { data: 'actions', orderable: false }
            ]
        });

        $('#door tbody').on('click', 'img.button-image1', function (e) {
        e.preventDefault();

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            var id = selectedRowData.id;
            $.ajax({
            url: '/accountsupervisor/door/list/retrieve-view/' + id ,
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
                $('#v_account_branch').text(response.account_branch);
                $('#v_type_of_deployment').text(response.type_of_deployment);

                $('#viewDoorModal').modal('show');
            
            }
     
        })
     });

        $("#vhide-modal").click(function(){
        $("#viewDoorModal").modal('hide');
        });
    });
    </script>
</body>

</html>