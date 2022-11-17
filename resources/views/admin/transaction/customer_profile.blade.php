@extends('admin.transaction.layout', [
    'title' => 'Khách thuê'
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
                                    <h4 class="nk-block-title">Thông tin của khách thuê trọ</h4>

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
                                        <span class="data-label">CCCD/CMND</span>
                                        <span class="data-value">{{$user_show->identified_no}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Nghề nghiệp</span>
                                        @if($user_show->title=='adult')
                                            <span class="data-value">Người đi làm</span>
                                        @elseif($user_show->title=='student')
                                            <span class="data-value">Sinh viên</span>
                                        @else
                                            <span class="data-value">Khác</span>
                                        @endif
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
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value">{{$user_show->email}}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Ngày sinh</span>
                                        <span class="data-value">{{$user_show->birthday}}</span>
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
                            </div><!-- data-list -->
                            {{--                            <div class="nk-data data-list">--}}
                            {{--                                <div class="data-head">--}}
                            {{--                                    <h6 class="overline-title">Preferences</h6>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="data-item">--}}
                            {{--                                    <div class="data-col">--}}
                            {{--                                        <span class="data-label">Language</span>--}}
                            {{--                                        <span class="data-value">English (United State)</span>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change Language</a></div>--}}
                            {{--                                </div><!-- data-item -->--}}
                            {{--                                <div class="data-item">--}}
                            {{--                                    <div class="data-col">--}}
                            {{--                                        <span class="data-label">Date Format</span>--}}
                            {{--                                        <span class="data-value">M d, YYYY</span>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>--}}
                            {{--                                </div><!-- data-item -->--}}
                            {{--                                <div class="data-item">--}}
                            {{--                                    <div class="data-col">--}}
                            {{--                                        <span class="data-label">Timezone</span>--}}
                            {{--                                        <span class="data-value">Bangladesh (GMT +6)</span>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>--}}
                            {{--                                </div><!-- data-item -->--}}
                            {{--                            </div><!-- data-list -->--}}
                        </div><!-- .nk-block -->
                    </div>
                    <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                        <div class="card-inner-group" data-simplebar>
                            <div class="card-inner">
                                <div class="user-card">
                                    <div class="user-avatar bg-primary">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{$user_show->name}}</span>
                                        <span class="sub-text">{{$user_show->email}}</span>
                                    </div>

                                </div><!-- .user-card -->
                            </div><!-- .card-inner -->
                            {{--                            <div class="card-inner">--}}
                            {{--                                <div class="user-account-info py-0">--}}
                            {{--                                    <h6 class="overline-title-alt">Nio Wallet Account</h6>--}}
                            {{--                                    <div class="user-balance">12.395769 <small class="currency currency-btc">BTC</small></div>--}}
                            {{--                                    <div class="user-balance-sub">Locked <span>0.344939 <span class="currency currency-btc">BTC</span></span></div>--}}
                            {{--                                </div>--}}
                            {{--                            </div><!-- .card-inner -->--}}
                            <div class="card-inner p-0">
                                <ul class="link-list-menu">
                                    <li><a class="active" href="#"><em class="icon ni ni-user-fill-c"></em><span>Thông tin cá nhân</span></a></li>
                                </ul>
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- card-aside -->
                </div><!-- .card-aside-wrap -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
