<!DOCTYPE html>
<html lang="en">
 <head>

  <meta charset="UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  
  <!-- start: Icons --> 
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" /> 
  <!-- start: Icons --> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- start: CSS --> 
  <link rel="stylesheet" href="/asset/user/css/bootstrap.min.css" /> 
  <link rel="stylesheet" href="/asset/user/css/style.css" /> 
  <!-- end: CSS --> 
  
  <title>App View</title> 
 </head> 
 <body> 
  
    <!-- start: Sidebar --> 
        <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end"> 
            <div class="d-flex align-items-center p-3"> 
                <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">BMPHRC</a> 
                <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i> 
            </div> 
            <ul class="sidebar-menu p-3 m-0 mb-0"> 
                <li class="sidebar-menu-item active"> <a href="#"> <i class="ri-dashboard-line sidebar-menu-item-icon"></i> Dashboard </a> </li> 
                <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Custom</li> 
                <li class="sidebar-menu-item has-dropdown"> <a href="#"> <i class="ri-pages-line sidebar-menu-item-icon"></i> Pages <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i> </a> 
            <ul class="sidebar-dropdown-menu"> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> User Profile </a> </li> 
                <li class="sidebar-dropdown-menu-item has-dropdown"> <a href="#"> Blog <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i> </a> 
            </li> 
            </ul>
            </li> 
            <li class="sidebar-menu-item has-dropdown"> <a href="#"> <i class="ri-user-line sidebar-menu-item-icon"></i> Authentication <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i> </a> 
            <ul class="sidebar-dropdown-menu"> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Login </a> </li> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Registration </a> </li> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Reset Password </a> </li> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Change Password </a> </li> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Confirm Password </a> </li> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Deactivate Account </a> </li> 
            </ul>
            </li> 
            <li class="sidebar-menu-item has-dropdown"> <a href="#"> <i class="ri-window-line sidebar-menu-item-icon"></i> Widgets <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i> </a> 
            <ul class="sidebar-dropdown-menu"> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Charts </a> </li> 
                <li class="sidebar-dropdown-menu-item"> <a href="#"> Tables </a> </li> 
            </ul>
            </li>
                <li class="sidebar-menu-item"> <a href="#"> <i class="ri-mail-line sidebar-menu-item-icon"></i> Email </a> </li> 
                <li class="sidebar-menu-item"> <a href="#"> <i class="ri-calendar-line sidebar-menu-item-icon"></i> Calendar </a> </li> 
            </ul> 
        </div>
    <div class="sidebar-overlay">
    </div>
    
    <!-- end: Sidebar -->
  
  
    <!-- start: Main --> 
    <main class="bg-light"> 
        <div class="p-2"> 
            <!-- start: Navbar --> 
            <nav class="px-3 py-2 bg-white rounded shadow"> 
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i> 
                <h5 class="fw-bold mb-0 me-auto"><a href="/Data-transaction/Bmphrc.html" style="text-decoration: none;" >BMPHRC</a></h5> 
                    <div class="dropdown me-3 d-none d-sm-block"> 
                        <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false"> 
                            <i class="ri-notification-line"></i> 
                        </div> 
                        <div class="dropdown-menu fx-dropdown-menu"> 
                            <h5 class="p-3 bg-indigo text-light">Notification</h5> 
                        <div class="list-group list-group-flush"> 
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"> 
                        <div class="me-auto"> 
                            <div class="fw-semibold">Subheading</div> 
                            <span class="fs-7">Content for list item</span> 
                        </div> 
                        <span class="badge bg-primary rounded-pill">14</span> </a> 
                    </div> 
                </div> 
            </div> 
            <div class="dropdown"> 
                <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                <span class="me-2 d-none d-sm-block">{{ session('user')['first_name']}}</span>
                    <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" alt="Image" /> 
                </div> 
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> 
                <li><a class="dropdown-item" href="/Data-transaction/P.editprofile.html"><i class="bi bi-person me-2"></i>Edit Profile</a></li><hr class="my-1"> 
                <li><a class="dropdown-item" href="#"></i><i class="bi bi-gear me-2"></i>settings and Privacy</a></li><hr class="my-1">
                <li><a class="dropdown-item" href="/Data-transaction/P.privacy.html"><i class="bi bi-question-diamond me-2"></i>Help and Support</a></li><hr class="my-1">
                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="ri-login-box-line me-2"></i> Log Out</a></li>
            </ul>
        </div> 
    </nav> 

    <!--icon starts here-->
    
    <div class="container-sm d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle mt-5 mb-5" style="height: 109v;">
        <div class="row g-5">
            <div class="col-6 mb-3">
                <div class="p-3 border bg-light rounded" style="width: 125px; height: 125px;">
                    <a href="/Data-transaction/1.html" class="text-decoration-none d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="green" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                        </svg>
                        <p class="mt-1 text-center text-dark" style="font-weight: bold; font-size: 15px;">Attendance</p>
                    </a> 
                </div>
                
                <div class="p-3 border bg-light mt-5 mb-5 rounded" style="width: 125px; height: 125px;">
                    <a href="/Data-transaction/2.html" class="text-decoration-none d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="blue" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                        </svg>
                        <p class="mt-1 text-center text-dark" style="font-weight: bold; font-size: 15px;">Inventory</p>
                    </a>
                </div>
                
                <div class="p-3 border bg-light rounded" style="width: 125px; height: 125px;">
                    <a href="/Data-transaction/3.html" class="text-decoration-none d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="red" class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                          </svg>
                        <p class="mt-1 text-center text-dark" style="font-weight: bold; font-size: 15px;">SOS</p>
                    </a>
                </div>            
            </div>
    
            <div class="col-6 mb-3">
                <div class="p-3 border bg-light rounded" style="width: 125px; height: 125px;">
                    <a href="/Data-transaction/4.html" class="text-decoration-none d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="gold" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
                          </svg>
                    <p class="mt-1 text-center text-dark" style="font-weight: bold; font-size: 15px;">Competitors activity</p>
                    </a>
                </div>
                
                <div class="p-3 border bg-light mt-5 mb-5 rounded" style="width: 125px; height: 125px;">
                    <a href="/Data-transaction/5.html" class="text-decoration-none d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="brown" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                        <p class="mt-1 text-dark text-center " style="font-weight: bold; font-size: 15px;">Findings and Details</p>
                    </a>
                </div>
                
                <div class="p-3 border bg-light rounded" style="width: 125px; height: 125px;">
                    <a href="/Data-transaction/6.html" class="text-decoration-none d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="violet" class="bi bi-boxes" viewBox="0 0 16 16">
                            <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z"/>
                        </svg>
                        <p class="mt-1 text-dark text-center" style="font-weight: bold; font-size: 15px;">Planogram Input</p>
                    </a> 
                </div>            
            </div>
        </div>
    </div>

    <!-- end: Navbar --> 
        </div> 
    </main> 
  
    <!-- end: Main --> 
    <!-- start: JS --> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>


    <script src="/asset/user/js/jquery.min.js"></script>
    <script src="/asset/user/js/bootstrap.bundle.js"></script> 
    <script src="/asset/user/js/script.js"></script>  
    <!-- end: JS -->  


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>




    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif


    @include('sweetalert::alert')
 </body>
</html>