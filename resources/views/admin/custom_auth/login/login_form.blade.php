@extends('admin.custom_auth.layout', [
    'title' => ( $title ?? 'Login' )
])

@section('content')
    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
    </div>
    <div class="nk-block nk-block-middle nk-auth-body">
        <div class="brand-logo pb-5">
{{--            <a href="#" class="logo-link">--}}
{{--                <img class="logo-light logo-img logo-img-lg" src="#" srcset="./images/logo2x.png 2x" alt="logo">--}}
{{--                <img class="logo-dark logo-img logo-img-lg" src="#" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">--}}
{{--            </a>--}}
        </div>
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Sign-In</h5>
                <div class="nk-block-des">
                    <p>Access the DashLite panel using your email and passcode.</p>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <form action="{{route('admin.login')}}" method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="email-address">Email or Username</label>
                    <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                </div>
                <div class="form-control-wrap">
                    <input autocomplete="off" type="text" class="form-control form-control-lg" required id="email-address" placeholder="Enter your email address or username">
                </div>
            </div><!-- .form-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Passcode</label>
                    <a class="link link-primary link-sm" tabindex="-1" href="">Forgot Code?</a>
                </div>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input autocomplete="new-password" type="password" class="form-control form-control-lg" required id="password" placeholder="Enter your passcode">
                </div>
            </div><!-- .form-group -->
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block">Sign in</button>
            </div>
        </form><!-- form -->
        <div class="form-note-s2 pt-4"> New on our platform? <a href="#">Create an account</a>
        </div>
        <div class="text-center pt-4 pb-3">
            <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
        </div>
        <ul class="nav justify-center gx-4">
            <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
        </ul>
        <div class="text-center mt-5">
            <span class="fw-500">I don't have an account? <a href="#">Try 15 days free</a></span>
        </div>
    </div><!-- .nk-block -->
@endsection



