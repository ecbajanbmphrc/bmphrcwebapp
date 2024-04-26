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
    <link rel="stylesheet" href="/asset/user/css2/payrolloff.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- end: CSS -->
    <title>BMPHRC</title>

    <style>

    table {
        border-collapse: collapse;
        border-radius: 6px;
        width: 100%;
    }
    th, td {
        border: .1rem solid #000;
        padding: 8px;
        text-align: left;
    }

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
        <li class="sidebar-menu-item ">
                <a href="{{ route('payrollofficer.view.payrollofficerlist') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Payroll
                </a>
            </li>
            <li class="sidebar-menu-item mt-2">
                <a href="{{ route('payrollofficer.view.payrolltransferlist') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Transfer Payroll
                </a>
            </li>
            <li class="sidebar-menu-item mt-2 active">
                <a href="{{ route('payrollofficer.view.payrollofficerinput') }}">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Payroll Input
                </a>
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
                <h5 class="fw-bold mb-0 me-auto">Payroll Transaction</h5>
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

            <div style="height:2vh;"> </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">BMPOWER HUMAN RESOURCES CORP</h3>
                                <h5>For the covered period of March 1-15, 2024</h5>
                                <h5 class="mb-5">PUREGOlD ACCOUNT<hr class="w-100 mb-5"></h5>
                            </div>
                        </div>
                        <table id="inputtable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>First_name</th>
                                    <th style="display:none">ID</th>
                                    <th>Last_name</th>
                                    <!-- <th>Account</th>
                                    <th>HC</th>
                                    <th>Coordinator</th>
                                    <th>Employee Name</th>
                                    <th>Handled Store</th>
                                    <th>Region</th>
                                    <th>With Rate Increase</th>
                                    <th>Actual Days Rendered</th>
                                    <th>WRI Actual Days Rendered</th>
                                    <th>Late mins</th>
                                    <th>WRI Late mins</th>
                                    <th>No. of Hours</th>
                                    <th>WRI No. of Hours</th>
                                    <th>Sub Total Pay</th>
                                    <th>WRI Sub Total Pay</th>
                                    <th>Total pay</th> -->
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td><input type="text" placeholder="Actual Days Rendered"></td>
                                    <td><input type="text" placeholder="WRI Actual Days Rendered"></td>
                                    <td><input type="text" placeholder="Late mins"></td>
                                    <td><input type="text" placeholder="WRI Late mins"></td>
                                    <td><input type="text" placeholder="No. of Hours"></td>
                                    <td><input type="text" placeholder="WRI No. of Hours"></td>
                                    <td><input type="text" placeholder="Sub Total Pay"></td>
                                    <td><input type="text" placeholder="WRI Sub Total Pay"></td>
                                    <td><input type="text" placeholder="Total pay"></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- add new code starts here -->
                

                
                <!-- add new code ends here -->



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


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

    @include('sweetalert::alert')

    <script>
        $(document).ready(function(){
            var dataTable = $('#inputtable').DataTable({
                ajax: {
                    url: '/payrollofficer/payrollofficerinput/list/fetch-data',
                    dataSrc: 'dataone'
                },
                columns: [
                    { data: 'first_name' },

                    { data: 'id', visible: false },
                    { data: 'last_name' },
                    // { data: 'account'},
                    // { data: 'hc'},
                    // // leftjoin the coordinator concatinated full name
                    // { data: 'coordinator'},
                    // // leftjoin the merchandiser concatinated full name
                    // { data: 'merchandiser'},
                    // // leftjoin the doors
                    // { data: 'store_name'},
                    // // leftjoin the region
                    // { data: 'region'},
                    // { data: 'with_rate_increase'},
                    // { data: 'actual_days_rendered'},
                    // { data: 'wri_actual_days_rendered'},              
                    // { data: 'late_min'},
                    // { data: 'wri_late_min'},
                    // { data: 'no_of_hour'},
                    // { data: 'wri_no_of_hour'},
                    // { data: 'sub_total_pay'},
                    // { data: 'wri_sub_total_pay'},
                    // { data: 'total_pay'},
                ]
            });
        });
    </script>



</body>

</html>




