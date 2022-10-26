<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/login-form/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('/login-form/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/login-form/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('/login-form/css/style.css')}}">

    <title>Login #8</title>
</head>
<body>



<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="{{asset('/login-form/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Đăng nhập <strong> nhà trọ giá tốt</strong></h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                        </div>
                        <form action="{{route('admin.login')}}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" id="name" name="name">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked"/>
                                </label>
                            </div>
                            <span class="ml-auto"><a href="{{route('admin.show_forgotPassword')}}" class="forgot-pass">Quên mật khẩu</a></span>

                            <input type="submit" value="Đăng nhập" class="btn text-white btn-block btn-primary">

                            <span class="d-block text-left my-4 text-muted"> hoặc đăng nhập với </span>

                            <div class="social-login">
                                <a href="" class="facebook">
                                    <span class="icon-facebook mr-3"></span>
                                </a>
                                <a href="#" class="twitter">
                                    <span class="icon-twitter mr-3"></span>
                                </a>
                                <a href="#" class="google">
                                    <span class="icon-google mr-3"></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="{{asset('login-form/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('login-form/js/popper.min.js')}}"></script>
<script src="{{asset('login-form/js/bootstrap.min.js')}}"></script>
<script src="{{asset('login-form/js/main.js')}}"></script>


</body>
</html>
