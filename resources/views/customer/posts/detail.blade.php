@extends('customer.posts.layout', [
    'title' => ( $title ?? 'Bài đăng' )
])

@section('content')
    <!-- ================ Blog single page ================ -->
    <div class="blog-single-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- blog box -->
                    <div class="blog-box p-0">
                        <div class="blog_img mb-20"><img src="{{asset('boarding_house/img/blog/blog-1.jpg')}}" alt=""></div>
                        <div class="blog-des">
                            <h6 class="blog_date font-weight-normal text-muted"><span>business</span> January 01, 2020</h6>
                            <h5 class="mt-10 mb-6"><a href="#" class="text-dark">The Most Advance Business Plan</a></h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum. orem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum nulla eu placerat felis etiam tincidunt orci lacus id varius dolor fermum sit amet.</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum. orem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum nulla eu placerat felis etiam tincidunt orci lacus id varius dolor fermum sit amet.</p>
                            <h6 class="mb-10">Two Column Text Sample</h6>
                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur ipiscing elit amet conse amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum varius dolor fermum sit amet.</p>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur ipiscing elit amet conse amet consectetur ipiscing elit amet consectetur piscing elit consectetur adipiscing elit sed et eletum varius dolor fermum sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog box end -->
                    <!-- tags share -->
                    <div class="tags-share mt-30 pb-15 d-inline-block w-100">
                        <div class="tags d-flex float-lg-left pt-15"> <span>Tags :</span>
                            <ul>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">business</a></li>
                                <li><a href="#">corporate</a></li>
                            </ul>
                        </div>
                        <div class="share d-flex float-lg-right pt-15"> <span>Share :</span>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- tags share end -->
                    <!-- comments area -->
                    <div class="comments-area mt-50">
                        <!-- title -->
                        <div class="blog-single-title">
                            <h4>Read Comments</h4>
                        </div>
                        <!-- title end -->
                        <!-- comment box -->

                        <!-- comment box end -->
                        <!-- comment box -->
                        <form>
                            @csrf
                            <div class="comment-box ml-30 mb-30" id="comment_show">

                            </div>

                            <div class="bg-white p-2">
                                <input type="hidden" id="post_id" value="{{$post->id}}" class="post_id">
                                <input type="hidden"  value="{{$user->id}}" id=user_id class="cmt-userid">

                            </div>
                        </form>

                        <!-- comment box end -->
                        <!-- comment box -->
{{--                        <div class="comment-box">--}}
{{--                            <div class="comment">--}}
{{--                                <div class="author-thumb"><img src="{{asset('boarding_house/img/blog/blog-1.jpg')}}" alt=""></div>--}}
{{--                                <div class="comment-inner">--}}
{{--                                    <div class="comment-info clearfix">Kevin Marthin – Jan 01, 2020:</div>--}}
{{--                                    <div class="rating"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </div>--}}
{{--                                    <div class="text">Lorem ipsum dolor sit amet consectetur ipiscing elit amet consectetur piscing elitsada consectetur adipiscing elit sed et eletum. orem ipsum dolor sit amet consecteturdfhdg adipiscing elit amet consectetur piscing elit amet consectetur.</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- comment box end -->
                    </div>
                    <!-- comments area end -->
                    <!-- post comments -->
                    <div class="post-comments mt-50 mb-30">
                        <!-- title -->
                        <div class="blog-single-title">
                            <h4>Post Comments</h4>
                        </div>
                        <!-- title end -->
                        <!-- post comment form -->
                        <div class="post-comment-form">

                            <form action="">
{{--                                @csrf--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="cmt-name" placeholder="Tên của bạn" value="{{$user->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="cmt-phone" value="{{$user->phone}}" placeholder="Số điện thoại" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="cmt-content" placeholder="Bình luận" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn-style-1 text-uppercase" id="send-comment">Gửi</button>
                            </form>
                                <div id="notify"></div>

                        </div>
                        <!-- post comment form end -->
                    </div>
                    <!-- post comments end -->
                </div>
                <div class="col-lg-4">
                    <!-- aside -->
                    <aside>
                        <!-- search form -->
                        <form class="search-form mb-50">
{{--                            @csrf--}}
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
                                    <div class="post-img"> <a href="#"><img src="{{asset('boarding_house/img/blog/blog-1.jpg')}}" alt=""></a> </div>
                                    <div class="pst-content">
                                        <p><a href="#">Lorem ipsum rem ipsumsd dolorit amet consectetur ipiscing.</a></p>
                                        <span class="date-type">01 Jan / 2020</span> </div>
                                </div>
                                <!-- recent single post end -->
                                <!-- recent single post -->
                                <div class="recent-single-post mb-20">
                                    <div class="post-img"> <a href="#"><img src="{{asset('boarding_house/img/blog/blog-1.jpg')}}" alt=""></a> </div>
                                    <div class="pst-content">
                                        <p><a href="#">Lorem ipsum rem ipsumsd dolorit amet consectetur ipiscing.</a></p>
                                        <span class="date-type">01 Jan / 2020</span> </div>
                                </div>
                                <!-- recent single post end -->
                                <!-- recent single post -->
                                <div class="recent-single-post">
                                    <div class="post-img"> <a href="#"><img src="{{asset('boarding_house/img/blog/blog-1.jpg')}}" alt=""></a> </div>
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
    <!-- ================ Blog single page end ================ -->

@endsection
@push('footer')
    <script>
        $(document).ready(function(){

            load_comment();

            function load_comment(){
                var post_id=$('#post_id').val();
                var _token = $('input[name="_token"]').val();
                // alert(post_id);
                $.ajax({
                    url: '/customer/load_comment',
                    type: "POST",
                    data: {_token:_token, post_id: post_id},

                    success:function(data){
                        console.log(data)
                        $('#comment_show').html(data);
                    }
                });

            }
            load_comment();


            $('#send-comment').click(function(){
                var post_id=$('#post_id').val();
                var _token = $('input[name="_token"]').val();
                var name = $('#cmt-name').val();
                var content = $('#cmt-content').val();
                var phone = $('#cmt-phone').val();
                var user_id = $('#user_id').val();

                $.ajax({
                    url: '/customer/posts/send_comment',
                    type: "POST",
                    data: {_token:_token, post_id: post_id, name: name, content: content, phone: phone, user_id: user_id},

                    success:function(data){
                        console.log(data);
                        $('#notify').html('<p>Thêm bình luận thành công! Đang chờ duyệt nhá</p>');
                        // load_comment();
                        // $('#notify').fadeOut(5000);
                        // $('.comment-content').val('');
                    }
                });
            });
            // load_comment();

        })

    </script>
@endpush
