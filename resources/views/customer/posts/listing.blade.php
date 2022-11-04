@extends('customer.posts.layout', [
    'title' => ( $title ?? 'Bài đăng' )
])

@section('content')
    <div class="blog-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($posts as $post)

                        <div class="col-lg-6 col-md-6 mb-30">
                            <!-- blog box -->
                            <div class="blog-box shadow">
                                @foreach($images as $image)
                                    @if($post->room_id == $image->room_id)
                                        @php
                                            $image_path = $image->image_path;
                                        @endphp
                                    @endif
                                @endforeach
                                    <div class="blog_img mb-20"><img src="{{asset('/images/'.$image_path)}}" alt="" HEIGHT="250px" WIDTH="320PX"></div>

                                <div class="blog-des">
                                    @foreach($rooms as $room)
                                        @if($room->id==$post->room_id)
                                            <h6 class="blog_date font-weight-normal text-muted">
                                                @if($room->status==0)
                                                    <span>Còn trống</span>
                                                @else
                                                    <span>Đã đặt</span>
                                                @endif
                                                    {{$post->created_at}}</h6>
                                        @endif
                                    @endforeach
                                    <h5 class="mt-10 mb-6"><a href="{{route('customer.posts.details', ['id'=>$post->id])}}" class="text-dark">{{$post->title}}</a></h5>
                                    <p class="text-muted"></p>
                                    <div class="read_more">
                                        <div class="blog_border"></div>
                                        <a href="{{route('customer.posts.details', ['id'=>$post->id])}}" class="text-dark text-uppercase">Xem bài đăng</a> </div>
                                </div>
                            </div>
                            <!-- blog box end -->
                        </div>

                        @endforeach

                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- aside -->
                    <aside>
                        <!-- search form -->
                        <form class="search-form mb-50">
                            <input type="text" class="form-control" placeholder="Search" value="">
                            <button class="search-submit"><i class="fas fa-search"></i></button>
                        </form>
                        <!-- search form end -->
                        <!-- widget -->
                        <div class="widget mb-50">
                            <!-- widget title -->
                            <h3 class="widget-title">Categories</h3>
                            <!-- widget title end -->
                            <!-- categories -->
                            <ul class="blog-categorie">
                                <li><a href=""><i class="far fa-dot-circle"></i> Business</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Traveling</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Developement</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Motion Designer</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Content Writing</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Web Developement</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Business Strategy</a></li>
                                <li><a href=""><i class="far fa-dot-circle"></i> Risk Management</a></li>
                            </ul>
                            <!-- categories end -->
                        </div>
                        <!-- widget end -->
                        <!-- widget -->
                        <div class="widget mb-50">
                            <!-- widget title -->
                            <h3 class="widget-title">Recent Post</h3>
                            <!-- widget title end -->
                            <!-- recent post -->
                            <div class="blog-recent-post">
                                <!-- recent single post -->
                                <div class="recent-single-post mb-20">
                                    <div class="post-img"> <a href="#"><img src="img/blog/recent-post/recent-post-1.jpg" alt=""></a> </div>
                                    <div class="pst-content">
                                        <p><a href="#">Lorem ipsum rem ipsumsd dolorit amet consectetur ipiscing.</a></p>
                                        <span class="date-type">01 Jan / 2020</span> </div>
                                </div>
                                <!-- recent single post end -->
                                <!-- recent single post -->
                                <div class="recent-single-post mb-20">
                                    <div class="post-img"> <a href="#"><img src="img/blog/recent-post/recent-post-2.jpg" alt=""></a> </div>
                                    <div class="pst-content">
                                        <p><a href="#">Lorem ipsum rem ipsumsd dolorit amet consectetur ipiscing.</a></p>
                                        <span class="date-type">01 Jan / 2020</span> </div>
                                </div>
                                <!-- recent single post end -->
                                <!-- recent single post -->
                                <div class="recent-single-post">
                                    <div class="post-img"> <a href="#"><img src="img/blog/recent-post/recent-post-3.jpg" alt=""></a> </div>
                                    <div class="pst-content">
                                        <p><a href="#">Lorem ipsum rem ipsumsd dolorit amet consectetur ipiscing.</a></p>
                                        <span class="date-type">01 Jan / 2020</span> </div>
                                </div>
                                <!-- recent single post end -->
                            </div>
                            <!-- recent post end -->
                        </div>
                        <!-- widget end -->
                        <!-- widget -->
                        <div class="widget mb-30">
                            <!-- widget title -->
                            <h3 class="widget-title">Tags</h3>
                            <!-- widget title end -->
                            <!-- tags -->
                            <div class="blog-tags"> <a href="">Business</a> <a href="">Traveling</a> <a href="">Developement</a> <a href="">Motion</a> <a href="">Writing</a> <a href="">Strategy</a> <a href="">Management</a> </div>
                            <!-- tags end -->
                        </div>
                        <!-- widget end -->
                    </aside>
                    <!-- aside end -->
                </div>
            </div>
        </div>
    </div>
@endsection
