@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])

@section('content')
<!-- ================ Inner banner ================ -->
<div class="inner-banner inner-banner-bg pt-70 pb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 mb-30">
                <!-- page-title -->
                <div class="page-title">
                    <h1>Register</h1>
                </div>
                <!-- page-title end -->
            </div>
            <div class="col-lg-4 col-md-4 mb-30">
                <!-- breadcrumb -->
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ol>
                <!-- breadcrumb end -->
            </div>
        </div>
    </div>
</div>
<!-- ================ Register page ================ -->
<div class="login-register-page pt-70 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <!-- register box -->
                <div class="login-box">
                    <form class="form-style-1 shadow p-30" action="{{route('customer.register_auth')}}" method="POST">
                        @csrf
                        <p>Don't have an account? Create your account, it takes less than a minute.</p>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">

                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="male"  name="sex" value="male">Nam
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="female" name="sex" value="female">Nữ
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="other" name="sex" value="other" >Khác
                                <label class="form-check-label"></label>
                                @if ($errors->has('sex'))
                                    <span class="text-danger">{{ $errors->first('sex') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">

                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" value="{{old('password')}}" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn-style-1 w-100">Create an Account</button>
                    </form>
                </div>
                <!-- register box end -->
            </div>
        </div>
    </div>
</div>
<!-- ================ Register page end ================ -->
@endsection
