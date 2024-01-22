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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="...">

    
    <link rel="stylesheet" href="css/Nav.css">
    <title>Document</title>  
</head>
<body>
        <!--Nabvar-->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand me-auto" href="#">BMPHRC</a>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="public/asset/img/BMPower.logo.png" alt=""></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active mx-lg-2" aria-current="page" href="1-Home.html">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mx-lg-2" href="2-About.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="3-Careers.html">Careers</a>
                      </li>      
                      <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="4-OurPartners.html">Our Partners</a>
                      </li>                     
                      <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="5-Contact.html">Contact</a>
                      </li>            
                  </ul>
                </div>
              </div>
              <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </div>
          </nav>
        <!--End Nabvar -->

        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow">                 
                            <div class="card-body">
                                <div class='d-flex justify-content-center'>
                                    <img src="/asset/img/BMPowerLogo.png" style="height: 200px; width: 200px;" class="card-img-top" alt="img txt">
                                    <br>                               
                                    </div>
                                <form action="">
                                    <input type="text" name="" id="" class="form-control my-4 py-2 mt-5" placeholder="Username"/>
                                    <input type="password" name="" id="" class="form-control my-4 py-2" placeholder="Password"/>
                                    <div class="text-center mt-3">
                                    <a href="index1.html" class="btn btn-primary w-50">Login</button></a>
                                    <a href="" class="nav link text-success" style="justify-content: center; margin-top: 15px; text-decoration: none;" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</a>
                                    <a href="7.Registration.html" class="nav-link text-primary ">SIGN UP</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    
        <!-- Button to trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                    <!-- Forgot Password Form -->
              <form>
                <div class="form-group">
                  <label for="inputEmail">Email address</label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Reset Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    


<!-- Bootstrap JavaScript and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="..."></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="..."></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="..."></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>