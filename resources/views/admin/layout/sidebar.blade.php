<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('boarding_house/img/logo.png')}}" srcset="{{asset('boarding_house/img/logo.png')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('boarding_house/img/logo.png')}}" srcset="{{asset('boarding_house/img/logo.png')}}" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
{{--                    @if($user->account=='admin')--}}

                        <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt"></h6>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Tổng quan</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item {{request()->segment(2) == 'users' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.users.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                <span class="nk-menu-text">Quản lý tài khoản</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {{request()->segment(2) == 'room_categories' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.room_categories.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-view-list-sq"></em></span>
                                <span class="nk-menu-text">Danh mục</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.rooms.index')}}" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-dot-box-fill"></em></span>
                                <span class="nk-menu-text">Danh sách phòng</span>
                            </a>
                            <ul class="nk-menu-sub {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}" >
                                <li class="nk-menu-item">
                                    <a href="{{route('admin.rooms.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách</span></a>
                                </li>
                                <li class="nk-menu-item {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}">
                                    <a href="{{route('admin.rooms.card')}}" class="nk-menu-link"><span class="nk-menu-text">Thư viện</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {{request()->segment(2) == 'post_categories' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.post_categories.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-view-list-sq"></em></span>
                                <span class="nk-menu-text">Danh mục bài đăng</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {{request()->segment(2) == 'posts' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.posts.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-edit-alt"></em></span>
                                <span class="nk-menu-text">Bài đăng</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                        <li class="nk-menu-item has-sub {{request()->segment(2) == 'comments' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.comments.index')}}" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-comments"></em></span>
                                <span class="nk-menu-text">Bình luận</span>
                            </a>
                            <ul class="nk-menu-sub {{request()->segment(2) == 'comments' ? 'active current-page' : ''}}" >
                                <li class="nk-menu-item {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}">
                                    <a href="{{route('admin.comments.index')}}" class="nk-menu-link"><span class="nk-menu-text">Tất cả</span></a>
                                </li>
                                <li class="nk-menu-item {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}">
                                    <a href="{{route('admin.comments.not_approve')}}" class="nk-menu-link"><span class="nk-menu-text">Bình luận chờ duyệt</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {{request()->segment(2) == 'transactions' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.transactions.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                <span class="nk-menu-text">Đặt phòng</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {{request()->segment(2) == 'dashboard' ? 'active current-page' : ''}}">
                            <a href="{{route('admin.dashboard.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                <span class="nk-menu-text">Thống kê</span>
                            </a>
                        </li><!-- .nk-menu-item -->

{{--                            <ul class="nk-menu-sub">--}}
{{--                                <li class="nk-menu-item">--}}
{{--                                    <a href="" class="nk-menu-link"><span class="nk-menu-text">Tất cả người dùng</span></a>--}}
{{--                                </li>--}}

{{--                            </ul><!-- .nk-menu-sub -->--}}
                    </ul><!-- .nk-footer-menu -->
{{--                    @elseif($user->account=='staff')--}}
{{--                        <ul class="nk-menu">--}}
{{--                            <li class="nk-menu-heading">--}}
{{--                                <h6 class="overline-title text-primary-alt"></h6>--}}
{{--                            </li><!-- .nk-menu-item -->--}}
{{--                            <li class="nk-menu-heading">--}}
{{--                                <h6 class="overline-title text-primary-alt">Tổng quan</h6>--}}
{{--                            </li><!-- .nk-menu-heading -->--}}
{{--                            <li class="nk-menu-item {{request()->segment(2) == 'post_categories' ? 'active current-page' : ''}}">--}}
{{--                                <a href="{{route('admin.post_categories.index')}}" class="nk-menu-link">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>--}}
{{--                                    <span class="nk-menu-text">Danh mục bài đăng</span>--}}
{{--                                </a>--}}
{{--                            </li><!-- .nk-menu-item -->--}}
{{--                            <li class="nk-menu-item {{request()->segment(2) == 'posts' ? 'active current-page' : ''}}">--}}
{{--                                <a href="{{route('admin.posts.index')}}" class="nk-menu-link">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>--}}
{{--                                    <span class="nk-menu-text">Bài đăng</span>--}}
{{--                                </a>--}}
{{--                            </li><!-- .nk-menu-item -->--}}
{{--                            <li class="nk-menu-item has-sub {{request()->segment(2) == 'comments' ? 'active current-page' : ''}}">--}}
{{--                                <a href="{{route('admin.comments.index')}}" class="nk-menu-link nk-menu-toggle">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>--}}
{{--                                    <span class="nk-menu-text">Bình luận</span>--}}
{{--                                </a>--}}
{{--                                <ul class="nk-menu-sub {{request()->segment(2) == 'comments' ? 'active current-page' : ''}}" >--}}
{{--                                    <li class="nk-menu-item {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}">--}}
{{--                                        <a href="{{route('admin.comments.index')}}" class="nk-menu-link"><span class="nk-menu-text">Tất cả</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nk-menu-item {{request()->segment(2) == 'rooms' ? 'active current-page' : ''}}">--}}
{{--                                        <a href="{{route('admin.comments.not_approve')}}" class="nk-menu-link"><span class="nk-menu-text">Bình luận chờ duyệt</span></a>--}}
{{--                                    </li>--}}
{{--                                </ul><!-- .nk-menu-sub -->--}}
{{--                            </li><!-- .nk-menu-item -->--}}
{{--                            <li class="nk-menu-item {{request()->segment(2) == 'transactions' ? 'active current-page' : ''}}">--}}
{{--                                <a href="{{route('admin.transactions.index')}}" class="nk-menu-link">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>--}}
{{--                                    <span class="nk-menu-text">Đặt phòng</span>--}}
{{--                                </a>--}}
{{--                            </li><!-- .nk-menu-item -->--}}

{{--                            --}}{{--                            <ul class="nk-menu-sub">--}}
{{--                            --}}{{--                                <li class="nk-menu-item">--}}
{{--                            --}}{{--                                    <a href="" class="nk-menu-link"><span class="nk-menu-text">Tất cả người dùng</span></a>--}}
{{--                            --}}{{--                                </li>--}}

{{--                            --}}{{--                            </ul><!-- .nk-menu-sub -->--}}
{{--                        </ul><!-- .nk-footer-menu -->--}}
{{--                    @endif--}}
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
