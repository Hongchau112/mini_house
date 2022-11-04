@extends('customer.posts.layout', [
    'title' => ( $title ?? 'Bài đăng' )
])

@section('content')
    <div class="blog-single-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- blog box -->
                    <div class="blog-box p-0">
                        @foreach($images as $image)
                            @if($post->room_id == $image->room_id)
                                @php
                                    $image_path = $image->image_path;
                                @endphp
                            @endif
                        @endforeach
                        <div class="blog_img mb-20"><img src="{{asset('/images/'.$image_path)}}" height="533px" width="800" alt=""></div>
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
                            <h5 class="mt-10 mb-6"><a href="#" class="text-dark">{{$post->title}}</a></h5>
                            <p class="text-muted">{{$post->content}}</p>
                            <h6 class="mb-10">Mô tả về phòng:</h6>
                            <div class="row">
                                @foreach($rooms as $room)
                                    @if($room->id==$post->room_id)
                                        <div class="col-lg-6 mb-20">
                                            <p class="mb-0">Chiều dài: {{$room->length}} m</p>
                                            <p class="mb-0">Chiều rộng: {{$room->width}} m</p>
                                            <p class="mb-0">Phòng có:  </p>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-lg-6 mb-20">
{{--                                    <button class="btn btn-outline-light">Trở về</button>--}}
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
                            <h4>Bình luận</h4>
                        </div>
                        <form>
                            @csrf
                            <div  id="comment_show">

                            </div>

                            <div class="bg-white p-2">
                                <input type="hidden" id="post_id" value="{{$post->id}}" class="post_id">
                                <input type="hidden"  value="{{$user->id}}" id=user_id class="cmt-userid">

                            </div>
                        </form>
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

                            <form>
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
                                <div id="notify"></div>
                            </form>


                        </div>
                        <!-- post comment form end -->
                    </div>
                    <!-- post comments end -->
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
                console.log(post_id);
                console.log(name);
                console.log(content);
                console.log(phone);

                $.ajax({
                    url: '',
                    type: "POST",
                    data: {_token:_token, post_id: post_id, name: name, content: content, phone: phone},

                    success:function(data){
                        // console.log(data);
                    }
                });
            });
            // load_comment();

        })

    </script>
@endpush