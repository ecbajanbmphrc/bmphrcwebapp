<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        
            input[type="date"] {
                color: white;
                background-color: black;
                border: 1px solid white;
            }

            input[type="date"]::-webkit-inner-spin-button,
            input[type="date"]::-webkit-calendar-picker-indicator {
                filter: invert(1);
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
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item ">
                <a href="{{ route('accountsupervisor.view.dashboard') }}">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Dashboard
                </a>
            </li>
        </ul>    
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item mt-2 ">
                <a href="{{ route('accountsupervisor.view.coordinator') }}">
                    <i class="ri-account-pin-circle-line sidebar-menu-item-icon"></i>Coordinator
                </a>
            </li>
            <li class="sidebar-menu-item mt-2 active">
                <a href="{{ route('accountsupervisor.view.manning') }}">
                    <i class="ri-file-user-line sidebar-menu-item-icon"></i>Manning
                </a>
            </li>
            <li class="sidebar-menu-item  mt-2">
                <a href="{{ route('accountsupervisor.view.merchandiser') }}">
                    <i class="ri-account-pin-box-line sidebar-menu-item-icon"></i>Merchandiser
                </a>
            </li>
            <li class="sidebar-menu-item mt-2">
                <a href="{{ route('accountsupervisor.view.door') }}">
                    <i class="ri-store-line sidebar-menu-item-icon"></i>Store
                </a>
            </li>
            <li class="sidebar-menu-item  mt-2">
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
                    <h5 class="fw-bold mb-0 me-auto">Manning</h5>
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
                <div class="card-header" style="height:5vh">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <h5 class="">Manning Lists</h5>
                            <!-- this is for date picker -->
                            <!-- <input type="Date" class="btn btn-dark ml-3 " name="endDate" id="endDate" value=""> -->
                            <!-- <input type="date" class="btn btn-dark" name="selectedDate" id="selectedDate" value="{ $selectedDate }"> -->
                            <!-- <input type="date" class="btn btn-dark" name="selectedDate" id="selectedDate"> -->
                             <!-- this is for date picker -->
                        </div>
                        <div class="col-md-6 text-end ">
                                <a href="/manning/export" id="generateReportLink" class="btn btn-success mb-1 ml-1">
                                <i class="bi bi-printer mr-2"></i>Print manning
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <table id="manning" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 15px;">#</th>
                                <!-- <th style="display:none">ID</th> -->
                                <th>Coordinator</th>
                                <th>Account</th>
                                <th>Area</th>
                                <th>Store Name</th>
                                <th>Store Address</th>
                                <th>Merchandiser</th>
                                <th style="display:none">Rate type</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            <!-- </div>
        </div> -->
                <!-- end: Content -->
        
        </main>
        <!-- end: Main -->

        <!-- edit merchandiser modal -->
        <div class="modal fade" id="editManningModal" name ="editManningModal" tabindex="-1" role="dialog"  aria-labelledby="editManningModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editManningModalLabel">Edit Merchandiser Details</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('accountsupervisor.manning-list.update-account')}}" method="POST">
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
                        <div class="form-group col-md-6">
                            <label for="e_store Name" class="col-form-label">Store Name:</label>
                            <select class="form-control" id="e_coordinator" name="e_coordinator">
                                <option  value="" >---Select Coordinator---</option>
                                @foreach ($store_array as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>    

                        <div class="form-group col-md-6">
                            <label for="e_coordinator" class="col-form-label">Merchandiser:</label>
                            <select class="form-control" id="e_coordinator" name="e_coordinator">
                                <option  value="" >---Select Merchandiserr---</option>
                                @foreach ($store_array as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="e_store_address" class="col-form-label">Store Address: </label>
                            <input type="text" class="form-control" id="e_store_address" name="e_store_address" value="{{ old('e_store_address') }}" required>
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

    <!-- View user modal -->
    <div class="modal fade" id="viewManningModal" name = "viewMerchandiserModal" tabindex="-1" role="dialog" aria-labelledby="viewManningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewAccountModalLabel">View Details</h5>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="v_store_name" class="col-form-label">Store Name:</label>
                    <p class="h6" id="v_store_name" name="v_store_name"></p>
                </div>    
          
                <div class="form-group col-md-6">
                    <label for="v_coordinator" class="col-form-label">Coordinator:</label>
                    <p class="h6" id="v_coordinator" name="v_coordinator"></p>
                </div>              
            </div> 
                
            <hr class="w-100 mt-1 mb-1">
            <div class="row">               
                <div class="form-group col-md-6">
                    <label for="v_address" class="col-form-label">Address:</label>
                    <p class="h6" id="v_address" name="v_address"></p>
                </div> 
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

            var dataTable = $('#manning').DataTable({
                ajax: {
                    url: '/accountsupervisor/manning-list/fetch-data',
                    dataSrc: 'data'
                },
                columns: [
                    { data: 'number' },
                    // { data: 'id', visible: false },
                    { data: 'coordinator_fullname'}, // coordinator name
                    // { data: 'region'}, // region
                    { data: 'account'}, // account = puregold/gentrade
                    // { data: 'door'}, // door count
                    { data: 'area'}, //Area 
                    { data: 'store_name'}, // branch name
                    { data: 'store_address'}, // branch address
                    { data: 'merchandiser_fullname'}, // active/inactive
                    { data: 'ratetype', visible: false},
                    // { data: 'actions', orderable: false }
                ]
            });


            // remove functions starts here
            // $('#manning tbody').on('click', '.bi-x-circle-fill', function (e) {
            //     e.preventDefault();
                
            //     // Find the closest row and get the row data
            //     var $row = $(this).closest('tr');
            //     var rowData = dataTable.row($row).data();
            //     var id = rowData.id;

            //     // Confirm the deletion
            //     if (confirm('Are you sure you want to delete this item?')) {
            //         $.ajax({
            //             url: '/accountsupervisor/manning/list/retrieve-update/' + id,
            //             type: 'DELETE', // Change to DELETE for deletion
            //             dataType: 'JSON',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             },
            //             success: function(response) {
            //                 // Remove the row from the DataTable
            //                 dataTable.row($row).remove().draw();
            //                 // Optionally, you can display a success message or handle the response
            //             },
            //             error: function(xhr, status, error) {
            //                 // Handle the error
            //                 console.error('AJAX request failed:', error);
            //                 alert('An error occurred while deleting the item.');
            //             }
            //         });
            //     }
            // });
            // remove functions ends here



        //     $('#manning tbody').on('click', 'img.button-image1', function (e) {
        //     e.preventDefault();

        //         var selectedRowData = dataTable.row($(this).closest('tr')).data();
        //         var id = selectedRowData.id;
        //         $.ajax({
        //         url: '/accountsupervisor/manning/list/retrieve-view/' + id ,
        //         type: 'GET', 
        //         dataType: 'JSON',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },   
        //         success: function(response){
                
        //         //  var date = new Date(response.birthdate).toLocaleDateString()
        //             // response = JSON.parse(response);
        //             // var newDate = new Date(response.birthdate).toLocaleDateString()
        //             // var newDateDs = new Date(response.date_started).toLocaleDateString()
        //             // var newDateEc = new Date(response.end_of_contract).toLocaleDateString()

        //             // var gettimeDs = new Date(newDateDs).getTime();
        //             // var gettimeEc = new Date(newDateEc).getTime();
       
        //             // var remaining_days = Math.floor((gettimeEc-gettimeDs) / (365 * 24  * 10000));
                     
        //             //(365.25 * 24 * 60 * 1000));
                    

        //             if(response.middle_name !== null){
        //                 $('#v_middle_name').text(response.middle_name).css({"font-style" : "regular" , "color" : "black"});
                    
        //             }else{
                        
        //                 $('#v_middle_name').text("NULL").css({"font-style" : "italic" , "color" : "grey"});
        //             }
        //             $('#v_first_name').text(response.first_name);
        //             $('#v_last_name').text(response.last_name);
        //             $('#v_birthdate').text(mddyyyy_to_mmmdyyyy(newDate));
        //             $('#v_age').text(response.age);
        //             $('#v_gender').text(response.gender);
        //             $('#v_address').text(response.address);
        //             $('#v_region').text(response.region);
        //             $('#v_contact').text(response.contact_number);
        //             $('#v_email').text(response.email_address);
        //             $('#v_date_started').text(mddyyyy_to_mmmdyyyy(newDate));
        //             $('#v_end_of_contract').text(mddyyyy_to_mmmdyyyy(newDate));
        //             $('#v_remarks').text(response.remarks);
        //             $('#v_total_days').text(response.total_days);
        //             $('#v_remaining_days').text(response.remaining_days);
        //             $('#v_store_name').text(response.store_name);
        //             $('#v_status').text(response.is_active);

        //             $('#viewMerchandiserModal').modal('show');

        //             if(response.is_active === 1){
        //             $('#v_status').text("active");
                
        //         }else{




        //             $('#v_status').text("inactive");
        //         }
        //         }
        
        //     })
        // });


        // jquerry for manning starts here
        // $('#manning tbody').on('click', 'bi bi-x-circle-fill', function (e) {
        //     e.preventDefault();

        //     var selectedRowData = dataTable.row($(this).closest('tr')).data();
        //     var id = selectedRowData.id;
        //     $.ajax({
        //         url: '/accountsupervisor/manning/list/retrieve-update/' + id,
        //         type: 'GET',
        //         dataType: 'JSON',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         // Function to execute if the request is successful
        //         success: function(response){
        //             // Handle the response data here
        //             // 'response' variable contains the data sent by the server
        //             // You can process the data or perform any actions based on it
        //         },
        //         error: function(xhr, status, error) {
        //             // console.error('AJAX request failed:', error);
        //         }
        //     });
        // });
        // // jquerry for manning ends here



        // $('#manning tbody').on('click', 'img.button-image2', function (e) {
        //     e.preventDefault();

        //         var selectedRowData = dataTable.row($(this).closest('tr')).data();
        //         var id = selectedRowData.id;
        //         $.ajax({
        //         url: '/accountsupervisor/manning/list/retrieve-update/' + id , 
        //         type: 'GET', 
        //         dataType: 'JSON',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },   
        //         success: function(response){
                
        //         //  var date = new Date(response.birthdate).toLocaleDateString()
        //             // response = JSON.parse(response);
        //             // var newDate = new Date(response.birthdate).toLocaleDateString()
        //             // var newDateDs = new Date(response.date_started).toLocaleDateString()
        //             // var newDateDe = new Date(response.end_of_contract).toLocaleDateString()

        //             // gettimeDs = new Date(newDateDs).getTime();
        //             // gettimeDe = new Date(newDateDe).getTime();

        //             // gettimeTd = new Date().getTime();

        //             // var total_days = Math.floor((gettimeDe-gettimeDs) / (365 * 24  * 10000));

        //             // var remaining_days = Math.floor((gettimeDe-gettimeTd) / (365 * 24  * 10000));
                
                    
        //             $('#selectedId').val(id);
            
        //             $('#e_middle_name').val(response.middle_name);
                
            
        //             $('#e_first_name').val(response.first_name);
        //             $('#e_last_name').val(response.last_name);
        //             $('#e_birthdate').val(newDate);
        //             $('#e_age').val(response.age);
        //             $('#e_gender').val(response.gender);
        //             $('#e_address').val(response.address);
        //             $('#e_region').val(response.region);
        //             $('#e_contact').val(response.contact_number);
        //             $('#e_email').val(response.email_address);
        //             $('#e_number').val(response.contact_number);
        //             $('#e_date_started').val(newDateDs);
        //             $('#e_end_of_contract').val(newDateDe);
        //             $('#e_remarks').val(response.remarks);
        //             $('#e_total_days').val(total_days);
        //             $('#e_remaining_days').val(remaining_days);
        //             $('#e_status').val(response.is_active);

        //         if(response.gender === "Male"){
        //             $('#e_male').prop("checked" , true);
                
        //         }else{
        //             $('#e_female').prop("checked" , true);
        //         }

        //             $('#editMerchandiserModal').modal('show');
                
                    
        //         }
        
        //     })
        // });


        //  $('#createAccountModal').modal({
        // backdrop: 'static',
        // keyboard: false  // to prevent closing with Esc button (if you want this too)
        // });

        $("#createManningModal").modal({
            show: false,
            backdrop: 'static'
        });

        $("#hitme").click(function(){
            $("#createManningModal").modal('show');
        });

        $("#ehide-modal").click(function(){
            $("#editManningModal").modal('hide');
        });

        $("#hide-modal").click(function(){
            $("#createManningModal").modal('hide');
        });


        $("#vhide-modal").click(function(){
            $("#viewManningModal").modal('hide');
        });
    });

    // this is for date picker
    // $(document).ready(function() {
    //     $('#manning').DataTable();
 
    //     $('#selectedDate').change(function() {
    //         var selectedDate = $(this).val();
    //         window.location.href = "{{ route('records.index') }}?date=" + selectedDate;
    //     });
    // });
    // this is for date picker

    // new code added starts here
    // document.getElementById('filterForm').addEventListener('submit', function (e) {
    //     e.preventDefault();
        
    //     const startDate = document.getElementById('startDate').value;
    //     const endDate = document.getElementById('endDate').value;

    //     fetch(`/fetch-data?startDate=${startDate}&endDate=${endDate}`)
    //         .then(response => response.json())
    //         .then(data => {
    //             // Process and display the data
    //             document.getElementById('results').innerHTML = JSON.stringify(data);
    //         });
    // });
    // new code added starts here
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
            
                $('#createManningModal')[0].reset();
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
            
                $('#editManningModal').modal('show');
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
            
                $('#createManningModal').modal('show');
            }
        });

            </script>
    @endif


    @include('sweetalert::alert')


    </body>

    </html>