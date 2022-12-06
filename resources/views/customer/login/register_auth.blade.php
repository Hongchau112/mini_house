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
<!-- ================ Register page ================ -->
<div class="login-register-page pt-70 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <!-- register box -->
                <div class="login-box" style="background-color: #d5fcb0;">
                    <form class="form-style-1 shadow p-30" action="{{route('customer.store_customer')}}" method="POST">
                        @csrf
                        <p>Bạn chưa có tài khoản, hãy điền thông tin dưới đây để đăng ký tài khoản của nhà trọ nhé!</p>
                        <div class="form-group">
                            <label class="form-label">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Giới tính <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap ">
                                        <select class="form-control form-select" id="sex" name="sex" data-placeholder="Chọn" required>
                                            <option label="Chọn" value="">Chọn</option>
                                            <option value="male">Nam</option>
                                            <option value="female">Nữ</option>
                                            <option value="other">Khác</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Ngày sinh <span class="text-danger">*</span></label>
                                    <input name="birthday" type="date" id="birthday" class="form-control">
                                    <span class="text-danger">@error('birthday'){{$message}}@enderror</span>
                                    <small class="error"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email<span class="text-danger">*</span></label>

                            <input type="email" class="form-control" name="email" id="email" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>

                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" required>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Ảnh đại diện <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="avatar" id="avatar" required>
                                    <label class="custom-file-label" for="avatar">Chọn...</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-style-1 w-100">Tạo tài khoản</button>
                    </form>
                </div>
                <!-- register box end -->
            </div>
        </div>
    </div>
</div>
<!-- ================ Register page end ================ -->
@endsection
@push('footer')

@endpush
