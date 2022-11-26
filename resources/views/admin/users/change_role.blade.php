@extends('admin.users.layout', [
    'title' => ( $title ?? '' )
])

@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-icon">
            {{ session('error') }}
        </div>
    @endif
    <div class="row g-gs">
        <div class="col-lg-6" style="margin-left: 275px;">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-head">
                        <h5 class="card-title" style="text-align: center;">Thay đổi quyền của tài khoản {{$user_find->name}}</h5>
                    </div>
                    <form action="{{route('admin.assign_roles', ['id' => $user_find->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <h6>Email: {{$user_find->email}}</h6>

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Vui lòng nhập mật khẩu tài khoản admin <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Thay đổi quyền <span class="text-danger">*</span></label>
                            <div class="form-control-wrap" style="width: 300px;">
                                <select class="form-select" name="change_role">
                                    <option value="user" {{$user_find->account=='user' ? 'selected' : ''}}>Người dùng</option>
                                    <option value="admin" {{$user_find->account=='admin' ? 'selected' : ''}}>Quản trị </option>
                                    <option value="staff" {{$user_find->account=='staff' ? 'selected' : ''}}>Nhân viên</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary" style="margin-left: 180px;">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
