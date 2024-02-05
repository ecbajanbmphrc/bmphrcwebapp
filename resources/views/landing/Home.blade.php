<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="asset/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/Nav.css">
    <link rel="stylesheet" href="asset/css/footer.css">
    <link rel="stylesheet" href="asset/css/career.css">
    <link rel="stylesheet" href="asset/css/partners.css">
    <link rel="stylesheet" href="asset/css/Jin.css">
    <link rel="stylesheet" href="asset/css/testimonials.css">

    <title>Home</title>  
</head>
<body>

  <style>
    row.gy-xxl-5 {
 display: flex;
 justify-content: center;
 align-items: center;
 flex-wrap: wrap; /* Allows the content to wrap to the next line if it doesn't fit in one line */
}

.col-lg-8,
.col-lg-4 {
 flex: 1; /* Make the columns take up equal width */
}
     
   </style> 
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

    <!--1st image section start-->
    <div class="container-sm mt-5 pt-5">
      <div class="img">
        <picture>
          <img src="asset/img/facebook_cover_photo_final2.jpg" alt="" class="img-fluid" style="width: 100%;" />
        </picture>
      </div>
    </div>
    <div class="container-sm d-flex justify-content-center align-items-center">
      <div class="img-fluid">
        <picture>
          <img src="asset/img/BMPowerlogo.png" alt="" class="img-fluid" />
        </picture>
      </div>
    </div>
    <!--1st image section end-->

    <!--devider start-->
    <div class="d-flex justify-content-center">
      <hr class="mt-5 w-50">
    </div>
    <!--devider end-->

    <!-- Hiring Section Start -->
    <div class="container-sm mt-5 d-flex justify-content-center">
      <div class="row g-sm-2">
        <div class="col-12 text-center">
          <h4 class="mb-5 text-muted fw-normal" style="font-size: 30px">
          WE ARE LOOKING FOR ENTHUSIASTIC, 
          MOTIVATED HARD-WORKING INDIVIDUALS TO COME AND 
          JOIN OUR GROWING FAMILY.
          </h4>
        </div>
        <!-- Column 1 Start -->
        <div class="col-sm-6">
          <h3 class="mb-5 fw-normal" style="font-size 23px; color: rgb(61, 57, 57);">Join Our Team</h3>
          <p class="text-secondary">1. MERCHANDISER
          <br>2. TACTICAL COMMANDO
          <br>3. ACCOUNT COORDINATOR    
          <br>4. MOTORIZED SALESMAN
          <br>5. VAN SALESMAN
          <BR>6. WAREHOUSEMAN
          <br>7. DELIVERY HELPER
          <br>8. HR STAFF
          <br>9. FINANCE STAFF
          <br>10. DATA ENCODER
          <br>11. OFFICE STAFF
          </p>
          <br><p>Start by applying here and attaching your resume, and the
          <br>application form with all of the valid requirements.
          </p>
        </div>
        <!-- Column 1 end -->
        <!-- Column 2 start -->
        <div class="col-sm-6">
          <h3 class="mb-5 fw-normal" style="font-size: 23px; rgb(61, 57, 57);">Apply Now</h3>
        <form action="">
          <div class="hiring-form">
            <input type="text" name="" id="" class="form-control my-4 py-2" placeholder="Name" />
            <input type="text" name="" id="" class="form-control my-4 py-2" placeholder="Phone" />
            <input type="text" name="" id="" class="form-control my-4 py-2" placeholder="Email" />
            <textarea class="form-control my-4 mt-4" id="remarks" name="remarks" placeholder="Message Us"></textarea>
            <label for="file" class="text-control">Attach File:</label>
            <input type="file" id="file" name="file" class="form-control-file mt-2"><br><br>
            <button type="submit" class="btn btn-dark w-100">Submit</button>
          </div>
        </form>
        <br><p class="Text-secondary">This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service Apply</p>  
        </div>
        <!-- Column 2 Ends -->
      </div>
    </div>
    <!-- Hiring Section Ends -->

    <!--devider start-->
    <div class="d-flex justify-content-center">
      <hr class="mt-5 w-50">
    </div>
    <!--devider end-->

    <!-- About us starts here -->
    <div class="container-sm mt-5 row gx-8 d-flex justify-content-center align-items-center mx-auto">
      <h2 class="mb-4 text-muted lead d-flex align-items-center justify-content-center" style="font-size: 40px; text-transform: uppercase; font-family:'lato';">About us</h2>
      <div class="col-12 col-lg-6 text-center">
        <picture>
          <img class="img-fluid rounded-circle shadow-sm" style="width: 450px; margin-top: 22px;" src="asset/img-careers/BM history.jpg" alt="">
        </picture>
      </div>
    <div class="col-12 col-lg-6">
      <h2 class="display-5 mb-6" style="color: rgb(61, 57, 57);">History</h2>
        <p class="text-secondary fst-italic">December 2005 Initial engagement in the service industry in partnership with Yukon General
        Manpower Services Corp. to service the manpower requirment of Caltex Services Inc.., a
        wholly owned subsidiary of Chevron Phils. Inc.
        <br><br>June 2007 Spun off and established an independent corporate identity, Tri-Bay
        Employment Network Inc. Initially serviced Zagu Foods Corp. and Tridharma Marketing Corp.
        <br><br>October 2013 The birth of the new company, BMPower Human Resouces Corp. incorporated
        by two principal stockholders of Tri-Bay Network Inc.</p>
        <a href="2-About.html" class="btn btn-dark">Read More</a>
    </div>

    <div class="row mt-5">
      <div class="col-12 col-lg-6 order-lg-2 mt-5">
        <picture class="float-lg-end">
            <img class="img-fluid rounded-circle shadow-sm" src="asset/img-careers/vision.webp" alt="">
        </picture>
      </div>
      <div class="col-12 col-lg-6 order-lg-1 mt-5">
        <h2 class="display-5 mb-6" style="color: rgb(61, 57, 57);">Vision</h2>
        <p class="text-secondary fst-italic">To provide consistent, exceptional and quality services that exceed 
        the expectations of our valued customers.</p>
      </div>
    </div>

    <div class="col-12 col-lg-6 mt-5 pt-5">
      <picture>
        <img class="img-fluid rounded-circle shadow-sm" src="asset/img-careers/missio.jpg" alt="">
      </picture>
    </div>
    <div class="col-12 col-lg-6 mt-5">
      <h2 class="display-5 mb-6 mt-5 float-st" style="color: rgb(61, 57, 57);">Mission</h2>
        <p class="text-secondary fst-italic">To pursue long-term mutually beneficial relationships with high-value 
        clients by providing exceptional service thorough and accurate assessment of employees' competencies 
        and qualifications development of each individual employee to his/her full potential will be pursued 
        through appropriate training, mentoring, and coaching. <br><br> To continuously identify opportunities 
        to supply manpower services in high-value high-growth industries and contribute to the development of such. 
        Continuously develop knowledge and expertise in the emerging industries and attain recognition as the 
        manpower service provider of choice. Reputation execute sound financial management practices to ensure 
        sustained <br><br>To consistently execute sound, prudent and disciplined financial management practices 
        to ensure sustained viable profitability for the welfare of the company's clients and employees.
      </p>
      </div>
    </div>

    <div class="d-flex justify-content-center my-5">
      <div class="rounded-pill border px-5 py-3 text-muted d-flex align-items-center">
        Want to join our team?<a href="3-Careers.html" class="fw-bold d-flex align-items-center ms-2" style="font-size: 15px;color: rgb(61, 57, 57);">
        We are hiring<i class="bi bi-arrow-right ms-1"></i>
        </a>
      </div>
    </div>
  <!-- About us ends here -->
    <div class="d-flex justify-content-center">
      <hr class="mt-5 w-50">
    </div>
  <!-- Devider -->

  <!-- Devider -->

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


    <!--contact start here-->
    
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
              <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                  <iframe class="position-relative rounded w-100 h-100"
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.4517071411983!2d121.0498087759041!3d14.573317977742466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c843c16e98a7%3A0x2490161b0f227ab4!2sBmpower%20Human%20Resources%20Corp!5e0!3m2!1sen!2sph!4v1701820644930!5m2!1sen!2sph"
                      frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                      tabindex="0"></iframe>
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
      
      <!-- jQuery -->
<script src="path/to/jquery/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="path/to/bootstrap/js/bootstrap.min.js"></script>

@include('sweetalert::alert')
  </body>
</html>