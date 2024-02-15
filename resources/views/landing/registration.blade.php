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
    
    
    <link rel="stylesheet" href="css/Nav.css">
    <title>Document</title>  
</head>
<body>

<section>
    <div class="container mt-5 pt-5 mb-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class='d-flex justify-content-center'>
                    <img src="/public/asset/img/BMPower.logo.png" style="height: 200px; width: 200px;" class="card-img-top" alt="img txt">
                    <br>                               
                    </div>
                <h2 class="card-title text-center mt-4 mb-4 text-primary">Sign Up</h2>
                
                <!-- Sign Up Form -->
                <form>
                  <!-- First Name and Last name Input -->
                  <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="name" placeholder="" name="name" required>
                    <label for="name" class="form-label mt-3">Last Name</label>
                    <input type="text" class="form-control" id="name" placeholder="" name="name" required>
                  </div>
                  
                  <!-- Mobile Number Input -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Mobile Number</label>
                    <input type="email" class="form-control" id="email" placeholder="" name="email" required>
                  </div>
                  
                  <!-- Email address Input -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="" name="email" required>
                  </div>
                  <!-- Password Input -->
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="" name="password" required>
                  </div>
                  
                  <!-- Confirm Password Input -->
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="" name="confirmPassword" required>
                  </div>

                  <!-- Check box Input -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="exampleCheckbox">
                    <label class="form-check-label" for="exampleCheckbox">I accept the Terms of Use & Privacy Policy</label>
                  </div>
                  <!-- Submit Button -->
                  
                  <button type="submit" class="btn btn-primary mt-2 w-50 mx-auto d-block mt-3">Sign Up</button>
                </form>
                <p class="mt-2 text-center">Already have an account? <a href="6.login.html">Login here</a></p>
                
                <!-- Copyrights -->
                <hr class="mb-4 mt-4">
                <div class="col-md-7 col-lg-8">
                    <p>Copyright© :<i></i>
                        <a href="1-Home.html" style="text-decoration: none;" class="text-success font-weight-bold">
                            BMPHRC.com
                        </a>
                    </p>
                </div>
                <!-- End Sign Up Form -->
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!--Bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>