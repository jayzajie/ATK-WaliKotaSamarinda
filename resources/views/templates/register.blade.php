<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        .custom-card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }

        .form-control-user {
            border-radius: 10px !important;
            padding: 1rem !important;
            font-size: 0.9rem !important;
            border: 1px solid #e3e6f0 !important;
        }

        .form-control-user:focus {
            border-color: #4e73df !important;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25) !important;
        }

        .btn-user {
            border-radius: 10px !important;
            padding: 0.75rem 1rem !important;
            font-size: 0.9rem !important;
            font-weight: 600 !important;
        }

        .image-container {
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fc;
        }

        .image-container img {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            padding: 3rem !important;
        }

        .small {
            font-size: 0.875rem !important;
            color: #858796 !important;
        }

        .h4 {
            font-weight: 700 !important;
            color: #2e3a54 !important;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card custom-card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block image-container">
                                <img src="{{ asset('img/walikotasamarinda.jpg') }}" alt="Gambar" class="img-fluid" style="max-height: 450px;">
                            </div>
                            <div class="col-lg-7">
                                <div class="form-container">
                                    <div class="text-center mb-4">
                                        <h1 class="h4 text-gray-900">Create an Account</h1>
                                        <p class="mb-4 text-muted">Please fill in the information below</p>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" 
                                                placeholder="Full Name" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" 
                                                placeholder="Email Address" required>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password" class="form-control form-control-user" 
                                                    placeholder="Password" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password_confirmation" class="form-control form-control-user" 
                                                    placeholder="Repeat Password" required>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
                                    </form>
                                    
                                    <hr class="my-4">
                                    
                                    <div class="text-center mb-2">
                                        <a class="small text-primary" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-primary" href="login">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</body>
</html>