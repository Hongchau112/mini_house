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
{{--                                <ul class="navbar-nav navbar-left" >--}}
                                    @php
                                        $count=0;
                                    @endphp

                                    @foreach($room_categories as $i => $cate)
                                        @if($cate->parent_category_id == 0)
                                            @php
                                                $count=$count+1;
                                            @endphp
                                        @endif

                                        @if($count < 6)
                                            @if($cate->parent_category_id==0)
                                                <li class="nav-item dropdown">
                                                    @php
                                                        $flag = 0;
                                                    @endphp
                                                    @foreach($room_categories as $cate3)
                                                        @if($cate3->parent_category_id==$cate->id)
                                                            @php
                                                                $flag = 1
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($flag==1)
                                                        <a class="nav-link dropdown-toggle"  href="{{route('customer.show_category', ['id'=> $cate->id])}}">{{$cate->name}}</a>

                                                    @else
                                                        <a class="nav-link" href="{{route('customer.show_category', ['id'=> $cate->id])}}">{{$cate->name}}</a>
                                                    @endif
                                                    <div class="dropdown-menu" style="padding: 0px; ">
                                                        @foreach($room_categories as $cate2)
                                                            @if($cate2->parent_category_id==$cate->id)
                                                                <a class="nav-link" href="{{route('customer.show_category', ['id'=> $cate2->id])}}">{{$cate2->name}}</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                @php
                                    $count=0;
                                @endphp

                                @foreach($post_categories as $i => $cate)
                                    @if($cate->parent_category_id == 0)
                                        @php
                                            $count=$count+1;
                                        @endphp
                                    @endif

                                    @if($count < 6)
                                        @if($cate->parent_category_id==0)
                                            <li class="nav-item dropdown">
                                                @php
                                                    $flag = 0;
                                                @endphp
                                                @foreach($post_categories as $cate3)
                                                    @if($cate3->parent_category_id==$cate->id)
                                                        @php
                                                            $flag = 1
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if($flag==1)
                                                    <a class="nav-link dropdown-toggle"  href="{{route('customer.post_category', ['id'=> $cate->id])}}">{{$cate->name}}</a>

                                                @else
                                                    <a class="nav-link" href="{{route('customer.post_category', ['id'=> $cate->id])}}">{{$cate->name}}</a>
                                                @endif
                                                <div class="dropdown-menu" style="padding: 0px; ">
                                                    @foreach($post_categories as $cate2)
                                                        @if($cate2->parent_category_id==$cate->id)
                                                            <a class="nav-link" href="{{route('customer.post_category', ['id'=> $cate2->id])}}">{{$cate2->name}}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                                <li class=""><a class="nav-link" href="{{route('customer.about_us')}}">Liên hệ</a></li>
                                <li class=""><a class="nav-link" href="{{route('customer.rooms.listing')}}">Tất cả trọ</a></li>



                                {{--                                </ul>--}}
                            </ul>
                        </div>
                        <!-- top menu end -->
                    </nav>
                    <!-- header navigation end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8 col-10 text-right">
                    <!-- header right link -->
                    <div class="header-right-link">

                            <ul>
                                @if($user!=null)
                                    @php
                                        $wish_count = \App\Models\Wistlist::where('user_id', $user->id)->get();
                                    @endphp
                                    <li>
                                        <div style="margin-right: 10px;">
                                            <a href="{{route('customer.show_wishlist', ['id'=>$user->id])}}"><i class="fa fa-heart" style="font-size: 20px; margin-top: 5px"></i></a>
                                            <span style="margin-left: -10px; font-weight: bold; font-size: 14px;">{{count($wish_count)}}</span>
                                        </div>
                                    </li>
                                    <li>
                                    <div class="dropdown" >

                                        <button class="btn btn-secondary dropdown-toggle" style="font-size: 12px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user" style="font-size: 15px"></i>
                                        </button>
                                        <div class="dropdown-menu" style="font-size: 12px;" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('customer.edit_profile', ['id' => $user->id])}}">Thông tin</a>
                                            <a class="dropdown-item" href="#">Cập nhật</a>
                                            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                                            <a class="dropdown-item" href="{{route('customer.booking_history', ['id'=> $user->id])}}">Lịch sử đặt phòng</a>

                                        </div>
                                    </div>
                                    </li>
                                    <li><a href="{{route('customer.logout')}}"><i class="fa fa-sign-out-alt" style="font-size: 18px;margin-top: 5px;"></i></a></li>
                                @else
                                    <li><a href="{{route('admin.login_auth')}}"><i class="fas fa-chevron-right"></i>Đăng nhập</a></li>
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
                    <form class="search-form mb-50" method="POST" action="{{route('customer.search')}}">
                        @csrf
                        <div class="logo"><input id="key-submit" name="key-submit" class="form-control" placeholder="Tìm kiếm..." value="">
                        <button class="search-submit"><i class="fas fa-search"></i></button>
                        </div>
                        <div id="search-ajax"></div>
                    </form>
{{--                    <div class="logo"><a class="navbar-brand p-0" href="index.html"><img src="{{asset('boarding_house/img/logo.png')}}" alt=""></a></div>--}}
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
@push('footer')
    <script>
        $(document).ready(function(){
            $("#key-submit").on('keyup', function (){
                var search = $(this).val();
                if(search!='')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{route('customer.global_search')}}',
                        type: "POST",
                        data: {'search': search, _token: _token},
                        success:function (data){
                            $('#search-ajax').fadeIn();
                            $('#search-ajax').html(data);
                            console.log(data);
                        }
                    })
                }
                else{
                    $('#search-ajax').fadeOut();
                }

            })
            $(document).on('click', '.search_room_ajax', function (){
                $('#key-submit').val($(this).text());
                $('#search-ajax').fadeOut();
            })

        })
    </script>
@endpush
