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
    <link rel="stylesheet" href="/asset/user/css2/payrollhead.css">
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
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Payroll Head</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item">
                <a href="{{ route('payrollhead.view.dashboard') }}">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>Dashboard
                </a>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Clients</li>
            <li class="sidebar-menu-item ">
                <a href="{{ route('payrollhead.view.efcpayrollhead') }}">
                    <i class="bi bi-dash-square sidebar-menu-item-icon"></i>EFC
                </a>
            </li>
            <li class="sidebar-menu-item ">
                <a href="{{ route('payrollhead.view.mckenziepayrollhead') }}">
                    <i class="bi bi-dash-square sidebar-menu-item-icon"></i>McKenzie
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="{{ route('payrollhead.view.rfmpayrollhead') }}">
                    <i class="bi bi-dash-square sidebar-menu-item-icon"></i>RFM
                </a>
            </li>
            <li class="sidebar-menu-item active">
                <a href="{{ route('payrollhead.view.magispayrollhead') }}">
                    <i class="bi bi-dash-square sidebar-menu-item-icon"></i>Magis
                </a>
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
                <h5 class="fw-bold mb-0 me-auto">Magis</h5>
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
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Door List</h5>
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#myModal">Move</button>
                    </div>
                </div>
                <table id="door" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>checkbox</th>
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

    <!-- modal starts here -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog medium-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Payroll Officer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="e_user" class="form-label">Select Payroll Officer:</label>
                            <select class="form-select" id="e_fname" name="e_fname">
                                <option value="">---Select Payroll Officer---</option>
                                @foreach ($magisPayrollheadArray as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveChangesBtn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal ends here --> 


            <!-- end: Content -->
       
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
        $(document).ready(function () {
            var dataTable = $('#door').DataTable({
                ajax: {
                    url: '/payrollhead/magis-door-list/fetch-data',
                    dataSrc: 'data'
                },
                columns: [
                    { data: '#' },
                    { 
                        data: 'checkbox',
                        render: function (data, type, row, meta) {
                            return '<input type="checkbox" class="checkbox" value="' + row.id + '">';
                        }
                    },
                    { data: 'id', visible: false },
                    { data: 'account' },
                    { data: 'region' },
                    { data: 'store_name' }, 
                    { data: 'actions', orderable: false }
                ]
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const saveChangesBtn = document.getElementById("saveChangesBtn");

            saveChangesBtn.addEventListener("click", function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Saved!',
                            'Your changes have been saved.',
                            'success'
                        );
                    }
                });
            });
        });

    </script>
</body>

</html>




