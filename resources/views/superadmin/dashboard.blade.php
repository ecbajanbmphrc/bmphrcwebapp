<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="/asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/user/css2/superadmin.css">
    <!-- end: CSS -->
    <title>admin</title>
</head>

<body>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-dark border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-light fs-4">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="#">
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
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>Accounts
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('superadmin.view.superadmin') }}">Admin</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.payrollhead') }}">Payroll Head</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('superadmin.view.payrollofficer') }}">Payroll Officer</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.accountsupervisor') }}">Account Supervisor</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="{{ route('superadmin.view.treasury') }}">Treasury</a>
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
                        <a href="{{ route('superadmin.view.mckenzie') }}">MCKENZIE</a>
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
                <a href="/Admin/asset/html/payroll-login/P.SA-login.html">
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
                <h5 class="fw-bold mb-0 me-auto">Dashboard</h5>
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
                        {{-- <!-- <span class="me-2 d-none d-sm-block">{{$data->first_name}}</span> --> --}}
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
            </div>
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="/asset/user/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/asset/user/js/bootstrap.bundle.min.js"></script>
    <script src="/asset/user/js/script.js"></script>
    <!-- end: JS -->

    @include('sweetalert::alert')
</body>

</html>