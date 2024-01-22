<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <title>Document</title>  
</head>
<body>
    
    
    <div class="container-sm position-absolute top-50 start-50 translate-middle">
        <h2 class="text-center mb-5">BMPHRC: Management System ^2</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-auto">
                    <div class="card-body shadow">
                        <div class="d-flex justify-content-center">
                            <picture>
                                <img src="/asset/img/BMPowerLogo.png" alt="logo">
                            </picture>
                        </div>
                        <h2 class="text-center mb-1 mt-4 text-primary">Payroll Head Login</h2>
                        <form action="{{ route('login_user')}}" method="POST">
                            @csrf
                        <input type="text" name="email" id="email" class="form-control my-4 py-2 mt-5" value="{{old('email')}}" placeholder="Email" required/>
                        <input type="password" name="password" id="password" class="form-control my-4 py-2" value="{{old('password')}}" placeholder="Password" required/>
                        <input type="hidden" name="user_check" id="user_check" value = "2" />
                            <div class="container text-center mt-3">
                                <button type="submit" value="Login" class="btn btn-primary w-50">Login</button>
                               <!-- <a href="" class="nav link text-success mt-4 text-decoration-none d-block">Forgot Password?</a>
                                 <a href="/Admin/asset/html/P.Registration.html" class="nav-link text-primary mt-3">Sign Up</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-sm">
        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@include('sweetalert::alert')
</body>
</html>