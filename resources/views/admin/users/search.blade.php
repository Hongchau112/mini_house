<div class="nk-tb-item nk-tb-head" >
    <div class="nk-tb-col"><span class="sub-text">STT</span></div>
    <div class="nk-tb-col"><span class="sub-text">Tài khoản</span></div>
    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Số điện thoại</span></div>
    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Giới tính</span></div>
    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Trạng thái</span></div>
    <div class="nk-tb-col tb-col-md"><span class="sub-text">Quyền</span></div>
    <div class="nk-tb-col nk-tb-col-tools text-right"> Tùy chọn
    </div>
</div><!-- .nk-tb-item -->
@php
    $i=0;
@endphp
@foreach($user_lists as $user_sub)
    @php
        $i+=1;
    @endphp
    <div class="nk-tb-item">
        <div class="nk-tb-col nk-tb-col-check">
            <div class="custom-control custom-control-sm custom-checkbox notext">
                <div>{{$i}}</div>
                {{--                                            <label class="custom-control-label" for="{{$i}}"></label>--}}
            </div>
        </div>
        <div class="nk-tb-col">
            <a href="#">
                <div class="user-card">
                    <div class="user-avatar sq">
                        <img src="{{asset('/images/'.$user_sub->avatar)}}">
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
        {{--                                    <div class="nk-tb-col tb-col-md">--}}
        {{--                                        @if($user_sub->account=='staff')--}}
        {{--                                            <span>Nhân viên</span>--}}
        {{--                                        @elseif($user_sub->account=='user')--}}
        {{--                                            <span>Người dùng</span>--}}
        {{--                                        @else--}}
        {{--                                            <span>Người quản trị</span>--}}
        {{--                                        @endif--}}
        {{--                                    </div>--}}
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
            @if($user_sub->account=='user')
                <span class="badge badge-outline-primary">Người dùng</span>
            @endif
            @if($user_sub->account=='admin')
                <span class="badge badge-outline-primary">Quản trị</span>
            @endif
            @if($user_sub->account=='staff')
                <span class="badge badge-outline-primary">Nhân viên</span>
            @endif
            {{--                                            <input type="checkbox" name="role" {{($user_sub->account=='user') ? 'checked' : ''}}>--}}
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
                                <li><a href="{{route('admin.change_role', [$user_sub->id])}}"><em class="icon ni ni-activity-round"></em><span>Đổi quyền</span></a></li>
                                <li><a href="{{route('admin.block', ['id' => $user_sub->id])}}"><em class="icon ni ni-activity-round"></em><span>Block</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div><!-- .nk-tb-item -->
@endforeach
