<div class="nk-tb-item nk-tb-head" >
    <div class="nk-tb-col nk-tb-col-check">
        <div class="custom-control custom-control-sm custom-checkbox notext">
            <input type="checkbox" class="custom-control-input" id="uid">
            <label class="custom-control-label" for="uid"></label>
        </div>
    </div>
    <div class="nk-tb-col"><span class="sub-text">Tài khoản</span></div>
    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Số điện thoại</span></div>
    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Giới tính</span></div>
    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Trạng thái</span></div>
    <div class="nk-tb-col tb-col-md"><span class="sub-text">User</span></div>
    <div class="nk-tb-col tb-col-md"><span class="sub-text">Admin</span></div>
    <div class="nk-tb-col tb-col-md"><span class="sub-text">Đổi quyền</span></div>
    <div class="nk-tb-col nk-tb-col-tools text-right">
    </div>
</div><!-- .nk-tb-item -->
@foreach($user_lists as $user_sub)
    <div class="nk-tb-item">
        <div class="nk-tb-col nk-tb-col-check">
            <div class="custom-control custom-control-sm custom-checkbox notext">
                <input type="checkbox" class="custom-control-input" id="uid1">
                <label class="custom-control-label" for="uid1"></label>
            </div>
        </div>
        <div class="nk-tb-col">
            <a href="html/user-details-regular.html">
                <div class="user-card">
                    <div class="user-avatar bg-primary">
                        <span>AB</span>
                    </div>
                    <div class="user-info">
                        <span class="tb-lead">{{$user_sub->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                        <span>{{$user_sub->email}}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span class="tb-amount">{{$user_sub->phone}}</span></span>
        </div>
{{--        <div class="nk-tb-col tb-col-md">--}}
{{--            @if($user_sub->account=='staff')--}}
{{--                <span>Nhân viên</span>--}}
{{--            @elseif($user_sub->account=='user')--}}
{{--                <span>Người dùng</span>--}}
{{--            @else--}}
{{--                <span>Người quản trị</span>--}}
{{--            @endif--}}
{{--        </div>--}}
        <div class="nk-tb-col tb-col-lg">
            <ul class="list-status">
                @if($user_sub->sex=='female')
                    <li><em class="icon text-success ni ni-check-circle"></em> <span>Nữ</span></li>
                @elseif($user_sub->sex=='male')
                    <li><em class="icon text-success ni ni-check-circle"></em> <span>Nam</span></li>
                @else
                    <li><em class="icon text-success ni ni-check-circle"></em> <span>Khác</span></li>
                @endif
                {{--                                            <li><em class="icon text-success ni ni-check-circle"></em> <span>{{$user_sub->sex}}</span></li>--}}
            </ul>
        </div>
        <div class="nk-tb-col tb-col-lg">
            @if($user_sub->status==1)
                <span class="tb-status text-success">Kích hoạt</span>
            @else
                <span class="tb-status text-danger">Bị khóa</span>
            @endif
        </div>

        <div class="nk-tb-col tb-col-md">
            <input type="checkbox" name="user_role" {{$user_sub->hasRole('user') ? 'checked' : ''}}></span>
        </div>


        <div class="nk-tb-col tb-col-md">
            <input type="checkbox" name="admin_role" {{$user_sub->hasRole('admin') ? 'checked' : ''}}></span>
        </div>

        <div class="nk-tb-col tb-col-md">
            <input type="hidden" name="email" value="{{$user_sub->email}}">
            <input type="submit" value="Thay đổi" class="btn btn-sm btn-gray">
        </div>
        <div class="nk-tb-col nk-tb-col-tools">
            <ul class="nk-tb-actions gx-1">
                <li>
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="{{route('admin.show', ['id' => $user_sub->id])}}"><em class="icon ni ni-eye"></em><span>Xem</span></a></li>
                                <li><a href="{{route('admin.edit', ['id' => $user_sub->id])}}"><em class="icon ni ni-repeat"></em><span>Sửa</span></a></li>
                                <li><a href="{{route('admin.block', ['id' => $user_sub->id])}}"><em class="icon ni ni-activity-round"></em><span>Block</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div><!-- .nk-tb-item -->
@endforeach
