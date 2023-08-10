<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags dan judul head lainnya di sini -->

    <!-- Asset CSS dari template dan fontawesome -->
    <link href="{{asset("assets/login/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset("assets/login/css/sb-admin-2.min.css")}}" rel="stylesheet">
</head>

<body class="">

    <div class="container " style="width:70%">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <!-- Kolom dengan gambar -->
                    <div class="col-lg-6 d-none d-lg-block" style="background-image: url('{{asset('assets/img/VIIMA.png')}}'); background-position: center; background-size: cover; height: 60vh;"></div>

                    <!-- Kolom dengan formulir -->
                    <div class="col-lg-6">
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" style="margin-top:80px" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="name" class="form-control form-control-user" id="exampleInputEmail"
                                    name="name" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="user" class="form-control form-control-user" id="exampleInputEmail"
                                    name="admin">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Asset JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
