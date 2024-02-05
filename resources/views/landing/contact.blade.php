<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="public/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="asset/css/Nav.css">
    <link rel="stylesheet" href="asset/css/footer.css">
    <link rel="stylesheet" href="asset/css/Jin.css">

</head>
<body>

    <!--Nabvar start-->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand me-auto" style="margin-left: 20px;" href="2-About.html"><img src="asset/img-careers/WEbLOGO.png" style="width: 55px;" alt=""></a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="public/asset/img/BMPower.logo.png" alt=""></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1" style="margin-left: 5px;">
                <li class="nav-item">
                  <a class="nav-link active mx-lg-2" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="{{ route('landing.about') }}">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="{{ route('landing.careers') }}">Careers</a>
                </li>      
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="{{ route('landing.our-partners') }}">Our Partners</a>
                </li>                     
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="{{ route('landing.contact') }}">Contact</a>
                </li>          
              </ul>
              <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" style="margin-left: 5px; margin-top: 10px;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Log In
                </a>
                <div class="dropdown-menu w-auto dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="PayrollSystem/html/P.SA-login.html"><i class="bi bi-wallet me-2"></i>Admin</i></a><hr class="my-1">
                  <a class="dropdown-item" href="PayrollSystem/html/P-PH-login.html"><i class="bi bi-wallet me-2"></i>Payroll Head</i></a><hr class="my-1">
                  <a class="dropdown-item" href="PayrollSystem/html/P.PO-login.html"><i class="bi bi-wallet me-2"></i>Payroll Officer</i></a><hr class="my-1">
                  <a class="dropdown-item" href="PayrollSystem/html/P-AS-login.html"><i class="bi bi-wallet me-2"></i>Account supervisor</i></a><hr class="my-1">
                  <a class="dropdown-item" href="6-login.html"><i class="bi bi-bootstrap me-2"></i>App</a><hr class="my-1">
                  <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Something else here</a>
                </div>
              </div>
          </div>
        </div>
        <button class="navbar-toggler pe-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  <!--End Nabvar end-->
    
  <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <h5 class="section-title ff-secondary fw-normal text-start text-dark">Address</h5>
                        <p><i class="fa fa-map-pin text-danger me-2"></i>7 Sheridan, Mandaluyong, Metro Manila</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="section-title ff-secondary fw-normal text-start text-dark">Email</h5>
                        <p><i class="fa fa-envelope-open text-dark me-2"></i>bmp@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="section-title ff-secondary fw-normal text-start text-dark">Phone</h5>
                        <p><i class="fa fa-phone text-success me-2"></i>+666 298 430</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.4517071411983!2d121.0498087759041!3d14.573317977742466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c843c16e98a7%3A0x2490161b0f227ab4!2sBmpower%20Human%20Resources%20Corp!5e0!3m2!1sen!2sph!4v1701820644930!5m2!1sen!2sph"
                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--contact End-->

<!-- Footer Start -->
<div class="container-fluid footer pt-5 mt-5 wow fadeIn" data-wow-delay="">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">Company</h4>
                <a class="btn btn-link text-dark" href="">About Us</a>
                <a class="btn btn-link text-dark" href="">Contact Us</a>
                <a class="btn btn-link text-dark" href="">Reservation</a>
                <a class="btn btn-link text-dark" href="">Privacy Policy</a>
                <a class="btn btn-link text-dark" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">Contact</h4>
                <p class="mb-2 text-dark"><i class="fa fa-map-marker-alt me-3 text-success"></i>7 Sheridan, mandaluyong, Metro Manila</p>
                <p class="mb-2 text-dark"><i class="fa fa-phone-alt me-3 text-success"></i>+666 43 298</p>
                <p class="mb-2 text-dark"><i class="fa fa-envelope me-3 text-success"></i>MF'Jin_Yu@acc.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fa fa-envelope"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-messenger"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-viber"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-telegram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">Opening</h4>
                <h5 class="text-dark fw-normal">Monday - Friday</h5>
                <p class=" text-dark ">08:00AM - 06:30PM</p><br>
                <h5 class="text-dark fw-normal">Saturday - Sunday</h5>
                <p class=" text-dark">Closed</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">Newsletter</h4>
                <p class="text-dark">Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <hr class="mb-4 mt-2">
            <div class="row">
                <div class="col-md-6 text-center text-md-start text-dark mb-3 mb-md-0">
                    &copy; <a class="border-bottom text-primary" href="#">BMPHRC</a>, All Right Reserved. 
                    Designed By <a class="border-bottom text-primary" href="">BMPHRC</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="" class="text-dark">Home</a>
                        <a href="" class="text-dark">Cookies</a>
                        <a href="" class="text-dark">Help</a>
                        <a href="" class="text-dark">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!--Bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>