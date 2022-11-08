<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('dashlite/images/logo.png')}}" srcset="{{asset('dashlite/images/logo2x.png 2x')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('dashlite/images/logo-dark.png')}}" srcset="{{asset('dashlite/images/logo-dark2x.png 2x')}}" alt="logo-dark">
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
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt"></h6>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Applications</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item has-sub">
                            <a href="{{route('admin.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Quản lý tài khoản</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{route('admin.room_categories.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                                <span class="nk-menu-text">Danh mục</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="{{route('admin.rooms.index')}}" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                <span class="nk-menu-text">Danh sách phòng</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('admin.rooms.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('admin.rooms.card')}}" class="nk-menu-link"><span class="nk-menu-text">Thư viện</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{route('admin.posts.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                                <span class="nk-menu-text">Bài đăng</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{route('admin.comments.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                                <span class="nk-menu-text">Bình luận</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                                <span class="nk-menu-text">Đặt phòng</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                <span class="nk-menu-text">Cơ sở vật chất</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="html/transaction-basic.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Basic</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/transaction-crypto.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Crypto</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                <span class="nk-menu-text">Thư viện ảnh</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="html/transaction-basic.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Basic</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/transaction-crypto.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Crypto</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->

{{--                            <ul class="nk-menu-sub">--}}
{{--                                <li class="nk-menu-item">--}}
{{--                                    <a href="" class="nk-menu-link"><span class="nk-menu-text">Tất cả người dùng</span></a>--}}
{{--                                </li>--}}

{{--                            </ul><!-- .nk-menu-sub -->--}}
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
