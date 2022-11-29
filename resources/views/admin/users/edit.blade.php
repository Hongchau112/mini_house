@extends('admin.users.layout', [
    'title' => ( $title ?? 'Chỉnh sửa thông tin' )
])

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/update_account/{{$user_edit->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-des">
                        <p>Chỉnh sửa thông tin cá nhân</p>
                    </div>
                </div>
            </div>
            <div class="card card-bordered">
                <div class="card-inner">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Họ và tên <span class="code-class">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" value="{{$user_edit->name}}" name="name" required>
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
                                        <input type="text" class="form-control" id="email" value="{{$user_edit->email}}" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Năm sinh <span class="code-class">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control date-picker-alt" value="{{$user_edit->birthday}}" data-date-format="yyyy-mm-dd" name="birthday" id="birthday">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-phone">Số điện thoại <span class="code-class">*</span></label>
                                    <div class="form-control-wrap">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="phone"></span>
                                            </div>
                                            <input type="text" class="form-control" id="phone" value="{{$user_edit->phone}}" name="phone" required>
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
                                                    <input type="radio" class="custom-control-input" name="sex" id="sex-male" value="male" {{$user_edit->sex=='male' ? 'checked' : ''}} required>
                                                    <label class="custom-control-label" for="sex-male" >Nam</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="sex" id="sex-female" {{$user_edit->sex=='female' ? 'checked' : ''}} value="female" required>
                                                    <label class="custom-control-label" for="sex-female" >Nữ</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input" name="sex" id="sex-other" {{$user_edit->sex=='other' ? 'checked' : ''}} value="other" required>
                                                    <label class="custom-control-label" for="sex-other" >Khác</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Loại tài khoản <span class="code-class">*</span></label>
                                    <div class="form-control-wrap ">
                                        <select class="form-control form-select" id="account" name="account" data-placeholder="Vui lòng chọn..." required>
                                            <option label="empty" value=""></option>
                                            <option value="admin" <?php if ($user_edit->account=='admin') echo "selected=\"selected\"";  ?> >Người quản lý</option>
                                            <option value="user" <?php if ($user_edit->account=='user') echo "selected=\"selected\"";  ?> >Khách hàng</option>
                                            <option value="staff" <?php if ($user_edit->account=='staff') echo "selected=\"selected\"";  ?> >Nhân viên</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Địa chỉ <span class="code-class">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address" value="{{$user_edit->address}}" name="address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 offset-lg-5">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div><!-- .nk-block -->
    </form>
@endsection

