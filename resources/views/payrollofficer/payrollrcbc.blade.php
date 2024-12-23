<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- for toggle -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        /* border-radius: 6px; */
        width: 100%;
        /* border: .1rem solid #000; */
        /* background: #fff; */
    }

 
    th, td {
        border: .1rem solid #000;
        /* padding: 2px; */
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
    /* .card{
        border: none;
    } */

    .btn-with-border {
        /* border: 1px solid #fff; 
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
     
    /* Target the calendar icon inside the date input */
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1); /* Invert the colors of the icon */
    }




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
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="bi bi-bank sidebar-menu-item-icon"></i>Banks
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollbdo') }}">BDO</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollbpi') }}">BPI</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollcebuana') }}">Cebuana</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrolleastwest') }}">EastWest</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollgcash') }}">Gcash</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollrcbc') }}">RCBC</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollrcbcwallet') }}">RCBC E-wallet</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('payrollofficer.view.payrollbank') }}">Other</a>
                    </li>
                </ul>
            </li>  
            <li class="sidebar-menu-item mt-2">
                <a href="{{ route('payrollofficer.view.payrollofficerinput') }}">
                    <i class="bi bi-cash sidebar-menu-item-icon"></i>Payment
                </a>
            </li>  
            <!-- <li class="sidebar-menu-item mt-2">
                <a href="{{ route('payrollofficer.view.payrollofficerlist') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Payroll
                </a>
            </li> -->
            <li class="sidebar-menu-item mt-2">
                <a href="{{ route('payrollofficer.view.payrolltransferlist') }}">
                    <i class="bi bi-send sidebar-menu-item-icon"></i>Transfer list
                </a>
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
                <h5 class="fw-bold mb-0 me-auto">RCBC List</h5>
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

            <!-- <div style="height:2vh;"> </div> -->

            <div class="card mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <input type="date" class="btn btn-dark" name="selectDate" id="selectDate"> -->
                             <h5>RCBC Accounts</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <!-- <a href="/billing/export" id="generateBilling" class="btn btn-primary mb-1 ml-1">
                                <i class="bi bi-printer mr-2"></i>Disbursement
                            </a> -->
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <table class="table table-bordered " id="inputtable" class="table " style="width:100%;">
                        <thead>
                            <tr>
                                <th>Merchandiser</th>
                                <th>id</th>
                                <th>RCBC Account Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>     
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="payrollModal" name="viewpayrollModal" tabindex="-1" role="dialog" aria-labelledby="viewpayrollModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"  id=viewpayrollModalTitle>Add RCBC Account Number</h5>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="{{ route('payrollofficer.rcbc-list.update-account') }}">
                            @csrf    
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="merchandiser_id" value="">
                                            <label for="rcbc_account_number" class="col-form-label">RCBC Account Number</label>
                                            <input type="text" class="form-control" name="rcbc_account_number" id="rcbc_account_number" value="">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>    
                    
                        <div class="modal-footer mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="payrollclose">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

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

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @include('sweetalert::alert')

    <script>
       $(document).ready(function () { 
            var dataTable = $('#inputtable').DataTable({
                ajax: {
                    url: '/payrollofficer/payrollrcbc/list/fetch-data',
                    dataSrc: 'dataone'
                },
                columns: [               
                    { data: 'merchandiser_name' }, 
                    { data: 'id', visible: false},
                    { data: 'rcbc' },     
                    { data: 'actions', orderable: false }              
                ]
            });

            // Open modal
            $('#inputtable tbody').on('click', 'img.arrow-button', function (e) {
                e.preventDefault();
                var selectedRowData = dataTable.row($(this).closest('tr')).data();
                $('#merchandiser_fullname').val(selectedRowData.merchandiser_fullname);
                $('input[name="merchandiser_id"]').val(selectedRowData.id);
                $('#payrollModal').modal('show');
            });

            // Close modal
            $('#payrollclose').click(function () {
                $('#payrollModal').modal('hide');
            });

            // Save GCash number
            $('#save').click(function (e) {
                e.preventDefault(); // Prevent form submission
                let rcbcNumber = $('#rcbc_account_number').val();
                let merchandiserId = $('input[name="merchandiser_id"]').val();

                $.ajax({
                    url: "{{ route('payrollofficer.rcbc-list.update-account') }}",
                    type: "POST",
                    data: {
                        rcbc_account_number: rcbcNumber,
                        merchandiser_id: merchandiserId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        // Display SweetAlert success message
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            timer: 2000, // Automatically close after 2 seconds
                            showConfirmButton: false
                        }).then(() => {
                            $('#payrollModal').modal('hide'); // Hide the modal
                            $('#inputtable').DataTable().ajax.reload(); // Reload DataTable
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                        // Display SweetAlert error message
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseJSON.message || 'An error occurred.',
                            icon: 'error',
                            confirmButtonText: 'Close'
                        });
                    }
                });
            });
        });

        
    </script>



</body>

</html>
