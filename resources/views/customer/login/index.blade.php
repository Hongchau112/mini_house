@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- ================ Preloader ================ -->
    <div id="preloader">
        <div class="spinner-grow" role="status"> <span class="sr-only">Loading...</span> </div>
    </div>
    <!-- ================ Preloader end ================ -->

    <!-- ================ Slider area ================ -->
    <div class="slider">
        <!-- search area -->
{{--        <div class="search-area">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6 col-md-8 col-sm-12 col-12 offset-xl-0 offset-lg-3 offset-sm-0">--}}
{{--                        <div class="center-search">--}}
{{--                            <h1 class="text-white">Enjoy Your Holiday</h1>--}}
{{--                            <p class="text-white">Search and Book Hotel</p>--}}
{{--                            <form class="form-style-1">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search City">--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control" id="check-in" placeholder="Check In">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control" id="check-out" placeholder="Check Out">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <select class="form-control">--}}
{{--                                                <option>Adult(s)(18+)</option>--}}
{{--                                                <option>1</option>--}}
{{--                                                <option>2</option>--}}
{{--                                                <option>3</option>--}}
{{--                                                <option>4</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <select class="form-control">--}}
{{--                                                <option>Children(0-17)</option>--}}
{{--                                                <option>1</option>--}}
{{--                                                <option>2</option>--}}
{{--                                                <option>3</option>--}}
{{--                                                <option>4</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <select class="form-control">--}}
{{--                                        <option>Rooms</option>--}}
{{--                                        <option>1</option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn-style-1 w-100">Search</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- search area end -->
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <!-- slider item -->
                <div class="carousel-item active"> <img src="{{asset('boarding_house/img/slider/slidebar.png')}}" alt="" class="img-fluid"> </div>
                <!-- slider item end -->
                <!-- slider item -->
                <div class="carousel-item"> <img src="{{asset('boarding_house/img/slider/slidebar1.png')}}" alt="" class="img-fluid"> </div>
                <!-- slider item end -->
                <!-- slider item -->
                <div class="carousel-item"> <img src="{{asset('boarding_house/img/slider/slidebar2.png')}}" alt="" class="img-fluid"> </div>
                <!-- slider item end -->
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <i class="fas fa-caret-left"></i></a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <i class="fas fa-caret-right"></i></a> </div>
    </div>
    <!-- ================ Slider area end ================ -->

    <!-- ================ About area ================ -->
    <div class="about-area pt-70 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <!-- about text -->
                    <div class="about-col">
                        <h6>Về nhà trọ giá tốt</h6>
                        <h2>Chúng tôi <span>cung cấp nhiều phòng trọ</span> với nhiều tiện nghi cho sinh viên và người đi làm.</h2>
                        <p>Các bạn tân sinh viên nói riêng và người mới nhập cư nói chung, ít hay nhiều thì cũng sẽ gặp khó khăn trong việc tìm kiếm phòng trọ. Đa phần là do các bạn chưa có nhiều kinh nghiệm, cũng như phải đối diện với quá nhiều “cạm bẫy” lừa đảo tinh vi.</p>
                        <p>Chotot.com có giao diện đẹp và thân thiện với người dùng, vì vậy website luôn thu hút được một lượng rất lớn người truy cập hàng tháng. Bên cạnh đó thì việc đăng tin rao vặt về mảng bất động sản và cho thuê phòng trọ trên trang này cũng rất hiệu quả.</p>
                        <a class=" btn-style-1" href="#" role="button">Đọc thêm<i class="fas fa-long-arrow-alt-right pl-6"></i></a> </div>
                    <!-- about text end -->
                </div>
                <div class="col-lg-6 mb-30">
                    <!-- about video -->
                    <div > <img src="/images/index.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <!-- about video end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ About area end ================ -->

    <!-- ================ Most popular hotel ================ -->
    <div class="most-popular-hotel pt-70 pb-70 position-relative">
        <div class="bg-style-1"></div>
        <div class="container">
            <!-- section title -->
            <div class="section-title text-center">
                <h2>Nhà trọ phổ biến gần đây</h2>
                <span class="dashed-border"></span> </div>
            <!-- section title -->
        </div>
        <div class="container-fluid">
            <!-- popular hotel carousel -->
            <div class="popular-hotel-carousel owl-carousel owl-theme">
                @foreach($rooms as $room)
                <div class="item">

                    <!-- popular hotel box -->
                    <div class="popular-hotel-box">
                        @foreach($images as $image)
                            @if($room->id == $image->room_id)
                                @php
                                    $image_path = $image->image_path;
                                @endphp
                            @endif
                        @endforeach
                            <div class="imege mb-10"><img src="{{asset('/images/'.$image_path)}}" width="300px" height="250px" alt=""></div>
                        <div class="reting"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </div>
                        <h4><a href="{{route('customer.rooms.details',['id'=>$room->id])}}">{{$room->name}}</a></h4>
                        <div class="price">{{number_format($room->cost)}} đ<span>/Tháng</span></div>
                    </div>

                    <!-- popular hotel box end -->
                </div>
                @endforeach
            </div>
            <!-- popular hotel carousel end -->
        </div>
    </div>
    <!-- ================ Most popular hotel end ================ -->


    <!-- ================ Blog area ================ -->
    <div class="blog-area pt-70 pb-40 position-relative">
        <div class="bg-style-1"></div>
        <div class="container">
            <!-- section title -->
            <div class="section-title text-center">
                <h2>Bài đăng gần đây</h2>
                <span class="dashed-border"></span> </div>
            <!-- section title -->
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 mb-30">
                    <!-- blog box -->
                    <div class="blog-box shadow">
                        <div class="blog_img mb-20"><img src="{{asset('/images/posts/'.$post->image)}}" width="320px" height="250px" alt=""></div>
                        <div class="blog-des">
                            <h6 class="blog_date font-weight-normal text-muted"><span>Thông tin</span> {{$post->created_at}}</h6>
                            <h5 class="mt-10 mb-6"><a href="{{route('customer.posts.details', ['id'=>$post->id])}}" class="text-dark">{{$post->title}}</a></h5>
                            <p class="text-muted">{{$post->intro}}</p>
                            <div class="read_more">
                                <div class="blog_border"></div>
                                <a href="{{route('customer.posts.details', ['id'=>$post->id])}}" class="text-dark text-uppercase">Đọc thêm...</a> </div>
                        </div>
                    </div>
                    <!-- blog box end -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ================ Blog area end ================ -->

{{--    <!-- ================ Download app are ================ -->--}}
{{--    <div class="download-app-area pt-70 pb-40">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-md-6 col-sm-8 mb-30">--}}
{{--                    <!-- app text -->--}}
{{--                    <div class="app-text">--}}
{{--                        <h5 class="text-white">Download our app</h5>--}}
{{--                        <h2 class="mb-10 text-white">Wow! Get This Templete App For Your Mobile</h2>--}}
{{--                        <ul class="text-white">--}}
{{--                            <li class="pb-6"><i class="fas fa-check pr-6"></i> Find nearby hotel in your network with templete</li>--}}
{{--                            <li class="pb-6"><i class="fas fa-check pr-6"></i> Get paperless confirmation</li>--}}
{{--                            <li class="pb-6"><i class="fas fa-check pr-6"></i> Make changes whenever, wherever</li>--}}
{{--                            <li class="pb-6"><i class="fas fa-check pr-6"></i> 24/7 customer service in more than 40 languages</li>--}}
{{--                            <li class="pb-6"><i class="fas fa-check pr-6"></i> No booking or credit card fees</li>--}}
{{--                            <li class="pb-6"><i class="fas fa-check pr-6"></i> No booking or credit card fees</li>--}}
{{--                            <li><i class="fas fa-check pr-6"></i> Add your own reviews and photos</li>--}}
{{--                        </ul>--}}
{{--                        <div class="app-download-btn mt-20"> <a href="#"><img src="{{asset('boarding_house/img/appstore-button.png')}}" alt=""></a> <a href="#"><img src="img/google-play-button.png" alt=""></a> </div>--}}
{{--                    </div>--}}
{{--                    <!-- app text end -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6 col-sm-4">--}}
{{--                    <!-- app img -->--}}
{{--                    <div class="app-img"> <img src="{{asset('boarding_house/img/app-image-1.png')}}" alt=""> </div>--}}
{{--                    <!-- app img end -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- ================ Download app are end ================ -->--}}

{{--    <!-- ================ How it works ================ -->--}}
{{--    <div class="how-it-works pt-70 pb-40 position-relative">--}}
{{--        <div class="bg-style-1"></div>--}}
{{--        <div class="container">--}}
{{--            <!-- section title -->--}}
{{--            <div class="section-title text-center">--}}
{{--                <h2>How it Works</h2>--}}
{{--                <span class="dashed-border"></span> </div>--}}
{{--            <!-- section title -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4 col-md-4 mb-30">--}}
{{--                    <!-- how it work box -->--}}
{{--                    <div class="how-it-work-box text-center">--}}
{{--                        <div class="icon mb-15"><img src="{{asset('boarding_house/img/icon/1.png')}}" alt=""></div>--}}
{{--                        <h4 class="mb-10">Search Multiple Destinations</h4>--}}
{{--                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum.</p>--}}
{{--                    </div>--}}
{{--                    <!-- how it work box end -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-4 mb-30">--}}
{{--                    <!-- how it work box -->--}}
{{--                    <div class="how-it-work-box text-center">--}}
{{--                        <div class="icon mb-15"><img src="{{asset('boarding_house/img/icon/2.png')}}" alt=""></div>--}}
{{--                        <h4 class="mb-10">Find the Lowest Hotel Prices</h4>--}}
{{--                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum.</p>--}}
{{--                    </div>--}}
{{--                    <!-- how it work box end -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-4 mb-30">--}}
{{--                    <!-- how it work box -->--}}
{{--                    <div class="how-it-work-box text-center">--}}
{{--                        <div class="icon mb-15"><img src="{{asset('boarding_house/img/icon/3.png')}}" alt=""></div>--}}
{{--                        <h4 class="mb-10">Find the Right Hotel for You</h4>--}}
{{--                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum.</p>--}}
{{--                    </div>--}}
{{--                    <!-- how it work box end -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- ================ How it works end ================ -->--}}

{{--    <!-- ================ Partner area ================ -->--}}
{{--    <div class="partner-section pb-50">--}}
{{--        <div class="container">--}}
{{--            <div class="partner-carousel p-20 rounded bg-gray owl-carousel owl-theme">--}}
{{--                <div class="item">--}}
{{--                    <!-- partner item -->--}}
{{--                    <div class="partner-item"> <img src="{{asset('boarding_house/img/partner/1.png')}}" class="img-fluid bg-white" alt=""></div>--}}
{{--                    <!-- partner item end -->--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <!-- partner item -->--}}
{{--                    <div class="partner-item"> <img src="{{asset('boarding_house/img/partner/2.png')}}" class="img-fluid bg-white" alt=""></div>--}}
{{--                    <!-- partner item end -->--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <!-- partner item -->--}}
{{--                    <div class="partner-item"> <img src="{{asset('boarding_house/img/partner/3.png')}}" class="img-fluid bg-white" alt=""></div>--}}
{{--                    <!-- partner item end -->--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <!-- partner item -->--}}
{{--                    <div class="partner-item"> <img src="{{asset('boarding_house/img/partner/4.png')}}" class="img-fluid bg-white" alt=""></div>--}}
{{--                    <!-- partner item end -->--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <!-- partner item -->--}}
{{--                    <div class="partner-item"> <img src="{{asset('boarding_house/img/partner/5.png')}}" class="img-fluid bg-white" alt=""></div>--}}
{{--                    <!-- partner item end -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- ================ Partner area ================ -->--}}
@endsection
