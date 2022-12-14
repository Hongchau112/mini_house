<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="#" class="logo-link">
                    <img src="{{ asset('/boarding_house/img/logo.png') }}" >
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="#">
                        <div class="nk-news-">
                            <em class="icon ni ni-"></em>
                        </div>
                        <div class="nk-news-text">
                            @if(session('newBooking'))
                                <p class="alert alert-primary" role="alert">
                                    There is a new order
                                </p>
                            @endif
{{--                            <p>Chào mừng bạn đến với nhatrogiatot</p>--}}
                            <em class="icon ni ni-external"></em>
                        </div>
                    </a>
                </div>
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">Admin</div>
                                    <div class="user-name dropdown-indicator">{{$user->name}}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>CH</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{$user->name}}</span>
                                        <span class="sub-text">{{$user->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{route('admin.show', ['id' => $user->id])}}"><em class="icon ni ni-user-alt"></em><span>Thông tin cá nhân</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('admin.edit', ['id'=>$user->id]) }}"><em class="icon ni ni-signout"></em><span>Chỉnh sửa thông tin</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Chế độ tối</span></a></li>
                                    <li><a href="http://localhost:8000/chatify/"><i class="fa fa-facebook-messenger"></i><span>Tin nhắn</span></a></li>

                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('admin.logout') }}"><em class="icon ni ni-signout"></em><span>Đăng xuất</span></a></li>
                                </ul>
                            </div>

                        </div>
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
