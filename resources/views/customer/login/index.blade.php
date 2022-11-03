@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])
@section('content')
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
                <div class="carousel-item active"> <img src="{{asset('boarding_house/img/slider/slider-1.jpg')}}" alt="" class="img-fluid"> </div>
                <!-- slider item end -->
                <!-- slider item -->
                <div class="carousel-item"> <img src="{{asset('boarding_house/img/slider/slider-1.jpg')}}" alt="" class="img-fluid"> </div>
                <!-- slider item end -->
                <!-- slider item -->
                <div class="carousel-item"> <img src="{{asset('boarding_house/img/slider/slider-1.jpg')}}" alt="" class="img-fluid"> </div>
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
                    <div class="about-video-img-box position-relative rounded"> <img src="{{asset('boarding_house/img/about-us/about-video-img-1.jpg')}}" alt="" class="img-fluid rounded">
                        <div class="hoverlay d-flex flex-row align-items-center justify-content-center"> <a class="venobox d-inline" data-gall="gall-video" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=668nUCeBHyY&t=28s"><i class="fab fa-google-play"></i></a> </div>
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
                <h2>Most Popular Hotel</h2>
                <span class="dashed-border"></span> </div>
            <!-- section title -->
        </div>
        <div class="container-fluid">
            <!-- popular hotel carousel -->
            <div class="popular-hotel-carousel owl-carousel owl-theme">
                <div class="item">
                    <!-- popular hotel box -->
                    <div class="popular-hotel-box">
                        <div class="imege mb-10"><img src="{{asset('boarding_house/img/popular-hotel/1.jpg')}}" alt="">
                            <div class="black-bg"> <a href=""><i class="fas fa-map-marker-alt"></i> Thailand</a> </div>
                        </div>
                        <div class="reting"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </div>
                        <h4><a href="">Ansan Hotel</a></h4>
                        <div class="price">$100.00 / <span>Per night</span></div>
                    </div>
                    <!-- popular hotel box end -->
                </div>
                <div class="item">
                    <!-- popular hotel box -->
                    <div class="popular-hotel-box">
                        <div class="imege mb-10"><img src="{{asset('boarding_house/img/popular-hotel/2.jpg')}}" alt="">
                            <div class="black-bg"> <a href=""><i class="fas fa-map-marker-alt"></i> Vietnam</a> </div>
                        </div>
                        <div class="reting"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </div>
                        <h4><a href="">Fawlty Towers</a></h4>
                        <div class="price">$200.00 / <span>Per night</span></div>
                    </div>
                    <!-- popular hotel box end -->
                </div>
                <div class="item">
                    <!-- popular hotel box -->
                    <div class="popular-hotel-box">
                        <div class="imege mb-10"><img src="{{asset('boarding_house/img/popular-hotel/3.jpg')}}" alt="">
                            <div class="black-bg"> <a href=""><i class="fas fa-map-marker-alt"></i> Italy</a> </div>
                        </div>
                        <div class="reting"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </div>
                        <h4><a href="">Hotel Valle</a></h4>
                        <div class="price">$300.00 / <span>Per night</span></div>
                    </div>
                    <!-- popular hotel box end -->
                </div>
                <div class="item">
                    <!-- popular hotel box -->
                    <div class="popular-hotel-box">
                        <div class="imege mb-10"><img src="{{asset('boarding_house/img/popular-hotel/4.jpg')}}" alt="">
                            <div class="black-bg"> <a href=""><i class="fas fa-map-marker-alt"></i> Mexico</a> </div>
                        </div>
                        <div class="reting"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </div>
                        <h4><a href="">Hotel Las Trojes</a></h4>
                        <div class="price">$400.00 / <span>Per night</span></div>
                    </div>
                    <!-- popular hotel box end -->
                </div>
                <div class="item">
                    <!-- popular hotel box -->
                    <div class="popular-hotel-box">
                        <div class="imege mb-10"><img src="{{asset('boaring_house/img/popular-hotel/5.jpg')}}" alt="">
                            <div class="black-bg"> <a href=""><i class="fas fa-map-marker-alt"></i> United States</a> </div>
                        </div>
                        <div class="reting"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </div>
                        <h4><a href="">Rosen Shingle Creek</a></h4>
                        <div class="price">$500.00 / <span>Per night</span></div>
                    </div>
                    <!-- popular hotel box end -->
                </div>
            </div>
            <!-- popular hotel carousel end -->
        </div>
    </div>
    <!-- ================ Most popular hotel end ================ -->

    <!-- ================ Popular destinations ================ -->
    <div class="popular-destinations pt-70 pb-40 position-relative">
        <div class="bg-style-1"></div>
        <div class="container">
            <!-- section title -->
            <div class="section-title text-center">
                <h2>Most Popular Destinations</h2>
                <span class="dashed-border"></span> </div>
            <!-- section title -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <!-- popular destination box -->
                    <div class="popular-destination-box">
                        <div class="img-holder-overlay">
                            <div class="img-holder"><img src="{{asset('boarding_house/img/popular-destination/1.jpg')}}" alt=""></div>
                            <div class="overlay"><a href="#"><i class="fas fa-share"></i></a></div>
                        </div>
                        <div class="title">
                            <h3><a href="">Orlando</a></h3>
                        </div>
                    </div>
                    <!-- popular destination box end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <!-- popular destination box -->
                    <div class="popular-destination-box">
                        <div class="img-holder-overlay">
                            <div class="img-holder"><img src="{{asset('boarding_house/img/popular-destination/2.jpg')}}" alt=""></div>
                            <div class="overlay"><a href="#"><i class="fas fa-share"></i></a></div>
                        </div>
                        <div class="title">
                            <h3><a href="">Miami</a></h3>
                        </div>
                    </div>
                    <!-- popular destination box end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <!-- popular destination box -->
                    <div class="popular-destination-box">
                        <div class="img-holder-overlay">
                            <div class="img-holder"><img src="{{asset('boarding_house/img/popular-destination/3.jpg')}}" alt=""></div>
                            <div class="overlay"><a href="#"><i class="fas fa-share"></i></a></div>
                        </div>
                        <div class="title">
                            <h3><a href="">Los Angeles</a></h3>
                        </div>
                    </div>
                    <!-- popular destination box end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <!-- popular destination box -->
                    <div class="popular-destination-box">
                        <div class="img-holder-overlay">
                            <div class="img-holder"><img src="{{asset('boarding_house/img/popular-destination/4.jpg')}}" alt=""></div>
                            <div class="overlay"><a href="#"><i class="fas fa-share"></i></a></div>
                        </div>
                        <div class="title">
                            <h3><a href="">San Diego</a></h3>
                        </div>
                    </div>
                    <!-- popular destination box end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <!-- popular destination box -->
                    <div class="popular-destination-box">
                        <div class="img-holder-overlay">
                            <div class="img-holder"><img src="{{asset('boarding_house/img/popular-destination/5.jpg')}}" alt=""></div>
                            <div class="overlay"><a href="#"><i class="fas fa-share"></i></a></div>
                        </div>
                        <div class="title">
                            <h3><a href="">Houston</a></h3>
                        </div>
                    </div>
                    <!-- popular destination box end -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <!-- popular destination box -->
                    <div class="popular-destination-box">
                        <div class="img-holder-overlay">
                            <div class="img-holder"><img src="{{asset('boarding_house/img/popular-destination/6.jpg')}}" alt=""></div>
                            <div class="overlay"><a href="#"><i class="fas fa-share"></i></a></div>
                        </div>
                        <div class="title">
                            <h3><a href="">New York</a></h3>
                        </div>
                    </div>
                    <!-- popular destination box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ Popular destinations end ================ -->

    <!-- ================ Testimonials ================ -->
    <div class="testimonials-area testimonial-bg  pt-70 pb-70">
        <div class="container">
            <div class="testimonial-carousel owl-carousel owl-theme">
                <div class="item">
                    <!-- testimonial box -->
                    <div class="testimonial-box position-relative shadow rounded">
                        <p class="text-muted border-bottom font-italic pb-3">" Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum orem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum. "</p>
                        <div class="reviewer d-inline-block"> <img src="{{asset('boarding_house/img/testimonial/01.jpg')}}" class="float-left mr-3 rounded" alt="">
                            <div class="content d-block overflow-hidden">
                                <h4 class="name mb-0 text-uppercase">Kevin Marthin</h4>
                                <small class="designation text-muted">Developer</small> </div>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    </div>
                    <!-- testimonial box end -->
                </div>
                <div class="item">
                    <!-- testimonial box -->
                    <div class="testimonial-box position-relative shadow rounded">
                        <p class="text-muted border-bottom font-italic pb-3">" Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum orem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum. "</p>
                        <div class="reviewer d-inline-block"> <img src="{{asset('boarding_house/img/testimonial/02.jpg')}}" class="float-left mr-3 rounded" alt="">
                            <div class="content d-block overflow-hidden">
                                <h4 class="name mb-0 text-uppercase">Joe Gabriel</h4>
                                <small class="designation text-muted">Designer</small> </div>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    </div>
                    <!-- testimonial box end -->
                </div>
                <div class="item">
                    <!-- testimonial box -->
                    <div class="testimonial-box position-relative shadow rounded">
                        <p class="text-muted border-bottom font-italic pb-3">" Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum orem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum. "</p>
                        <div class="reviewer d-inline-block"> <img src="{{asset('boarding_house/img/testimonial/03.jpg')}}" class="float-left mr-3 rounded" alt="">
                            <div class="content d-block overflow-hidden">
                                <h4 class="name mb-0 text-uppercase">Join Mansoor</h4>
                                <small class="designation text-muted">Support-Marketing</small> </div>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    </div>
                    <!-- testimonial box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ Testimonials end ================ -->

    <!-- ================ Blog area ================ -->
    <div class="blog-area pt-70 pb-40 position-relative">
        <div class="bg-style-1"></div>
        <div class="container">
            <!-- section title -->
            <div class="section-title text-center">
                <h2>Latest News</h2>
                <span class="dashed-border"></span> </div>
            <!-- section title -->
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <!-- blog box -->
                    <div class="blog-box shadow">
                        <div class="blog_img mb-20"><img src="{{asset('boarding_house/img/blog/blog-1.jpg')}}" alt=""></div>
                        <div class="blog-des">
                            <h6 class="blog_date font-weight-normal text-muted"><span>business</span> January 01, 2020</h6>
                            <h5 class="mt-10 mb-6"><a href="#" class="text-dark">The Most Advance Business Plan</a></h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum.</p>
                            <div class="read_more">
                                <div class="blog_border"></div>
                                <a href="#" class="text-dark text-uppercase"> Read More</a> </div>
                        </div>
                    </div>
                    <!-- blog box end -->
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <!-- blog box -->
                    <div class="blog-box shadow">
                        <div class="blog_img mb-20"><img src="{{asset('boarding_house/img/blog/blog-2.jpg')}}" alt=""></div>
                        <div class="blog-des">
                            <h6 class="blog_date font-weight-normal text-muted"><span>business</span> January 01, 2020</h6>
                            <h5 class="mt-10 mb-6"><a href="#" class="text-dark">Beautiful Home Page</a></h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum.</p>
                            <div class="read_more">
                                <div class="blog_border"></div>
                                <a href="#" class="text-dark text-uppercase"> Read More</a> </div>
                        </div>
                    </div>
                    <!-- blog box end -->
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <!-- blog box -->
                    <div class="blog-box shadow">
                        <div class="blog_img mb-20"><img src="{{asset('boarding_house/img/blog/blog-3.jpg')}}" alt=""></div>
                        <div class="blog-des">
                            <h6 class="blog_date font-weight-normal text-muted"><span>business</span> January 01, 2020</h6>
                            <h5 class="mt-10 mb-6"><a href="#" class="text-dark">Modern Design Concept</a></h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum.</p>
                            <div class="read_more">
                                <div class="blog_border"></div>
                                <a href="#" class="text-dark text-uppercase"> Read More</a> </div>
                        </div>
                    </div>
                    <!-- blog box end -->
                </div>
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
