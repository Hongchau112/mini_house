@extends('admin.users.layout', [
    'title' => 'Chi tiết tài khoản'
])

@section('content')
    <div class="nk-content-body">
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-aside-wrap">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Thông tin cá nhân</h4>
                                    <div class="nk-block-des">
                                        <p>Thông tin cơ bản, như tên và địa chỉ của bạn</p>
                                    </div>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none">
                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="nk-data data-list">

                                <div class="data-head">
                                    <h6 class="overline-title">Thông tin</h6>
                                </div>
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Họ và tên</span>
                                        <span class="data-value">{{$user_show->name}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Số điện thoại</span>
                                        <span class="data-value">{{$user_show->phone}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value">{{$user_show->email}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Ngày sinh</span>
                                        <span class="data-value">{{date('d-m-Y', strtotime($user_show->birthday))}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                    <div class="data-col">
                                        <span class="data-label">Địa chỉ</span>
                                        <span class="data-value">{{$user_show->address}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- data-item -->

                                <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                    <div class="data-col">
                                        <span class="data-label">Giới tính</span>
                                        @if($user_show->sex=='female')
                                            <span class="data-value">Nữ</span>
                                        @elseif($user_show->sex=='female')
                                            <span class="data-value">Nam</span>
                                        @else
                                            <span class="data-value">Khác</span>
                                        @endif
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- data-item -->

                            </div><!-- data-list -->
                        </div><!-- .nk-block -->
                    </div>
                    <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                        <div class="card-inner">
                            <div class="data-col">
                                {{--                                        <span class="data-label">Họ và tên</span>--}}
                                <span class="data-value"><img src="{{asset('/images/'.$user_show->avatar)}}" class="rounded float-left"></span>
                            </div>
                        </div><!-- data-item -->
                    </div><!-- card-aside -->
                </div><!-- .card-aside-wrap -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
