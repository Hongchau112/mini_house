<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Đăng nhập | Nhà trọ giá tốt</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('dashlite/./assets/css/dashlite.css?ver=2.5.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('dashlite/./assets/css/theme.css?ver=2.5.0')}}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="#" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{asset('dashlite/./images/logo.png')}}}" srcset="{{asset('dashlite/./images/logo2x.png 2x')}}" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{asset('dashlite/./images/logo-dark.png')}}" srcset="{{asset('dashlite/./images/logo-dark2x.png 2x')}}" alt="logo-dark">
                        </a>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Đăng nhập</h4>
                                    <div class="nk-block-des">
                                        <p>Xin chào bạn!</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('admin.login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="name">Username</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="text" @if(\Illuminate\Support\Facades\Cookie::has('adminuser')) value="{{\Illuminate\Support\Facades\Cookie::get('adminuser')}}" @endif class="form-control form-control-lg" id="name" name="name" placeholder="Nhập tên đăng nhập của bạn...">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <a class="link link-primary link-sm" href="{{route('admin.show_forgotPassword')}}">Quên mật khẩu?</a>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye" id="eye" onclick="toggle()"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" @if(\Illuminate\Support\Facades\Cookie::has('adminpwd')) value="{{\Illuminate\Support\Facades\Cookie::get('adminpwd')}}" @endif class="form-control form-control-lg" id="password" name="password" placeholder="Nhập mật khẩu...">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme">
                                        <label class="custom-control-label" for="rememberme">Nhớ mật khẩu</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Đăng nhập</button>
                                </div>
                            </form>
                            <div class="form-note-s2 text-center pt-4"> Bạn chưa có tài khoản? <a href="{{route('admin.register')}}">Tạo tài khoản</a>
                            </div>
                            <div class="text-center pt-4 pb-3">
                                <h6 class="overline-title overline-title-sap"><span>Hoặc</span></h6>
                            </div>
                            <ul class="nav justify-center gx-4">
                                <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Terms & Condition</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Help</a>
                                    </li>
                                    <li class="nav-item dropup">
                                        <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="{{asset('dashlite/./images/flags/english.png')}}" alt="" class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="{{asset('dashlite/./images/flags/spanish.png')}}" alt="" class="language-flag">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="{{asset('dashlite/./images/flags/french.png')}}" alt="" class="language-flag">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="{{asset('dashlite/./images/flags/turkey.png')}}" alt="" class="language-flag">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left">
                                    <p class="text-soft"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=2.5.0"></script>
<script src="./assets/js/scripts.js?ver=2.5.0"></script>
<script>
    var state=false;
    function toggle(){
        if(state){
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color='#7a797e';
            state = false;
        }
        else {
            document.getElementById("password").setAttribute("type","text");
            document.getElementById("eye").style.color='#5887ef';

            state = true;
        }

    }

</script>
</body>
</html>
