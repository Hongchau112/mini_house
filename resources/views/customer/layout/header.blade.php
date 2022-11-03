<header class="header">
    <!-- header upper -->
    <div class="header-upper-bar">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-8 col-md-6 col-sm-4 col-2">
                    <!-- header navigation -->
                    <nav class="navbar header-navigation navbar-expand-lg p-0">
                        <!-- mobile Toggle -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTheme" aria-controls="navbarTheme" aria-expanded="false" aria-label="Toggle navigation"> <span></span> <span></span> <span></span> </button>
                        <!-- mobile toggle end -->
                        <!-- top Menu -->
                        <div class="collapse navbar-collapse" id="navbarTheme">
                            <ul class="navbar-nav align-items-start align-items-lg-center">
                                <li class="active"><a class="nav-link" href="{{route('customer.index')}}">Trang chủ</a></li>
                                <li><a class="nav-link" href="about.html">Chúng tôi</a></li>
                                <li><a class="nav-link" href="gallery.html">Thư viện</a></li>
{{--                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinations</a>--}}
{{--                                    <div class="dropdown-menu" aria-labelledby="dropdown02"> <a class="dropdown-item" href="destinations.html">Destinations</a> <a class="dropdown-item" href="destination-detail.html">Destination Detail</a> </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>--}}
{{--                                    <div class="dropdown-menu" aria-labelledby="dropdown04"> <a class="dropdown-item" href="blog.html">Blog</a> <a class="dropdown-item" href="blog-single.html">Blog Singal</a> </div>--}}
{{--                                </li>--}}
                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục trọ</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown05"> <a class="dropdown-item" href="{{route('customer.rooms.listing')}}">Danh sách trọ</a> <a class="dropdown-item" href="#">Hotel Detail</a> <a class="dropdown-item" href="signin.html">Login</a> <a class="dropdown-item" href="register.html">Register</a> <a class="dropdown-item" href="team.html">Team</a> <a class="dropdown-item" href="testimonial.html">Testimonial</a> <a class="dropdown-item" href="traveler-information.html">Traveler Information</a> <a class="dropdown-item" href="payment-information.html">Payment Information</a> <a class="dropdown-item" href="faq.html">Faq</a> </div>
                                </li>
                                <li><a class="nav-link" href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                        <!-- top menu end -->
                    </nav>
                    <!-- header navigation end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8 col-10 text-right">
                    <!-- header right link -->
                    <div class="header-right-link">
                        @php
                            $wish_count = \App\Models\Wistlist::count();
                        @endphp
                            <ul>
                                @if($user)
                                    <li>
                                        <div style="margin-right: 10px;">
                                            <a href="{{route('customer.show_wishlist', ['id'=>$user->id])}}"><i class="fa fa-heart" style="font-size: 20px; margin-top: 5px"></i></a>
                                            <span style="margin-left: -10px; font-weight: bold; font-size: 14px;"> {{$wish_count}}</span>
                                        </div>
                                    </li>
                                    <li>
                                    <div class="dropdown" >

                                        <button class="btn btn-secondary dropdown-toggle" style="font-size: 12px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user" style="font-size: 15px"></i>
                                        </button>
                                        <div class="dropdown-menu" style="font-size: 12px;" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('customer.edit_profile', ['id'=>$user->id])}}">Thông tin</a>
                                            <a class="dropdown-item" href="#">Cập nhật</a>
                                            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                                        </div>
                                    </div>
                                    </li>
                                    <li><a href="{{route('customer.logout_user')}}"><i class="fa fa-sign-out-alt" style="font-size: 18px;margin-top: 5px;"></i></a></li>
                                @else
                                    <li><a href=""><i class="fas fa-chevron-right"></i>Đăng nhập</a></li>
                                    <li><a href="contact-us.html" class="header-request">Request a Quote</a></li>

                            </ul>
                        @endif
                    </div>
                    <!-- header right link end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header upper end -->
    <!-- header lover -->
    <div class="header-lover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <!-- brand -->
                    <div class="logo"><a class="navbar-brand p-0" href="index.html"><img src="{{asset('boarding_house/img/logo.png')}}" alt=""></a></div>
                    <!-- brand end -->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!-- header call us -->
                    <div class="header-call-us">
                        <ul>
                            <li>
                                <div class="iocn-holder"><i class="far fa-clock"></i></div>
                                <div class="text-holder">
                                    <h6>Giờ hoạt động</h6>
                                    <p class="mb-0">Từ thứ 2 đến chủ nhật</p>
                                </div>
                            </li>
                            <li>
                                <div class="iocn-holder"><i class="fas fa-phone-volume"></i></div>
                                <div class="text-holder">
                                    <h6>Gọi ngay</h6>
                                    <p class="mb-0"><a href="tel:123456789">0965 149 361</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="iocn-holder"><i class="far fa-envelope"></i></div>
                                <div class="text-holder">
                                    <h6>Email liên hệ</h6>
                                    <p class="mb-0"><a href="mailto:info@exampal.com">info@exampal.com</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- header call us end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header lover end -->
</header>
