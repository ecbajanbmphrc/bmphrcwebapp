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
    <link rel="stylesheet" href="asset/css/partners.css">


    <title>Document</title>  
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


<!--our partners section start-->
<div class="client-area">
    <div class="container-sm mb-5">
      <h2 class="mb-4 text-muted lead text-center " style="font-size: 40px;">Our Partners</h2>
        <section class="logo-area slider">
          <div class="slide"><img src="asset/img-partners/asian-streak-brokerage-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/ecosential-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/McKenzie-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/MDI-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/RFM-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/asian-streak-brokerage-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/ecosential-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/McKenzie-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/MDI-logo.png" alt=""></div>
          <div class="slide"><img src="asset/img-partners/RFM-logo.png" alt=""></div>
        </section>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    <script>
      $(document).ready(function(){
        $('.logo-area').slick({
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 700,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: 
          [
            {
              breakpoint: 768,
                settings: {
                slidesToShow: 4,
                  }
            },
            { 
              breakpoint: 520,
                settings: {
                slidesToShow: 3,
                  }
            }
          ]
        });
      });
    </script>
  <!--our partner section end-->

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