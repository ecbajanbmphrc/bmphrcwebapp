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
    <link rel="stylesheet" href="asset/css/contact.css">
    <link rel="stylesheet" href="asset/css/Jin.css">
    <link rel="stylesheet" href="asset/css/About.css">
    <title>Document</title> 
</head>
<body>

    <!--Nabvar start-->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand me-auto" style="margin-left: 20px;" href="2-About.html"><img src="asset/img-careers/WEbLOGO.png" style="width: 55px;" alt=""></a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="asset/img/BMPower.logo.png" alt=""></h5>
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
                  <a class="dropdown-item" href="{ route('auth.supervisor') }}"><i class="bi bi-wallet me-2"></i>Admin</i></a><hr class="my-1">
                  <a class="dropdown-item" href="{ route('auth.payrollhead') }}"><i class="bi bi-wallet me-2"></i>Payroll Head</i></a><hr class="my-1">
                  <a class="dropdown-item" href="{ route('auth.paryrollofficer') }}"><i class="bi bi-wallet me-2"></i>Payroll Officer</i></a><hr class="my-1">
                  <a class="dropdown-item" href="{ route('auth.accountsupervisor') }}"><i class="bi bi-wallet me-2"></i>Account supervisor</i></a><hr class="my-1">
                  <a class="dropdown-item" href="{ route('auth.login') }}"><i class="bi bi-bootstrap me-2"></i>App</a><hr class="my-1">
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
  
  <!-- About Section Starts Here -->
  <div class="container-sm mt-5 pt-5 text-center">
    <div class="about-text">
      <h2 class="mb-4 text-muted lead" style="font-size: 40px; text-transform: uppercase; font-family:'lato';">About us</h2>
    </div>
  </div>
  <!--title about section end-->
  <!-- About Header Starts Here -->
  <header class="pt-5 mt-5 text-center col-12 col-sm-9 col-lg-7 col-xl-6 mx-auto">
    <h1 class="display-3 fw-bold mb-3"></h1>
    <p class="text-muted lead mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
      Molestias, aliquid harum numquam eaque architecto nesciunt veritatis 
      consectetur assumenda. Commodi perspiciatis delectus ex facere. Magnam 
      consectetur tenetur dolor quas soluta? Eius?</p>
  </header>
  <!-- About Header Ends Here -->

  <!-- First Content Starts Here -->
  <div class="container-sm py-7 mb-5 ">
    <div class="row g-3">
      <!-- First Set of image starts here -->
      <div class="col-12 col-md-6">
        <div class="row g-3">
          <div class="col-12 col-md-6 d-none d-md-block">
            <picture>
              <img class="img-fluid rounded shadow-sm ml-0" src="asset/img/7.png" alt="">
            </picture>
          </div>
          <div class="col-12 col-md-6">
            <picture>
              <img class="img-fluid rounded shadow-sm mb-3" src="asset/img/1.png" alt="">
            </picture>
            <picture>
              <img class="img-fluid rounded shadow-sm" src="asset/img/2.png" alt="">
            </picture>
          </div>
        </div>
      </div>
      <!--first set of image ends here-->
      <!--second set of  image starts here-->
      <div class="col-12 col-md-6">
        <div class="row g-3">
          <div class="col-12 col-md-6 d-none d-md-block">
            <picture>
              <img class="img-fluid rounded shadow-sm mb-3" src="asset/img/4.png" alt="">
            </picture>
            <picture>
              <img class="img-fluid rounded shadow-sm mb-3" src="asset/img/3.png" alt="">
            </picture>
          </div>
          <div class="col-12 col-md-6">
            <picture>
              <img class="img-fluid rounded shadow-sm" src="asset/img/7.png" alt="">
            </picture>
          </div>
        </div>
      </div>
      <!-- Second image Ends here -->
    </div>
  </div>
  <!-- First Content Ends Here -->

  <!-- Second Content Starts Here -->
  <!--2nd history section Start-->
  <div class="container-sm mt-5 row gx-8 d-flex justify-content-center align-items-center mx-auto">
    <!-- History Starts Here -->
    <div class="col-12 col-lg-6 text-center">
      <picture>
        <img class="img-fluid mt-5 rounded-circle shadow-sm" src="asset/img-careers/BM history.jpg" alt="">
      </picture>
    </div>
    <div class="col-12 col-lg-6">
      <p class="mb-3 mt-5 small fw-bolder tracking-wider text-uppercase text-primary">How it started</p>
      <h2 class="display-5 fw-bold mb-6">History</h2>
      <p>December 2005 Initial engagement in the service industry in partnership with Yukon General
      Manpower Services Corp. to service the manpower requirment of Caltex Services Inc.., a
      wholly owned subsidiary of Chevron Phils. Inc.
     <br><br>June 2007 Spun off and established an independent corporate identity, Tri-Bay
      Employment Network Inc. Initially serviced Zagu Foods Corp. and Tridharma Marketing Corp.
      <br><br>October 2013 The birth of the new company, BMPower Human Resouces Corp. incorporated
      by two principal stockholders of Tri-Bay Network Inc.</p>
    </div>
    <!-- History Ends Here -->

    <!-- Vision Starts Here -->
    <div class="row mt-5">
      <div class="col-12 col-lg-6 order-lg-2 mt-5">
        <picture class="float-lg-end">
          <img class="img-fluid rounded-circle shadow-sm" src="asset/img-careers/vision.webp" alt="">
        </picture>
      </div>
      <div class="col-12 col-lg-6 order-lg-1 mt-5">
        <h2 class="display-5 fw-bold mb-6">Vision</h2>
        <p>To provide consistent, exceptional and quality 
        services that exceed the expectations of our valued customers.</p>
      </div>
    </div>
    <!-- Vision Ends Here -->

    <!-- Mission Starts Here -->
    <div class="col-12 col-lg-6 mt-5 pt-5">
      <picture>
        <img class="img-fluid rounded-circle shadow-sm" src="asset/img-careers/missio.jpg" alt="">
      </picture>
    </div>
    <div class="col-12 col-lg-6 mt-5">
      <h2 class="display-5 fw-bold mb-6 mt-5 float-st">Mission</h2>
      <p>To pursue long-term mutually beneficial relationships with high-value clients 
      by providing exceptional service thorough and accurate assessment of employees' 
      competencies and qualifications development of each individual employee to his/her 
      full potential will be pursued through appropriate training, mentoring, and coaching. 
      <br><br> To continuously identify opportunities to supply manpower services in high-value 
      high-growth industries and contribute to the development of such. Continuously develop 
      knowledge and expertise in the emerging industries and attain recognition as the manpower 
      service provider of choice. Reputation execute sound financial management practices to ensure sustained 
      <br><br>To consistently execute sound, prudent and disciplined financial management practices 
      to ensure sustained viable profitability for the welfare of the company's clients and employees.</p>
    </div>
    <!-- Mission Ends Here -->
  </div>
  <!-- Second Content Ends here -->

  <!-- About Contact Starts Here -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center">
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
        <h1 class="mb-5">Contact For Any Query</h1>
      </div>
      <div class="row g-4">
        <!-- About First Column Contact Starts Here -->
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
        <!-- About First Column Contact Ends Here -->
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
          <iframe class="position-relative rounded w-100 h-100"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.4517071411983!2d121.0498087759041!3d14.573317977742466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c843c16e98a7%3A0x2490161b0f227ab4!2sBmpower%20Human%20Resources%20Corp!5e0!3m2!1sen!2sph!4v1701820644930!5m2!1sen!2sph"
            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0">
          </iframe>
        </div>
        <div class="col-md-6">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
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
                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px">
                    </textarea>
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
  <!-- About Contact Ends Here -->

  <!--Footer section Start-->
  <div class="container-fluid footer">
        <div class="container py-5">
          <div class="row g-5">
            <div class="col-lg-3 col-md-6">
              <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">BMPHRC</h4>
              <a class="btn btn-link text-dark" href="2-About.html">About Us</a>
              <a class="btn btn-link text-dark" href="5-Contact.html">Contact Us</a>
              <a class="btn btn-link text-dark" href="#">Reservation</a>
              <a class="btn btn-link text-dark" href="#">Privacy Policy</a>
              <a class="btn btn-link text-dark" href="#">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
              <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">Contact</h4>
              <p class="mb-2 text-dark"><i class="fa fa-map-marker-alt me-3 text-success"></i>7 Sheridan, mandaluyong, Metro Manila</p>
              <p class="mb-2 text-dark"><i class="fa fa-phone-alt me-3 text-success"></i>+666 43 298</p>
              <p class="mb-2 text-dark"><i class="fa fa-envelope me-3 text-success"></i>MF'Jin_Yu@acc.com</p>
            <div class="d-flex pt-2">
              <a class="btn btn-outline-light btn-social" href="#"><i class="fa fa-envelope"></i></a>
              <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-viber"></i></a>
              <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-messenger"></i></a>
              <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <h4 class="section-title ff-secondary text-start text-success fw-normal mb-4">Opening</h4>
              <h5 class="text-dark fw-normal">Monday - Friday</h5>
              <p class=" text-dark ">08:00AM - 05:00PM</p><br>
              <h5 class="text-dark fw-normal">Saturday - Sunday</h5>
              <p class=" text-dark" style="margin-left: 50px;">Closed</p>
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
                &copy; <a class="border-bottom text-primary" href="2-About.html">BMPHRC</a>, All Right Reserved. 
                Designed By <a class="border-bottom text-primary" href="2-About.html">BMPHRC</a>
              </div>
              <div class="col-md-6 text-center text-md-end">
                <div class="footer-menu">
                  <a href="/1-Home.html" class="text-dark">Home</a>
                  <a href="#" class="text-dark">Cookies</a>
                  <a href="#" class="text-dark">Help</a>
                  <a href="5-Contact.html" class="text-dark">FAQs</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--Footer section End-->
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </html>

