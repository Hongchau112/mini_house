@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- ================ Preloader ================ -->
    <div id="preloader">
        <div class="spinner-grow" role="status"> <span class="sr-only">Loading...</span> </div>
    </div>
<!-- ================ Login page ================ -->
<div class="login-register-page pt-70 pb-70" style="margin-top: 108px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <!-- login box -->
                <div class="login-box">
                    <form class="form-style-1 shadow p-30" action="{{route('customer.login')}}" method="POST">
                        @csrf
                        <p>Nhập địa chỉ email và mật khẩu để đăng nhập </p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label font-size-14" for="exampleCheck1">Nhớ đăng nhập</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="forgot-password text-right"> <a href="" class="text-danger">Quên mật khẩu?</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-style-1 w-100">Đăng nhập</button>
                        </div>
                        <p class="mb-0">Chưa có tài khoản <a href="{{route('customer.customer_register')}}">Đăng ký ngay!</a></p>
                    </form>
                </div>
                <!-- login box end -->
            </div>
        </div>
    </div>
</div>
<!-- ================ Login page end ================ -->
@endsection
