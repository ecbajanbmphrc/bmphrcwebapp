<!DOCTYPE html>
<html lang="en">
<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/asset/img/bmpowerlogowithbgcircle.png">

    <!-- Bootstrap CSS -->
    <link href="/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/asset/css/Nav.css">
    <title>Document</title> 
    
    <style>
#inputcontainer {
    display: flex;
}
#inputcontainer > svg {
  margin-top: 9px;
  margin-left: -40px;
  cursor : pointer;
  color : gray;
}
      </style>
</head>
<body>

        <!--Nabvar-->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand me-auto" href="#">BMPHRC</a>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="/asset/img/BMPowerLogo.png" alt=""></h5>
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
    <div class="container mt-5 pt-5 mb-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class='d-flex justify-content-center'>
                    <img src="/asset/img/BMPowerLogo.png" style="height: 200px; width: 200px;" class="card-img-top" alt="img txt">
                    <br>                               
                    </div>
                <h2 class="card-title text-center mt-4 mb-4 text-primary">Sign Up</h2>
                
             
                <form action="{{route('auth.register')}}" method="POST" >
                @csrf
               
      @if ($errors->any())
    <div style="background-color:rgba(255,255,255,0)" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
      @endif




                  <div class="mb-3">
                    <label for="name" class="form-label">First Name *</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{ old('first_name') }}" required>
                    <label for="last_name" class="form-label mt-3">Last Name *</label>
                    <input type="text" class="form-control" id="last_name" placeholder="" name="last_name" value="{{old('last_name')}}" required>
                  </div>
                  
                  <!-- Mobile Number Input -->
                  <div class="form-group">
                  <label for="number" class="form-label">Mobile Number *</label>
                  <div class="input-group mb-3">
                    
                    <br>
                    <!-- <span class="input-group-text">+639</span> -->
                    <small class="text-danger" id="errorMsg"></small>
                    <input type="phone" class="form-control" id="number" placeholder="" name="number"   oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")' onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11" value="{{ old('number') }}" required>
                
                  </div>


                    <!-- <input type="number" class="form-control" id="exampleInput" placeholder="Enter your number"
             oninput='setCustomValidity(value.length < 11 ? "Number must be at least 11 digits long." : "")'
             onchange='this.setAttribute("style", "width: 100%");'> -->

                 
                  </div>
                  
                  <!-- Email address Input -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address *</label>
                    <input type="email" class="form-control" id="email" placeholder="" name="email" value="{{ old('email') }}" required>
                    <!-- @error('email')
                   <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                  @error('email') is-invalid @enderror -->
                    
                  </div>
                  <!-- Password Input -->
                  <div class="mb-3">
                    <label for="password" class="form-label">Password *</label>

                    <div id="inputcontainer">
                    <input type="password" class="form-control" id="password" placeholder="" name="password"  value="{{old('password')}}" required>
                   
                    <!-- oninput='password.setCustomValidity(password.value != confirmPassword.value ? "Passwords do not match." : "")' -->
                    <svg id="open-eye" fill="#AB7C94" onclick="togglePass()" data-name="open-eye" xmlns="http://www.w3.org/2000/svg" height="21" width="24" viewBox="0 0 610 450"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    <svg id="close-eye" fill="#AB7C94" onclick="togglePass()" data-name="close-eye" style='display: none;' xmlns="http://www.w3.org/2000/svg" height="21" width="24" viewBox="0 0 610 450"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                   
                  </div>
                  <!-- <div class="alert-danger" style="color:red;background-color:white;font-size:10px"> {{ $errors->first ('password')}}</div> -->
                    <p style="color:gray;user-select: none;"><em>(Note: Password must contain uppercase, lowercase, special character, number and 8 characters min.)</em></p> 
                    <p id="PassChecker"  class="invalid-feedback" style="display:none">Password must meet the requirements!</p>
                                     
                  </div>
                  
                  <!-- Confirm Password Input -->
                 
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password *</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="" name="confirmPassword" required>
                    <p id="ConfirmPassChecker"  class="invalid-feedback" style="display:none">Password does not match!</p>
                    
                  </div>

                  <!-- Check box Input -->
                  <div class="mb-3">
                  
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1"  name="terms" id="terms" {{ old('terms') == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="exampleCheckbox">I accept the Terms of Use & Privacy Policy</label>
                    <!-- <p id="Checker"  class="invalid-feedback" style="display:none">Terms & Condition must be Checked!</p> -->
                   

            </div>

            
          
                  
                  </div>
                  <!-- Submit Button -->
                  
                  <button type="submit" class="btn btn-primary mt-2 w-50 mx-auto d-block mt-3" >Sign Up</button>
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




<script>

var x = document.getElementById("password");   
var s = document.getElementById("open-eye");               
var h = document.getElementById("close-eye");             

function togglePass() {
    if (x.type === "password") {
        x.type = 'text';
        s.style.display = 'none';
        h.style.display = 'inline';
    } else {
        x.type = 'password';
        s.style.display = 'inline';
        h.style.display = 'none';
    }   
}


  function validateForm() {
    var passwordInput = document.getElementById('password');
    var checkboxinput = document.getElementById('checkbox');
    var checkmate = document.getElementById('Checker');
    var confirmpword = document.getElementById('confirmPassword');
    var checkconfirmpass = document.getElementById('ConfirmPassChecker');
    var checkpass = document.getElementById('PassChecker');


    // Define password rules
    var minLength = 8;
    var uppercaseRegex = /[A-Z]/;
    var lowercaseRegex = /[a-z]/;
    var digitRegex = /\d/;
    var specialCharRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;
    var isCheck = false; 
    var isPasswordCorrect = false; 
    var isPasswordSame = false;

    // Validate password
    if (passwordInput.value.length < minLength ||
        !uppercaseRegex.test(passwordInput.value) ||
        !lowercaseRegex.test(passwordInput.value) ||
        !digitRegex.test(passwordInput.value) ||
        !specialCharRegex.test(passwordInput.value)) {
   
 //passwordError.textContent = 'Password must meet the requirements.';
      checkpass.style.display = "block";    
    }else{
      checkpass.style.display = "none";
      isPasswordCorrect = true;
    }
    try{
    if (passwordInput.value !== confirmpword.value){      
      isPasswordSame = false;
      checkconfirmpass.style.display = "block";
      confirmpword.classList.add('is-invalid');
    }else{
      confirmpword.classList.remove('is-invalid');
      isPasswordSame = true;
      checkconfirmpass.style.display = "none";
    }
  }catch{console.log(error_log);
  return false;}


    if (checkboxinput.checked == false){
      checkmate.style.display = "block";
    }
    else{
      checkmate.style.display = "none";

      isCheck = true;
    }

    if ((isPasswordCorrect == true) && (isCheck == true)) {

      return true;
    }
    else{
      console.log("false")
      return false;
    }
      


  }


</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = '{{ route('auth.login') }}';
            });
        </script>
@endif



<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="/asset/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
<!-- <script src="{{ $cdn?? asset('vendor/sweetalert/sweetalert.all.js')}}"></script> -->
@include('sweetalert::alert')
</body>
</html>