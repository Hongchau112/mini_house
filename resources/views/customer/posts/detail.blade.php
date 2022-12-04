@extends('customer.posts.layout', [
    'title' => ( $title ?? 'Bài đăng' )
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
    <style>
        .rating {
            display: flex;
            margin-top: -10px;
            flex-direction: row-reverse;
            margin-left: -4px;
            float: left
        }
        .rating>input {
            display: none
        }
        .rating>label {
            position: relative;
            width: 19px;
            font-size: 25px;
            color: #eec80d;
            cursor: pointer
        }
        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }
        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }
        .rating>input:checked~label:before {
            opacity: 1
        }
        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }
    </style>
    <div class="blog-single-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- blog box -->
                    <div class="blog-box p-0">

                        <div class="blog_img mb-20"><img src="{{asset('/images/posts/'.$post->image)}}" height="533px" width="800" alt=""></div>
                        <div class="blog-des">
                            @foreach($rooms as $room)
                                @if($room->id==$post->room_id)
                                    <h6 class="blog_date font-weight-normal text-muted">
                                        @if($room->status==0)
                                            <span>Còn trống</span>
                                            <div><button class="btn btn-success"><a style="text-underline: none; color: white" href="{{route('customer.rooms.booking', ['id' =>$room->id])}}">Đặt phòng ngay</a></button></div>
                                        @else
                                            <span>Đã đặt</span>
                                        @endif
                                        {{$post->created_at}}</h6>
                                    <div><h3>{{number_format($room->cost)}} đ</h3></div>
                                @endif
                            @endforeach
                            <h5 class="mt-10 mb-6"><a href="#" class="text-dark">{{$post->title}}</a></h5>
                            <p class="text-muted">{!!$post->content!!}</p>
                            <h6 class="mb-10">Mô tả về phòng:</h6>
                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <button class="btn btn-outline-light">Trở về</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- blog box end -->
                    <!-- tags share -->
                    <div class="tags-share mt-30 pb-15 d-inline-block w-100">
                        <div class="tags d-flex float-lg-left pt-15"> <span>Từ khóa :</span>
                            <ul>
                                <li><a href="#">Sinh viên</a></li>
                                <li><a href="#">Thuê trọ</a></li>
                                <li><a href="#">Phòng tránh</a></li>
                            </ul>
                        </div>
{{--                        <div class="share d-flex float-lg-right pt-15"> <span>Share :</span>--}}
{{--                            <ul class="list-inline">--}}
{{--                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                    <!-- tags share end -->
                    <!-- comments area -->
                    <div class="comments-area mt-50">
                        <!-- title -->
                        <div class="blog-single-title">
                            <h4>Bình luận</h4>
                        </div>
                        <form>
                            @csrf
                            <div  id="comment_show">

                            </div>

                            <div class="bg-white p-2">
                                <input type="hidden" id="post_id" value="{{$post->id}}" class="post_id">
{{--                                <input type="hidden"  value="" id=user_id class="cmt-userid">--}}

                            </div>
                        </form>
                    </div>
                    <!-- comments area end -->
                    <!-- post comments -->
                    <div class="post-comments mt-50 mb-30">
                        <!-- title -->

                        <!-- title end -->
                        <!-- post comment form -->
                        @if($user!=null)
                            <div class="blog-single-title">
                                <h4>Để lại bình luận</h4>
                            </div>
                            <div class="post-comment-form">
                            <form>
                                <input type="hidden" name="name" id="cmt-name" value="{{$user->name}}" class="form-control" >
                                <input type="hidden" name="name" id="cmt-phone" value="{{$user->phone}}"  class="form-control" >
                                <input type="hidden" name="user_id" id="cmt-user" value="{{$user->id}}"  class="form-control" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="cmt-content" placeholder="Bình luận" rows="5"></textarea>
                                </div>
                                <button type="button" class="btn-style-1 text-uppercase" id="send-comment">Gửi</button>
                                <div id="notify"></div>
                            </form>
                            </div>
                        @else
                            <p></p>
                        @endif





                        <!-- post comment form end -->
                    </div>
                    <!-- post comments end -->
                </div>
                <div class="col-lg-4">
                    <!-- aside -->
                    <aside>
                        <!-- search form -->

                        <!-- search form end -->
                        <!-- widget -->
                        <div class="widget mb-50">
                            <!-- widget title -->
                            <h3 class="widget-title">Danh mục</h3>
                            <!-- widget title end -->
                            <!-- categories -->
                            <ul class="blog-categorie">
                                @foreach($post_categories as $category)
                                    <li><a href="{{route('customer.post_category', ['id'=> $category->id])}}"><i class="far fa-dot-circle"></i>{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                            <!-- categories end -->
                        </div>
                        <!-- widget end -->
                        <!-- widget -->
                        <div class="widget mb-50">
                            <!-- widget title -->
                            <h3 class="widget-title">Bài đăng gần đây</h3>
                            <!-- widget title end -->
                            <!-- recent post -->
                            <div class="blog-recent-post">
                                @foreach($post_infos as $post_info)
                                    <!-- recent single post -->
                                    <div class="recent-single-post mb-20">
                                        <div class="post-img"> <a href="#"><img src="{{asset('/images/posts/'.$post_info->image)}}" alt=""></a> </div>
                                        <div class="pst-content">
                                            <p><a href="#">{{$post_info->title}}</a></p>
                                            <span class="date-type">{{$post_info->created_at}}</span> </div>
                                    </div>
                                @endforeach
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
            $("input[type='radio']").click(function() {
                var rating = $("input[name='rating']:checked").val();
                console.log(rating);
            })

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
                        // console.log(data)
                        $('#comment_show').html(data);
                    }
                });

            }
            // load_comment();


            $('#send-comment').click(function(){
                var post_id=$('#post_id').val();
                var _token = $('input[name="_token"]').val();
                var name = $('#cmt-name').val();
                var content = $('#cmt-content').val();
                var phone = $('#cmt-phone').val();
                var user_id = $('#cmt-user').val();
                var rating = $('input[name="rating"]:checked').val();

                $.ajax({
                    url: '{{route('customer.posts.send_comment')}}',
                    type: "POST",
                    data: {_token:_token, post_id: post_id, name: name, content: content, phone: phone, user_id: user_id, rating: rating},

                    success:function(data){
                        $('#notify').html('<p style="margin-top: 10px">Thêm bình luận thành công! Đang chờ duyệt nhá</p>');
                        load_comment();
                        $('#notify').fadeOut(5000);
                        $('.comment-content').val('');
                        // console.log(data);
                    }
                });
            });
            // load_comment();

        })

    </script>
@endpush
