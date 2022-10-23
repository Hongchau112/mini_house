@extends('admin.users.layout', [
    'title' => ( $title ?? 'Tạo tài khoản' )
])

@section('content')
<form action="/admin/store" method="POST">
    @csrf
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Điền thông tin bạn nhé</p>
                </div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="#" class="form-validate">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Họ và tên <span class="code-class">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="email">Email <span class="code-class">*</span></label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-mail"></em>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-phone">Số điện thoại <span class="code-class">*</span></label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone">+84</span>
                                        </div>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-phone">Giới tính <span class="code-class">*</span></label>
                                <div class="form-control-wrap">
                                    <ul class="custom-control-group">
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sex" id="sex-male" value="male" required>
                                                <label class="custom-control-label" for="sex-male" >Nam</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sex" id="sex-female" value="female" required>
                                                <label class="custom-control-label" for="sex-female" >Nữ</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="sex" id="sex-other" value="sex-other" required>
                                                <label class="custom-control-label" for="sex-other" >Khác</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="password">Mật khẩu <span class="code-class">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="new_password_confirmation">Xác nhận mật khẩu <span class="code-class">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-topics">Loại tài khoản <span class="code-class">*</span></label>
                                <div class="form-control-wrap ">
                                    <select class="form-control form-select" id="account" name="account" data-placeholder="Vui lòng chọn..." required>
                                        <option label="empty" value=""></option>
                                        <option value="admin">Người quản lý</option>
                                        <option value="user">Khách trọ</option>
                                        <option value="staff">Nhân viên</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-5">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .nk-block -->
{{--    <div class="form-group">--}}
{{--        <label for="name" style="font-weight: bold">Tên *</label>--}}
{{--        <input type="text" class="form-control" name="name" id="name" placeholder="Vui lòng nhập tên">--}}
{{--    </div>--}}
{{--    <div class="form-group" >--}}
{{--        <label for="email" style="font-weight: bold">Email *</label>--}}
{{--        <input type="email" class="form-control" name="email"id="email"  placeholder="Vui lòng nhập địa chỉ email">--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label for="phone" style="font-weight: bold">Số điện thoại *</label>--}}
{{--        <input type="text" class="form-control" name="phone"id="phone"  placeholder="Vui lòng nhập số điên thoại">--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label for="new_password" style="font-weight: bold">Mật khẩu *</label>--}}
{{--        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Vui lòng nhập mật khẩu">--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label for="new_password_confirmation" style="font-weight: bold">Xác nhận mật khẩu *</label>--}}
{{--        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Xác nhận mật khẩu">--}}
{{--    </div>--}}
{{--    <button type="submit" class="btn btn-primary">Tạo</button>--}}
</form>
@endsection
