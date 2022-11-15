@extends('admin.users.layout', [
    'title' => ( $title ?? 'Chỉnh sửa thông tin' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Thay đổi thông tài khoản</h5>
            </div>
            <form action="/admin/update/{{$user_edit->id}}" method="POST" class="gy-3">
                @csrf
                @method('PATCH')
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label" for="site-name">Ảnh đại diện</label>
                            <span class="form-note"></span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="upload-zone" data-accepted-files="image/*">
                                    <div class="dz-message" data-dz-message>
                                        <span class="dz-message-text">Kéo file</span>
                                        <span class="dz-message-or">hoặc</span>
                                        <button class="btn btn-primary">Chọn</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label" for="name">Họ và tên</label>
                            <span class="form-note">Họ tên của bạn</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" value="{{$user_edit->name}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <span class="form-note">Địa chỉ email của bạn</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="email" value="{{$user_edit->email}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Số điện thoại</label>
                            <span class="form-note"></span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="phone" value="{{$user_edit->phone}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Giới tính</label>
                            <span class="form-note"></span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <ul class="custom-control-group g-3 align-center flex-wrap">
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sex" id="sex-male" {{$user_edit->sex=='male' ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="reg-enable">Nam</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sex" id="sex-female" {{$user_edit->sex=='female' ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="reg-disable">Nữ</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sex" id="sex-other" {{$user_edit->sex=='other' ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="reg-request">Khác</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Loại tài khoản</label>
                            <span class="form-note"></span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-control-wrap ">
                                    <select class="form-control form-select" id="account" name="account" data-placeholder="Vui lòng chọn..." required>
                                        <option label="empty" value=""></option>
                                        <option value="admin" <?php if ($user_edit->account=='admin') echo "selected=\"selected\"";  ?>> Người quản lý</option>
                                        <option value="user"  <?php if ($user_edit->account=='user') echo "selected=\"selected\"";  ?>>Khách trọ</option>
                                        <option value="staff"  <?php if ($user_edit->account=='staff') echo "selected=\"selected\"";  ?>>Nhân viên</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- card -->
{{--    <form action="/admin/update/{{$user_edit->id}}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PATCH')--}}
{{--        <div class="form-group">--}}
{{--            <label for="name">Tên</label>--}}
{{--            <input type="text" class="form-control" value="{{$user_edit->name}}" name="name" id="name" placeholder="Name">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="email">Địa chỉ email</label>--}}
{{--            <input type="email" class="form-control" value="{{$user_edit->email}}" name="email"id="email" aria-describedby="emailHelp" placeholder="Enter email">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="phone" >Số điện thoại</label>--}}
{{--            <input type="text" class="form-control" value="{{$user_edit->phone}}" name="phone" id="phone" placeholder="Mobile phone">--}}
{{--        </div>--}}
{{--        <button type="submit" class="btn btn-primary">Cập nhật</button>--}}
{{--    </form>--}}
@endsection

