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
