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
        .button-image3{
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
                    <i class="ri-store-line sidebar-menu-item-icon"></i>Store
                </a>
            </li>
            <li class="sidebar-menu-item">
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
                <h5 class="fw-bold mb-0 me-auto">Store List</h5>
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
                            <th>Store</th>
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

    <!-- Edit door modal -->
<div class="modal fade" id="editDoorModal" name = "editDoorModal" tabindex="-1" role="dialog" aria-labelledby="viewDoorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDoorModalLabel">Edit Details</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

      </div>
      <div class="modal-body">
        <form action="{{route('accountsupervisor.door-list.update-account')}}" method="POST">
        @csrf
      <div class="row">
          <div class="form-group col-md-6">
            <label for="e_account" class="col-form-label">Account:</label>
            <p class="h6" id="e_account" name="e_account"></p>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="e_region" class="col-form-label">Region:</label>
            <p class="h6" id="e_region" name="e_region"></p>
          </div> 
        </div> 
        
        <div class="row">
          <div class="form-group col-md-6">
            <label for="e_area" class="col-form-label">Area:</label>
            <p class="h6" id="e_area" name="e_area"></p>
          </div>    
       

         <div class="form-group col-md-6">
            <label for="e_store_name" class="col-form-label">Store name:</label>
            <p class="h6" id="e_store_name" name="e_store_name"></p>
          </div> 
        </div>

        <div class="row">
         <!-- can we do 38,788 in 3 laptop -->
          <div class="form-group col-md-6">
            <label for="e_coordinator" class="col-form-label">Coordinator:</label>
            <select class="form-control" id="e_coordinator" name="e_coordinator">
            <option  value="" >---Select Coordinator---</option>
              @foreach ($coordinator_array as $id => $value)
              <option value="{{ $id }}">{{ $value }}</option>
                @endforeach
            </select>
          </div>  

          <div class="form-group col-md-6">
            <label for="e_type_of_deployment" class="col-form-label">Type of Deployment:</label>
            <p class="h6" id="e_type_of_deployment" name="e_type_of_deployment"></p>
          </div> 
    
        </div>


        <div class="row">
            <div class="form-group col-md-6">
                <label for="e_merchandiser" class="col-form-label">Merchandiser Count:</label>
                <div class="input-group">
                    <input class="form-control" id="e_merchandiser" name="e_merchandiser" readonly>
                    <div class="input-group-append">
                     <span class="input-group-text" style="border-radius: 0 6px 6px 0;">
                        <button type="button" class="bi bi-eye" data-bs-toggle="modal" data-bs-target="#merchandiserAssign" id="show_merchandiser"></button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

   



        <input type ="hidden" name="selectedID" id="selectedID">
    
        <!-- <div class="border-top my-3"></div> -->

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="ehide-modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
        </div>
        </div>
     </div>
    </div>

    <!-- merchandiser table list modal starts here -->
    <div class="modal fade" id="merchandiserAssign" name ="merchandiserAssign" tabindex="-1" role="dialog" aria-labelledby="viewDoorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="merchandiserAssignLabel">Merchandiser List</h5>
                        <button type="button" class="btn-close" id="closeModal" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                    <table id="manning" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                            <th style="display:none">ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <!-- 18-03-2024 new code added starts here -->
                                <th>Actions</th>
                                <!-- 18-03-2024 new code added ends here -->
                            </tr>
                        </thead>
                            <tbody id="manning-body">
                   
                            </tbody >
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id= "openMerchandiserModalList">Add</button>
                        <!-- <button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button> -->
                    </div>
            </div>
        </div>
    </div>
    <!-- merchandiser table list modal ends here -->
    

        <!-- Merchandiser list assign modal starts here -->
        <div class="modal fade" id="merchandiserList" name="merchandiserList" tabinex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="merchandiserAssignLabel">Add Merchandiser</h5>
                        <button type="button" class="btn-close" id="closeModal1" data-bs-dismiss="modal"></button>
                    </div>
                 <div class="modal-body">

                 <div class="row">
                    <div class="form-group col-md-12">

                 <table id="merchandiserListTable" class="table table-hover" style="width:100%">
                 
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="display:none">ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>                           
                            <th>Actions</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <input type ="hidden" name="coordinator_ID" id="coordinator_ID">
                <input type ="hidden" name="store_ID" id="store_ID">
            
                
                  </div>
                
                  </div>
        
            
                 </div>
                <div class="modal-footer">
                    
                </div>
            </div>
            </div>
        </div>
        <!-- Merchandiser list assign modal ends here -->


     <!-- View door modal -->
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
                <label for="v_store_name" class="col-form-label">Store name:</label>
                <p class="h6" id="v_store_name" name="v_store_name"></p>
            </div> 
            </div>

            <div class="row">
            <div class="form-group col-md-6">
                <label for="v_coordinator" class="col-form-label">Coordinator:</label>
                <p class="h6" id="v_coordinator" name="v_coordinator"></p>
            </div>    

            <div class="form-group col-md-6">
                <label for="v_type_of_deployment" class="col-form-label">Type of Deployment:</label>
                <p class="h6" id="v_type_of_deployment" name="v_type_of_deployment"></p>
            </div>    
        
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="v_merchandiser_count" class="col-form-label">Merchandiser Counts:</label>
                    <p class="h6" id="v_merchandiser_count" name="v_merchandiser_count"></p>
                </div>
            </div>

        

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="vhide-modal">Close</button>
            </div>

            </div>
        </div>
    </div>

       
        
    
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
        <!-- start: JS -->
        <script src="/asset/user/js/bootstrap.bundle.min.js"></script>

    <script src="/asset/user/js/jquery.min.js"></script>

    <script src="/asset/user/js/script.js"></script>


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

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
                { data: 'store_name' }, 
                { data: 'actions', orderable: false }
            ]
        });

        

        function populatemerchandiserDataTable(){

            $('#merchandiserListTable').DataTable().destroy();

            var merchandiserDataTable = $('#merchandiserListTable').DataTable({

            ajax: {
                url: '/accountsupervisor/door-list/fetch-merchandiser-data',
                dataSrc: 'mdata'
            },
            columns: [
                { data: '#' },
                { data:  'id', visible: false },
                { data: 'first_name' },
                { data: 'middle_name' },
                { data: 'last_name' },
                { data: 'actions', orderable: false }
            ]
        });

        }


          // for cicle-plus button starts here
          $('#merchandiserListTable').on('click', 'tr', function (e){
            e.preventDefault();

            var table = $('#merchandiserListTable').DataTable();

           var merchandiser_myid = table.row(this).data().id;

           var store_id = $('#store_ID').val();

           var coordinator_id = $('#coordinator_ID').val();
           Swal.fire({
            title: "Are you sure you want this merchandiser to this store?",
            text: "You won't be able to revert this!",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirm!"
            }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Success!",
            text: "Merchandiser added successfully.",
            icon: "success"
                });

            //   

                $.ajax({
        type: 'POST',
        url: '/accountsupervisor/door-list/save-merchandiser-data',
        dataType: 'JSON',
        headers: {
            // 'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
        data: {
            _merchandiser_id: merchandiser_myid,
            _coordinator_id: coordinator_id,
            _store_id: store_id, 
            _token: @json(csrf_token()), },
        success: function(response){
            //  response = JSON.parse(response);

            console.log(response.data);
        
            }
        })
            }

         
        });

      
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
              
                $('#v_account').text(response.door.account);
                $('#v_region').text(response.door.region);
                $('#v_area').text(response.door.area);
                $('#v_store_name').text(response.door.store_name);
                $('#v_type_of_deployment').text(response.door.type_of_deployment);
                $('#v_coordinator').text(response.door.get_name);
                $('#v_merchandiser_count').text(response.merchandiser_count);

                $('#viewDoorModal').modal('show');
            
            }
     
            })
        });

        $('#door tbody').on('click', 'img.button-image2', function (e) {
        e.preventDefault();

        

            var selectedRowData = dataTable.row($(this).closest('tr')).data();
            
            var id = selectedRowData.id;

            $.ajax({
            url: '/accountsupervisor/door/list/retrieve-update/' + id ,
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(response){
                // response = JSON.parse(response);

                $('#selectedID').val(id);
            
                $('#e_account').text(response.door.account);
                $('#e_region').text(response.door.region);
                $('#e_area').text(response.door.area);
                $('#e_store_name').text(response.door.store_name);
                $('#e_type_of_deployment').text(response.door.type_of_deployment);

                $('#e_merchandiser').val(response.count)

              
             

                if(response.door.coordinator_id === null){
                    $('#e_coordinator').val(0);
                    $('#coordinator_ID').val(0);
               
                }else{
                $('#e_coordinator').val(response.door.coordinator_id);
                $('#coordinator_ID').val(response.door.coordinator_id);
                }
             
             
                $('#editDoorModal').modal('show');
            
            }
     
            })
        });
        


        $("#vhide-modal").click(function(){
            $("#viewDoorModal").modal('hide');
        });
        $("#ehide-modal").click(function(){
            $("#editDoorModal").modal('hide');
        });

        $("#show_merchandiser").click(function(){

           var id =  $('#selectedID').val();

           var check_coor = $('#e_coordinator').val();

           console.log("check coor" , check_coor);

           //$('#selectedID').val();
    

           $('#store_ID').val(id); 

           get_merchandiser_door(id);
          
    });

  

    function get_merchandiser_door(id){
    $.ajax({
            url: '/accountsupervisor/door/list/retrieve-merhandiser-door/' + id ,
            
            type: 'GET', 
            dataType: 'JSON',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(response){
              
                var data = response.data;

              

                populateTable(data);


            },
            error: function (error) {

            console.error('Error fetching data:', error);
            }
            })
            };


    function populateTable(data) {
            var tbody = $('#manning-body');

   
            tbody.empty();


            if (Array.isArray(data)) {
        
        data.forEach(function (item) {
            var row = $('<tr>');
            row.append('<td  style="display:none">' + item.id + '</td>');

            row.append('<td>' + item.fname + '</td>');
            row.append('<td>' + item.mname + '</td>');
            row.append('<td>' + item.lname + '</td>');
    
            row.append('<td>' + item.actions  + '</td>');
            // 18-03-2024 new code added ends here
            tbody.append(row);
        });
    } else {
        console.error("Invalid data format: Data is not an array.");
        }
    }

    //
    //19-03-2024 new code added starts here
 
    $('#manning tbody').on('click','i.bi-x-circle-fill', function (e) {
        e.preventDefault();


        // new sweet alert starts here

        Swal.fire({
            title: "Are you sure you want this merchandiser to this store?",
            text: "You won't be able to revert this!",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirm!"
            }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Success!",
            text: "Merchandiser added successfully.",
            icon: "success"
                });

                var currentRow=$(this).closest("tr"); 
         
         var id=currentRow.find("td:eq(0)").text();



        $.ajax({
            url: '/accountsupervisor/door-list-remove-merchandiser-data/' + id,
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
            _id: id,
            _token: @json(csrf_token()), },
            success: function(response) {
                if (response.success) {
                    table = $('#manning').DataTable();
                    table.row(currentRow).remove().draw();
                    console.log(response);
                   
                } else {
                    console.error('Error deleting resource:', response.message);
                }
            },   
        });

            }
         


        // new sweet alert ends here
   


       
        
       
    });
    });


    //19-03-2024 new code added ends here
    //

    $("#openMerchandiserModalList").click(function(){

        populatemerchandiserDataTable();
        
          $("#merchandiserAssign").modal('hide'); 
         
          $("#merchandiserList").modal('show'); 
         
      
    });
    
       
    $("#closeModal").click(function(){
            $("#merchandiserAssign").modal('hide'); 

            $("#editDoorModal").modal('show'); 
       
    });


    // Merchandiser Assign And List
    $("#openMerchandiserAssign").click(function(){
          $("#merchandiserAssign").modal('hide'); 
         
          $("#merchandiserList").modal('show'); 
      
    });
    
       
    $("#closeModal").click(function(){
            $("#merchandiserAssign").modal('hide'); 

            $("#merchandiserModalList").modal('show'); 
       
    });

   

    $('#closeModal1').click(function(){

        var id =  $('#selectedID').val();

        get_merchandiser_door(id);
        
        $('#merchandiserList').modal('hide');
        
        $('#merchandiserAssign').modal('show');
    });


    });
    </script>
</body>

</html>